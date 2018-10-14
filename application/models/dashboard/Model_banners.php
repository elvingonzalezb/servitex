<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_banners extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function getBannersByType(){
        $query = $this->db
                ->select('*')
                ->from('banners')
                ->order_by('orden','asc')
                // ->where('tipo_banner_id', $id)
                ->where('estado!=',_ELIMINADO)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getBannersById( $id ){
        $query = $this->db
                ->select('*')
                ->from('banners')
                ->order_by('orden','asc')
                ->where('id', $id)
                ->where('estado!=',_ELIMINADO)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    #--------
    # UPDATE
    #--------

    public function UpdateBanners( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('banners', $data);
                
            return $query;
    }

    #--------
    # INSERT
    #--------

    public function saveBanners( $data ){
        $data['creado']=date('Y-m-d H:i:s');
        $this->db->insert('banners', $data);
            return $this->db->insert_id();
    }

}
