<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_mapa extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
   
   public function getSede($id) {
        $this->db->where('id', $id);
        $query =  $this->db->get('sedes');
        return $query->row_array();
    }

    #--------
    # UPDATE
    #--------
    public function UpdateMapa( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('sedes', $data);
            return $query;
    }


}
