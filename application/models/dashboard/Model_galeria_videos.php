<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_galeria_videos extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    #--------
    # GET
    #--------

    ///////////////////////////////////////////////////////////////////////
    //GALERIA ALBUMES DE VIDEOS

     public function getGaleriaAlbumesVideos(){
        $query = $this->db
                ->select('id,nombre,video,video_title,orden,estado,destacado,ruta_amazon')
                ->from('albumes_videos')
                ->order_by('orden','asc')
                ->where('estado!=',_ELIMINADO)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getGaleriaAlbumesVideosById($id){
         $query = $this->db
                ->select('*')
                ->from('albumes_videos')
                ->order_by('orden','asc')
                ->where('estado!=',_ELIMINADO)
                ->where('id',$id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }
    
    public function UpdateGaleriaAlbumesVideos( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('albumes_videos', $data);
            return $query;
    }

    public function saveAlbumesVideos( $data ){
        $this->db->insert('albumes_videos', $data);
            return $this->db->insert_id();
    }

     public function deleteGaleriaAlbumesVideos( $id ){
        $array = array('estado'=>0);
        $this->db->where('id', $id);
        return $this->db->update('albumes_videos',$array);
    }

    public function getAlbumVideosTreeForParentId($id) {
        $albumes = array();
        $this->db->from('albumes_videos');
        $this->db->where('estado', $id);
        $result = $this->db->get()->result();
        foreach ($result as $mainAlbum) {
            $album = array();
            $album['id'] = $mainAlbum->id;
            $album['nombre'] = $mainAlbum->nombre;
            $album['video'] = $mainAlbum->video;
            $album['video_title'] = $mainAlbum->video_title;

            $albumes[$mainAlbum->id] = $album;
        }
        return $albumes;
    }

    //////////////////////////////////////////////////////////////
    //GALERIA VIDEOS

    public function getGaleriaVideos($id){
        $query = $this->db
                ->select('v.id,v.nombre,v.codigo_video,v.video_title,v.estado,v.orden,v.destacado,v.ruta_amazon')
                ->from('videos v')
                ->join('albumes_videos a', 'a.id = v.album_id','left')
                ->order_by('orden','asc')
                ->where('v.estado!=',_ELIMINADO)
                ->where('a.id',$id)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getGaleriaVideosById( $id ){

        $query = $this->db
                ->select(['v.*','a.id as alb_vid_id'])
                ->from('videos v')
                ->join('albumes_videos a', 'a.id = v.album_id','left')
                ->order_by('orden','asc')
                ->where('v.estado!=',_ELIMINADO)
                ->where('v.id', $id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    #--------
    # UPDATE
    #--------
    public function UpdateGaleriaVideos( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('videos', $data);
            return $query;
    }
    #--------
    # INSERT
    #--------
    public function saveVideos( $data ){
        $this->db->insert('videos', $data);
            return $this->db->insert_id();
    }

    #--------
    # DELETE
    #--------
    public function deleteVideos( $id ){
        $array = array('estado'=>0);
        $this->db->where('id', $id);
        return $this->db->update('videos',$array);
    }
    
    public function getCboAlbumesVideos(){
        $query = $this->db
                ->select('a.id as id,a.nombre as nombre,
                    v.id as video_id,v.nombre as video_nombre')
                ->from('albumes_videos a')
                ->join('videos v', 'v.album_id = a.id','left')
                ->get()
                ->result_array();
            return ( ! empty($query) && is_array($query) ? $query : []);
    }


}
