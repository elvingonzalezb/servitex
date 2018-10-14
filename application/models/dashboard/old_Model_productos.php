<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_productos extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function getProductByCategory( $id ){
        $query =  $this->db
                ->select(['p.*','c.categoria_id','g.imagen','g.imagen_title'])
                //->distinct('p.id')
                ->from('categorias_productos c')
                ->join('productos p', 'p.id=c.producto_id','inner')
                ->join('galeria_productos g', 'g.producto_id = p.id','inner')
                ->order_by('orden','desc')
                ->where('p.estado !=',_ELIMINADO)
                ->where('c.categoria_id', $id )
                ->group_by('p.id' )
                //->limit(1)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }
    #Guarda las categorias del producto
    public function saveCategoryProduct( $data){
        $this->db->insert_batch('categorias_productos', $data);
        return true;
    }
    public function getProductById( $id ){
        $query = $this->db
                ->select(['p.*','GROUP_CONCAT(i.categoria_id) AS categorias'])
                ->from('productos p')
                ->join('categorias_productos i ', 'p.id=i.producto_id','inner')
                //->order_by('orden','desc')
                ->where('p.estado !=', _ELIMINADO)
                ->where('p.id', $id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getAtributosById( $id ){
        
        $query = self::getStockDetalleAtributoById($id);
                foreach ($query as $key => $value) {

                    $atrib = $value['atributos'];

                    $atrib = explode('#',$atrib);
                    $num_atrib = count($atrib);

                    $i=0;
                    $item = array();
                    while ($i < $num_atrib) {
                        
                        $item[] = self::getDetalleAtributo( $atrib[$i]);
                        $i++;
                    }
                    //print_r($item);
                    $query[$key]['detalle_atributos'] = $item;
                }
                    //print_r($item); //exit();
                    //$atributos[] = $value['atributos'];
                    //print_r($atributos);// exit();

                //print_r($query); exit();
            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getDetalleAtributo( $id ){
        $query = $this->db
                ->select([
                        'id as detalle_atributo_id',
                        'nombre',
                        'descripcion',
                        'atributo_id',
                        'valor'
                    ])
                ->from('detalle_atributos')
                //->join('categorias_productos i ', 'p.id=i.producto_id','inner')
                //->order_by('orden','desc')
                ->where('estado !=', _ELIMINADO)
                ->where('id', $id)
                ->get()
                ->row_array();
            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getStockDetalleAtributoById( $id ){
        $query = $this->db
                ->select([
                    //'id',
                    'cantidad',
                    //'ingresado',
                    //'actualizado',
                    //'producto_id',
                    'atributos'
                    ])
                ->from('stock_atributos_multiples')
                //->join('categorias_productos i ', 'p.id=i.producto_id','inner')
                //->order_by('orden','desc')
                ->where('estado !=', _ELIMINADO)
                ->where('producto_id', $id)
                ->get()
                ->result_array();
            return ( ! empty($query) && is_array($query) ? $query : []);
    }


    #--------
    # UPDATE
    #--------
    public function updateProduct( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('productos', $data);
        return $query;
    }

    public function updateImagenProduct( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('galeria_productos', $data);
            return $query;
    }
    #--------
    # INSERT
    #--------
    public function saveProduct( $data ){
        $this->db->insert('productos', $data);
            return $this->db->insert_id();
    }

    /*public function saveImagenProduct( $data ){
        
        $this->db->insert('galeria_productos', $data);
        return $this->db->insert_id();
    }*/
    public function saveImagenProduct( $data ){
        
        $this->db->insert_batch('galeria_productos', $data);
        return true;
    }
    #--------
    # DELETE
    #--------
    public function deleteProduct( $id ){
        $query = $this->db
                ->where('id', $id)
                ->update('productos', array('estado'=>_ELIMINADO));
        return $query;
    }

    public function deleteImageProduct( $producto_id ){
        $query = $this->db
                ->where('producto_id', $producto_id)
                ->update('galeria_productos', array('estado'=>_ELIMINADO));
        return $query;
    }
    #elimina las categorias relacionadas
    public function deleteCategoryProduct($id){
        $this->db->where('producto_id', $id);
        return $this->db->delete('categorias_productos');
    }
    #--------
    # COMPROBATION
    #--------
    public function existProduct( $id ){
        $query = $this->db
                ->select('*')
                ->from('productos')
                ->where('id',$id)
                ->get();

            return $query->num_rows();
    }

    public function getGaleriaProductoId( $id){
        $query = $this->db
                ->where('id', $id)
                ->update('product', $data);
        return $query;
    }

    
    
}