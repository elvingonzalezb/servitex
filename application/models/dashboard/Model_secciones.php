<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_secciones extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function getSections(){
        $query = $this->db
                ->select('*')
                ->from('secciones')
                ->order_by('orden','desc')
                //->where('status',1)
                //->where('type_sections_id', $id)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getSectionsById( $id ){
        $query = $this->db
                ->select('*')
                ->from('secciones')
                ->order_by('orden','desc')
                //->where('status',1)
                ->where('id', $id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }
    #--------
    # UPDATE
    #--------
    public function UpdateSections( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('secciones', $data);
            return $query;
    }
    #--------
    # INSERT
    #--------
    public function saveSections( $data ){
        $this->db->insert('secciones', $data);
            return $this->db->insert_id();
    }
    #--------
    # DELETE
    #--------
    public function deleteSections( $id ){
        $this->db->where('id', $id);
        return $this->db->delete('secciones');
    }

}
