<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_contactenos extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    
    public function getContactenos($id){

            $query = $this->db
                    ->select('*')
                    ->from('sedes')
                    ->where('estado',_ACTIVO)
                    ->where('id', $id)
                    ->get()
                    ->row_array();
                return ( ! empty($query) && is_array($query) ? $query : []);        
    }

     public function saveContactenosId( $data ){
        $data['creado'] = date('Y-m-j H:i:s');
        $this->db->insert('mensajes', $data);
            return $this->db->insert_id();
    }

}
