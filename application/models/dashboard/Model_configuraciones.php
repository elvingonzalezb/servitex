<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_configuraciones extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function getConfiguraciones( ){
        $query = $this->db
                ->select('*')
                ->from('configuraciones')
                ->where('configuraciones.estado!=',_ELIMINADO)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

     public function getConfiguracionesById($id ){
        $query = $this->db
                ->select('*')
                ->from('configuraciones')
                ->where('configuraciones.estado!=',_ELIMINADO)
                ->where('configuraciones.id', $id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

     #--------
    # UPDATE
    #--------
    public function UpdateConfiguraciones( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('configuraciones', $data);
            return $query;
    }

    #--------
    # DELETE
    #--------
    public function deleteConfiguraciones( $id ){
        $array = array('estado'=>0);
        $this->db->where('id', $id);
        return $this->db->update('configuraciones',$array);
    }

    public function getConfiguracion($id) {
      
         $query = $this->db
                ->select('*')
                ->from('configuraciones')
                ->where('estado!=',_ELIMINADO)
                ->where('id', $id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }    
  

}
