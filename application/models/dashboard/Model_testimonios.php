<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_testimonios extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    #--------
    # GET
    #--------

     public function getTestimonios(){
        $query = $this->db
                ->select('*')
                ->from('testimonios')
                ->where('estado!=',_ELIMINADO)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getTestimonioById($id){
         $query = $this->db
                ->select('*')
                ->from('testimonios')
                ->where('estado!=',_ELIMINADO)
                ->where('id=',$id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }
    
    public function UpdateTestimonio( $id , $data ){
        
        $query = $this->db
                ->where('id', $id)
                ->update('testimonios', $data);
            return $query;
    }

    public function saveTestimonios( $data ){

        $this->db->insert('testimonios', $data);
            return $this->db->insert_id();
    }

}
