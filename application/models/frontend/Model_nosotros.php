<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_nosotros extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
        public function getSecciones($id){
            $query = $this->db
                    ->select('*')
                    ->from('secciones')
                    ->where('estado',_ACTIVO)
                    ->where('id', $id)
                    ->get()
                    ->row_array();
                return ( ! empty($query) && is_array($query) ? $query : []); 
        }

}
