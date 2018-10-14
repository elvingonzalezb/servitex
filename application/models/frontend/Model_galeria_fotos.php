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

    #-------------------------------
    public function getAlbumById($id){
        $query = $this->db
                ->select('id,nombre,descripcion')
                ->from('albumes_fotos')
                ->where('estado',_ACTIVO)
                ->where('id',$id)
                ->get()
                ->row_array();
        $query['fotos'] = $this->getGaleriaFotosByAlbum($query['id']);
            return ( ! empty($query) && is_array($query) ? $query : []);
    }
    public function getGaleriaFotosByAlbum($id){
        $query = $this->db
                ->select('id,nombre,imagen')
                ->from('fotos')
                ->where('estado',_ACTIVO)
                ->where('album_id',$id)
                ->get()
                ->result_array();
        return ( ! empty($query) && is_array($query) ? $query : []);
    }
    public function getBanners(){
        $query = $this->db
                ->select('id,nombre,imagen')
                ->from('fotos')
                ->where('estado',_ACTIVO)
                ->where('album_id is null')
                ->get()
                ->result_array();
        return ( ! empty($query) && is_array($query) ? $query : []);
    }
    
    #-------------------------------

    public function getGaleriaFotosPaginacion($id,$limit,$offset){
        $query = $this->db
                ->select('f.id,f.nombre,f.imagen,f.imagen_title,f.estado,f.orden,f.destacado')
                ->from('fotos f')
                ->join('albumes_fotos a', 'a.id = f.album_id','left')
                ->order_by('orden','asc')
                ->where('f.estado',_ACTIVO)
                ->where('a.id',$id)
                ->limit($limit, $offset)
                ->get()
                ->result_array();
            // var_dump('<pre>',$query);exit();
            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getGaleriaFotosById( $id ){

        $query = $this->db
                ->select('f.*,a.seo_title,a.seo_description,a.seo_keywords')
                ->from('fotos f')
                ->join('albumes_fotos a', 'a.id = f.album_id','left')
                ->order_by('orden','asc')
                ->where('f.estado',_ACTIVO)
                ->where('f.id', $id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

 
///////////////////////////////////////////////////////////////////////
//GALERIA ALBUMES DE FOTOS


     public function getGaleriaAlbumesFotos($limit,$offset){

        $query = $this->db
                ->select('*,CONCAT_WS(\'-\',url,id) as url_id')
                ->from('albumes_fotos')
                ->order_by('orden','asc')
                ->where('estado',_ACTIVO)
                ->limit($limit, $offset)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function numAlbumes() {
        $query = $this->db
                ->select('id')
                ->from('albumes_fotos')
                ->where('estado',_ACTIVO)
                ->get();

            return $query->num_rows();
    }

    public function numFotos($id) {
        
        $query = $this->db
                ->select('id')
                ->from('fotos')
                ->where('estado',_ACTIVO)
                ->where('album_id',$id)
                ->get();

            return $query->num_rows();
    }

}
