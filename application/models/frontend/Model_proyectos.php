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
    // PROYECTOS

    public function getProyectos($limit,$offset){

        $query = $this->db
                ->select('*,CONCAT_WS(\'-\',url,id) as url_id')
                ->from('proyectos')
                ->order_by('orden','asc')
                ->where('estado',_ACTIVO)
                ->limit($limit, $offset)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    // public function getProyectosById(){

    //     $query = $this->db
    //             ->select('id')
    //             ->from('proyectos')
    //             ->where('estado!=',_ACTIVO)
    //             ->get()
    //             ->row_array();

    //         return ( ! empty($query) && is_array($query) ? $query : []);
    // }
 
    //////////////////////////////////////////////////////////////
    //GALERIA PROYECTOS

    public function getGaleriasProyectoPaginacion( $id, $limit, $offset ){

        $query = $this->db
                ->select('g.id,g.url,CONCAT_WS(\'-\',g.url,g.id) as url_id,g.nombre,g.imagen,g.imagen_title,g.estado,g.orden,g.destacado,p.url')
                ->from('galerias_proyecto g')
                ->join('proyectos p','g.proyecto_id = p.id','left')
                ->order_by('orden','asc')
                ->where('g.estado',_ACTIVO)
                ->where('g.proyecto_id',$id)
                ->limit($limit, $offset)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getGaleriasProyectoById( $id ){

        $query = $this->db
                ->select('g.id,p.seo_title,p.seo_description,p.seo_keywords')
                ->from('galerias_proyecto g')
                ->join('proyectos p','g.proyecto_id = p.id','left')
                ->where('g.estado',_ACTIVO)
                ->where('g.id', $id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    ///////////////////////////////////////////////////////////////////////
    // FOTOS DE LOS TRABAJOS DEL PROYECTO
    
    public function getFotosPaginacion( $id, $limit, $offset ){

        $query = $this->db
                ->select('id,nombre,imagen,imagen_title,estado,orden')
                ->from('fotos_proyecto')
                ->order_by('orden','asc')
                ->where('estado',_ACTIVO)
                ->where('galeria_proyecto_id', $id)
                ->limit($limit, $offset)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getFotosById( $id ){

        $query = $this->db
                ->select('id')
                ->from('fotos_proyecto')
                ->where('estado',_ACTIVO)
                ->where('id', $id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }


    public function numProyectos() {

        $query = $this->db
                ->select('id')
                ->from('proyectos')
                ->where('estado',_ACTIVO)
                ->get();

            return $query->num_rows();
    }

    public function numGaleriasProyecto( $id ) {

        $query = $this->db
                ->select('id')
                ->from('galerias_proyecto')
                ->where('estado',_ACTIVO)
                ->where('proyecto_id',$id)
                ->get();

            return $query->num_rows();
    }

     public function num_fotos( $id ) {

        $query = $this->db
                ->select('id')
                ->from('fotos_proyecto f')
                ->where('estado',_ACTIVO)
                ->where('galeria_proyecto_id',$id)
                ->get();

            return $query->num_rows();
    }

}
