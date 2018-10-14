<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_servicios extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function getServicios($id){

        $query = $this->db
                ->select('s.id,s.nombre,s.orden,s.estado,s.destacado,g.imagen,g.imagen_title,g.id as image_id,
                    c.nombre as nombre_categoria,c.id as categoria_id')
                ->from('servicios s')
                ->join('galeria_servicios g', 'g.servicios_id = s.id','left')
                ->join('categorias c', 's.categoria_id = c.id','left')
                ->order_by('orden','asc')
                ->where('s.estado!=',_ELIMINADO)
                ->where('c.id',$id)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getServiciosPorId( $id ){

        $query = $this->db
                ->select(['s.*','g.imagen as imagen','g.imagen_title as imagen_title','g.id as image_id',
                    'c.nombre as nombre_categoria','c.id as categoria_id'])
                ->from('servicios s')
                ->join('galeria_servicios g', 'g.servicios_id = s.id','left')
                ->join('categorias c', 's.categoria_id = c.id','left')
                ->order_by('orden','asc')
                ->where('s.estado!=',_ELIMINADO)
                ->where('s.id', $id)
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

    public function deleteServiciosPorCategoria( $id ){

        $this->db->where('categoria_id', $id);
        return $this->db->update('servicios',array('estado'=>_ELIMINADO));

    }

    /*****************CATEGORIA DE SERVICIOS********************/

    public function getCategoria(){

        $query = $this->db
                ->select('id,nombre,orden,estado,destacado,imagen,imagen_title')
                ->from('categorias')
                ->where('categorias.tipo_categoria_id',_CAT_SERVICIO)
                ->where('categorias.estado!=',_ELIMINADO)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }
    public function getCategoriaById( $id ){

        $query = $this->db
                ->select('*')
                ->from('categorias')
                ->where('categorias.tipo_categoria_id',_CAT_SERVICIO)
                ->where('categorias.estado!=',_ELIMINADO)
                ->where('id',$id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getCategoriaServicio(){

        $query = $this->db
                ->select('c.id as id,c.nombre as nombre,t.id as tipo_id,t.nombre as tipo_nombre')
                ->from('categorias c')
                ->join('tipo_categorias t', 'c.tipo_categoria_id = t.id','left')
                ->where('c.tipo_categoria_id',_CAT_SERVICIO)
                ->where('c.estado!=',_ELIMINADO)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function saveCategory( $data ){
        $data['creado']=date('Y-m-d H:i:s');
        $this->db->insert('categorias', $data);
        return $this->db->insert_id();
    }

    public function UpdateCategorias( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('categorias', $data);
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
