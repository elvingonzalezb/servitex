<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_clientes_web extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function getClientes( ){
        $query = $this->db
                ->select('*')
                ->from('clientes_web')
                ->order_by('orden','asc')
                ->where('estado!=',_ELIMINADO)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getClientesById( $id ){

        $query = $this->db
                ->select('*')
                ->from('clientes_web')
                ->order_by('orden','asc')
                ->where('estado!=',_ELIMINADO)
                ->where('id', $id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);  

    }

    public function saveClientesWeb( $data ){

        $this->db->insert('clientes_web', $data);
            return $this->db->insert_id();
    }

    #--------
    # UPDATE
    #--------
    public function UpdateClientes( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('clientes_web', $data);
            return $query;
    }
 
}
