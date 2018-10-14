<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_galeria_fotos extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    #--------
    # GET
    #--------

    //////////////////////////////////////////////////////////////
    //GALERIA FOTOS

    public function getGaleriaFotos($id){
        $query = $this->db
                ->select('f.id,f.nombre,f.imagen,f.imagen_title,f.estado,f.orden,f.destacado')
                ->from('fotos f')
                ->join('albumes_fotos a', 'a.id = f.album_id','left')
                ->order_by('orden','asc')
                ->where('f.estado!=',_ELIMINADO)
                ->where('f.album_id',$id)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getGaleriaFotosById( $id ){

        $query = $this->db
                ->select(['f.*',
                    'a.id as alb_foto_id'])
                ->from('fotos f')
                ->join('albumes_fotos a', 'a.id = f.album_id','left')
                ->order_by('orden','asc')
                ->where('f.estado!=',_ELIMINADO)
                ->where('f.id', $id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    #--------
    # UPDATE
    #--------
    public function UpdateGaleriaFotos( $id , $data ){

        $query = $this->db
                ->where('id', $id)
                ->update('fotos', $data);
            return $query;
    }
    #--------
    # INSERT
    #--------
    public function saveFotos( $data ){

        $this->db->insert('fotos', $data);
            return $this->db->insert_id();
    }
  
///////////////////////////////////////////////////////////////////////
//GALERIA ALBUMES DE FOTOS

     public function getGaleriaAlbumesFotos(){

        $query = $this->db
                ->select('id,nombre,imagen,imagen_title,orden,estado,destacado')
                ->from('albumes_fotos')
                ->order_by('orden','asc')
                ->where('estado!=',_ELIMINADO)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getGaleriaAlbumesFotosById($id){

         $query = $this->db
                ->select('*')
                ->from('albumes_fotos a')
                ->order_by('orden','asc')
                ->where('a.estado!=',_ELIMINADO)
                ->where('id',$id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }
    
    public function UpdateGaleriaAlbumesFotos( $id , $data ){

        $query = $this->db
                ->where('id', $id)
                ->update('albumes_fotos', $data);
            return $query;
    }

    public function saveAlbumesFotos( $data ){

        $this->db->insert('albumes_fotos', $data);
            return $this->db->insert_id();
    }

    //////////////////////////////////////////////////////////////
    //SOLO FOTOS

    public function getGaleriaSoloFotos(){
        $query = $this->db
                ->select('f.id,f.nombre,f.imagen,f.imagen_title,f.estado,f.orden,f.destacado')
                ->from('fotos f')
                ->join('albumes_fotos a', 'a.id = f.album_id','left')
                ->where('f.estado!=',_ELIMINADO)
                ->where('f.album_id is null')
                ->order_by('orden','asc')
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

}
