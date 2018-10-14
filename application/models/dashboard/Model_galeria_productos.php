<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_galeria_productos extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function getGaleryByProduct( $id ){
        $query = $this->db
                ->select([
                    'g.id',
                    'g.imagen_title',
                    'g.estado',
                    'g.imagen',
                    'g.producto_id'
                    ])
                ->from('galeria_productos g')
                ->where('producto_id', $id )
                ->where('estado', _ACTIVO)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getGaleryById( $id ){
        $query = $this->db
                ->select([
                    'id',
                    'imagen_title',
                    'estado',
                    'imagen',
                    'producto_id'
                    ])
                ->from('galeria_productos')
                //->where('estado', _ACTIVO)
                ->where('id', $id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }
    #--------
    # UPDATE
    #--------
    public function updateGalery( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('galeria_productos', $data);
            return $query;
    }
    #--------
    # INSERT
    #--------
    public function saveGalery( $data ){
        $this->db->insert('galeria_productos', $data);
            return $this->db->insert_id();
    }

    public function saveImagenGalery( $data ){

        $this->db->insert('galeria_productos', $data);
            return $this->db->insert_id();
    }
    #--------
    # DELETE
    #--------
    public function deleteGalery( $id ){
        $this->db->where('id', $id);
        return $this->db->delete('galeria_productos');
    }

    public function deleteImageGalery( $id ){
        $query = $this->db
                ->where('id', $id)
                ->update('galeria_productos', array('estado'=>_ELIMINADO));
        return $query;
    }

}
