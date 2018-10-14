<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_solo_servicios extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function getServicios(){

        $query = $this->db
                ->select('s.id,s.nombre,s.orden,s.estado,s.destacado,g.imagen,g.imagen_title,g.id as image_id')
                ->from('servicios s')
                ->join('galeria_servicios g', 'g.servicios_id = s.id','left')
                ->order_by('orden','asc')
                ->where('s.estado!=',_ELIMINADO)
                ->where('s.categoria_id is null')
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getServiciosPorId( $id ){

        $query = $this->db
                ->select(['s.*','g.imagen as imagen','g.imagen_title as imagen_title','g.id as image_id'])
                ->from('servicios s')
                ->join('galeria_servicios g', 'g.servicios_id = s.id','left')
                ->order_by('orden','asc')
                ->where('s.estado!=',_ELIMINADO)
                ->where('s.id', $id)
                ->where('s.categoria_id is null')
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);    
    }
   
   public function saveImagenServicios( $data ){
        $this->db->insert('galeria_servicios', $data);
            return $this->db->insert_id();
    }
    #--------
    # INSERT
    #--------
    public function saveServicios( $data ){
        $data['creado']=date('Y-m-d H:i:s');
        $this->db->insert('servicios', $data);
            return $this->db->insert_id();
    }

    public function UpdateServicios( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('servicios', $data);
            return $query;
    }

    public function updateImagenServicios( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('galeria_servicios', $data);
            return $query;
    }
 
    //SOLICITUD INFORMACION
    public function getConsultaServicios(){

        $query = $this->db
                ->select('*')
                ->from('solicitud_servicios')
                ->order_by('creado','desc')
                ->where('estado!=',_ELIMINADO)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getSolicitudById( $id ){
        $query = $this->db
                ->select('*')
                    ->from('solicitud_servicios')
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
                ->update('solicitud_servicios', $data);
            return $query;
    }
   

}
