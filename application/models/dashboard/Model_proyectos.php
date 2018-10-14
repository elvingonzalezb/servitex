<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_proyectos extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    #--------
    # GET
    #--------

    ///////////////////////////////////////////////////////////////////////
    //PROYECTOS

     public function getProyectos(){
        $query = $this->db
                ->select('id,nombre,imagen,imagen_title,orden,estado,destacado')
                ->from('proyectos')
                ->order_by('orden','asc')
                ->where('estado!=',_ELIMINADO)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getProyectosById($id){
         $query = $this->db
                ->select('*')
                ->from('proyectos p')
                ->order_by('orden','asc')
                ->where('p.estado!=',_ELIMINADO)
                ->where('id',$id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }
    
    public function UpdateProyectos( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('proyectos', $data);
            return $query;
    }

    public function saveProyectos( $data ){
        $this->db->insert('proyectos', $data);
            return $this->db->insert_id();
    }

    //////////////////////////////////////////////////////////////
    //GALERIA DE PROYECTOS

    public function getGaleriasFoto(){
        $query = $this->db
                ->select('id,nombre,imagen,imagen_title,estado,orden,destacado')
                ->from('galerias_proyecto')
                ->order_by('orden','asc')
                ->where('estado!=',_ELIMINADO)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getGaleriasProyecto($id){
        $query = $this->db
                ->select('id,nombre,imagen,imagen_title,estado,orden,destacado,proyecto_id')
                ->from('galerias_proyecto g')
                ->order_by('orden','asc')
                ->where('estado!=',_ELIMINADO)
                ->where('proyecto_id',$id)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getTrabajoById( $id ){

        $query = $this->db
                ->select(['g.*',
                    'g.proyecto_id as proyecto_id'])
                ->from('galerias_proyecto g')
                ->order_by('g.orden','asc')
                ->where('g.estado!=',_ELIMINADO)
                ->where('g.id', $id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    #--------
    # UPDATE
    #--------
    public function UpdateGaleriaProyectos( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('galerias_proyecto', $data);
            return $query;
    }
    #--------
    # INSERT
    #--------
    public function saveTrabajo( $data ){
        $this->db->insert('galerias_proyecto', $data);
            return $this->db->insert_id();
    }
  
    ///////////////////////////////////////////////////////////////////////
    //FOTOS DEL TRABAJO

     public function getFotosProyecto($id) {

        $query = $this->db
                ->select('id,nombre,imagen,imagen_title,estado,orden,galeria_proyecto_id')
                ->from('fotos_proyecto')
                ->order_by('orden','asc')
                ->where('estado!=',_ELIMINADO)
                ->where('galeria_proyecto_id', $id)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    #--------
    # UPDATE
    #--------
    public function UpdateFotosProyecto( $id , $data ){

        $query = $this->db
                ->where('id', $id)
                ->update('fotos_proyecto', $data);
            return $query;
    }

    public function getFotoById( $id ){

        $query = $this->db
                ->select('id,nombre,imagen,imagen_title,estado,orden,galeria_proyecto_id as galeria_proyecto_id')
                ->from('fotos_proyecto')
                ->order_by('orden','asc')
                ->where('estado!=',_ELIMINADO)
                ->where('id', $id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

     #--------
    # INSERT
    #--------
    public function saveFoto( $data ){
        $this->db->insert('fotos_proyecto', $data);
            return $this->db->insert_id();
    }


}
