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
                ->select(['p.*','g.imagen','g.imagen_title'])
                ->from('productos p')
                ->join('galeria_productos g', 'g.producto_id = p.id','inner')
                ->order_by('orden','desc')
                ->where('p.estado !=',_ELIMINADO)
                ->where('g.estado',_ACTIVO)
                ->where('p.categoria_id', $id )
                ->group_by('p.id' )
                ->get()
                ->result_array();
            return ( ! empty($query) && is_array($query) ? $query : []);
    }
    public function getProductById( $id ){
        $query = $this->db
                ->select('*')
                ->from('productos')
                ->where('estado !=', _ELIMINADO)
                ->where('id', $id)
                ->get()
                ->row_array();
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
        $data['creado']=date('Y-m-d H:i:s');
        $this->db->insert('productos', $data);
            return $this->db->insert_id();
    }
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

    //SOLICITUD INFORMACION
    // consulta productos
    public function getConsultaProductos(){

        $query = $this->db
                ->select('*')
                ->from('solicitud_productos')
                ->order_by('creado','desc')
                ->where('estado!=',_ELIMINADO)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getSolicitudById( $id ){
        $query = $this->db
                ->select('*')
                    ->from('solicitud_productos')
                    ->order_by('creado','desc')
                    ->where('estado!=',_ELIMINADO)
                    ->where('id',$id)
                    ->get()
                    ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function updateSolicitud( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('solicitud_productos', $data);
            return $query;
    }

}