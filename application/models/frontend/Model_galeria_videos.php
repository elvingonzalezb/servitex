<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_galeria_videos extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
  
    //////////////////////////////////////////////////////////////
    //GALERIA VIDEOS

    public function getGaleriaVideosPaginacion($id,$limit,$offset){
        $query = $this->db
                ->select('v.id,v.nombre,v.codigo_video,v.video_title,v.estado,v.orden,v.destacado,,v.ruta_amazon')
                ->from('videos v')
                ->join('albumes_videos a', 'a.id = v.album_id','left')
                ->order_by('orden','asc')
                ->where('v.estado',_ACTIVO)
                ->where('a.id',$id)
                ->limit($limit, $offset)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getGaleriaVideosById( $id ){

        $query = $this->db
                ->select('v.*,a.seo_title,a.seo_description,a.seo_keywords')
                ->from('videos v')
                ->join('albumes_videos a', 'a.id = v.album_id','left')
                ->order_by('orden','asc')
                ->where('v.estado',_ACTIVO)
                ->where('v.id', $id)
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
  
    public function getCboAlbumesFotos(){
        $query = $this->db
                ->select('a.id as id,
                    a.nombre as nombre,
                    f.id as tipo_id,
                    f.nombre as tipo_nombre')
                ->from('albumes_fotos a')
                ->join('fotos f', 'f.album_id = a.id','left')
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

///////////////////////////////////////////////////////////////////////
//GALERIA ALBUMES DE VIDEOS

     public function getGaleriaAlbumesVideos($limit,$offset){

        $query = $this->db
                ->select('*,CONCAT_WS(\'-\',url,id) as url_id')
                ->from('albumes_videos')
                ->order_by('orden','asc')
                ->where('estado',_ACTIVO)
                ->limit($limit, $offset)
                ->get()
                ->result_array();

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

    public function getAlbumFotosTreeForParentId($id) {
        $albumes = array();
        $this->db->from('albumes_fotos');
        $this->db->where('estado', $id);
        $result = $this->db->get()->result();
        foreach ($result as $mainAlbum) {
            $album = array();
            $album['id'] = $mainAlbum->id;
            $album['nombre'] = $mainAlbum->nombre;
            $album['imagen'] = $mainAlbum->imagen;
            $album['imagen_title'] = $mainAlbum->imagen_title;

            $albumes[$mainAlbum->id] = $album;
        }
        return $albumes;
    }

    public function numAlbumes() {

        $query = $this->db
                ->select('id')
                ->from('albumes_videos')
                ->where('estado',_ACTIVO)
                ->get();

            return $query->num_rows();
    }

    public function numVideos($id) {

        $query = $this->db
                ->select('id')
                ->from('videos')
                ->where('estado',_ACTIVO)
                ->where('album_id',$id)
                ->get();

            return $query->num_rows();
    }

}
