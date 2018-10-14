<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_articulos extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function getArticulos( ){
        $query = $this->db
                ->select(['a.id','a.nombre','a.orden','a.destacado','a.estado as estado','a.creado',
                    'g.imagen','g.imagen_title as imagen_title'])
                ->from('articulos a')
                ->join('galeria_articulos g', 'g.articulo_id = a.id','left')
                ->order_by('a.creado','desc')
                ->where('a.estado!=',_ELIMINADO)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getArticulosById( $id ){

        $query = $this->db
                ->select(['a.*','g.imagen as imagen','g.imagen_title as imagen_title','a.estado as estado',
                    'g.id as image_id'])
                ->from('articulos a')
                ->join('galeria_articulos g', 'g.articulo_id = a.id','left')
                ->order_by('a.creado','desc')
                ->where('a.estado!=',_ELIMINADO)
                ->where('a.id', $id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []); 
    }

    public function getComentariosByArticulo( $id ){

        $query = $this->db
                ->select('c.*')
                ->from('comentarios c')
                ->join('articulos a', 'c.articulo_id = a.id','left')
                ->where('a.estado!=',_ELIMINADO)
                ->where('c.articulo_id', $id)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);  
    }

    public function getComentariosById( $id ){
        $query = $this->db
                ->select('*')
                ->from('comentarios')
                ->where('estado!=',_ELIMINADO)
                ->where('id',$id)
                ->get()
                ->row_array();
            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    #--------
    # UPDATE
    #--------
    public function UpdateArticulos( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('articulos', $data);
            return $query;
    }
    public function updateImagenArticulos( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('galeria_articulos', $data);
            return $query;
    }

    public function UpdateComentarios( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('comentarios', $data);
            return $query;
    }
    #--------
    # INSERT
    #--------
    public function saveArticulos( $data ){
        $data['creado']=date('Y-m-d H:i:s');
        $this->db->insert('articulos', $data);
            return $this->db->insert_id();
    }

    public function saveImagenArticulos( $data ){
        $this->db->insert('galeria_articulos', $data);
            return $this->db->insert_id();
    }

}
