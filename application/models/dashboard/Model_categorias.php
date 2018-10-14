<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_categorias extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function getCategoryByType($id){
        $query = $this->db
                ->select('*')
                ->from('categorias')
                ->order_by('orden','asc')
                ->where('estado !=', _ELIMINADO)
                ->where('tipo_categoria_id',_CAT_PRODUCTO)
                ->where('padre_id',$id)
                ->get()
                ->result_array();
        for ($i=0; $i < count($query); $i++) { 
            $query[$i]['numero_categorias'] = $this->getNumCategory($query[$i]['id']);
        }

        return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getCategoryTreeForParentId($parent_id = 1) {
        $categories = array();
        $this->db->from('categorias');
        $this->db->where('padre_id', $parent_id);
        $this->db->where('estado', _ACTIVO);
        $this->db->where('tipo_categoria_id',_CAT_PRODUCTO);
        $result = $this->db->get()->result();
        foreach ($result as $mainCategory) {
            $category = array();
            $category['id'] = $mainCategory->id;
            $category['nombre'] = $mainCategory->nombre;
            $category['padre_id'] = $mainCategory->padre_id;
            $category['padre'] = (count($this->getCategoryTreeForParentId($category['id']))>0)? '1':'0';
            $category['sub_categorias'] = $this->getCategoryTreeForParentId($category['id']);
            $categories[$mainCategory->id] = $category;
        }
        return $categories;
    }

    public function getCategoryById( $id ){
        $query = $this->db
                ->select('*')
                ->from('categorias')
                ->order_by('orden','desc')
                ->where('tipo_categoria_id',_CAT_PRODUCTO)
                ->where('id', $id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getNumCategory($id){
        $query = $this->db
                ->select('*')
                ->from('categorias')
                ->where('estado !=', _ELIMINADO)
                ->where('padre_id',$id)
                ->where('tipo_categoria_id', _CAT_PRODUCTO)
                ->get();
            return $query->num_rows();
    }

    #--------
    # UPDATE
    #--------
    public function UpdateCategory( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('categorias', $data);
            return $query;
    }
    #--------
    # INSERT
    #--------
    public function saveCategory( $data ){
        $data['creado']=date('Y-m-d H:i:s');
        $this->db->insert('categorias', $data);
        return $this->db->insert_id();
    }
    #--------
    # DELETE
    #--------
    public function deleteCategory( $id ){

        $this->db->where('id', $id);
        $this->db->update('categorias', array('estado' => 0));

        $this->db->where('padre_id', $id);
        $query = $this->db->get('categorias');
        $result = $query->result();
        $num = $query->num_rows();
        if($num>=0){
            if($result){
                foreach ($result as $value) {
                    $this->deleteCategory($value->id);
                }
            }
            $q = $this->deleteProducto($id);
        }
        return $q;
    }

    public function deleteProducto( $id ){
        $array = array('estado'=>0);
        $this->db->where('categoria_id', $id);
        $query = $this->db->update('productos',$array);
        return $query;
    }

    /*getProductos:se creo para el eliminado de categorias*/
    public function getProductos( $id ){
        $query = $this->db
                ->select(['c.producto_id AS id'])
                ->from('categorias_productos c')
                ->join('productos p ', 'c.producto_id = p.id','inner')
                ->where('c.categoria_id', $id)
                ->get()
                ->result_array();
        return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function deleteProductos($data ){
        $this->db->update_batch('productos',$data, 'id');
        return true;
    }
    
}
