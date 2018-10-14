<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_articulos extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function numArticulos(){

        $query = $this->db
                ->select('id')
                ->from('articulos')
                ->where('estado',_ACTIVO)
                ->get();
        return $query->num_rows();

    }

    public function getArticulos( $limit, $offset ){

        $query = $this->db
                ->select(['a.*', 'g.imagen', 'g.id as image_id'])
                ->from('articulos a')
                ->join('galeria_articulos g', 'g.articulo_id = a.id','left')
                ->order_by('a.creado','desc')
                ->where('a.estado',_ACTIVO)
                ->limit($limit, $offset)
                ->get()
                ->result_array();

                $array = array();   

                for ($i=0; $i < count($query); $i++) { 
                        $array[$i] = $query[$i];
                        $array[$i]['num_comentarios'] = $this->num_comentarios($query[$i]['id']);
                        $articulos[$i][]= $array;
                 }
                return $array;
    }
    
    public function num_comentarios( $id ) {

        $query = $this->db
                ->select('*')
                ->from('comentarios')
                ->where('articulo_id',$id)
                ->get();
        return $query->num_rows();
    }

    public function getArticulosById( $id ){

        $query = $this->db
                ->select(
                    'a.id as id,
                    a.nombre,
                    a.resumen,
                    a.descripcion as descripcion,
                    a.orden as orden,
                    a.destacado as destacado,
                    a.creado as creado,
                    a.autor as autor,
                    a.url as url,
                    a.seo_title as seo_title,
                    a.seo_description as seo_description,
                    a.seo_keywords as seo_keywords,
                    g.imagen as imagen,
                    g.imagen as imagen_title,
                    a.estado as estado,           
                    g.id as image_id'
                    )
                ->from('articulos a')
                ->join('galeria_articulos g', 'g.articulo_id = a.id','left')
                ->order_by('a.creado','desc')
                ->where('a.estado',_ACTIVO)
                ->where('a.id', $id)
                ->get()
                ->row_array();

                if( ! empty($query['id'])){ 
                    $query['num_comentarios'] = $this->num_comentarios( $query['id'] ); 
                    $query['comentarios'] = $this->Articulos->getArticulosComentarios($query['id']); 
                }

            return ( ! empty($query) && is_array($query) ? $query : []);  
    }


    public function getArticulosComentarios( $id ) {

        $query = $this->db
                ->select('*')
                ->from('comentarios')
                ->where('articulo_id',$id)
                ->get()
                ->result_array();

        return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function num_pag() {

        $query = $this->db->get("articulos");
        return $query->num_rows();

    }
    #--------
    # SAVE
    #--------

    public function saveComentarioId( $data ){
        $data['creado'] = date('Y-m-j H:i:s');
        $this->db->insert('comentarios', $data);
        return $this->db->insert_id();
    }

    public function getArticulosLimite( $limit ){

        $query = $this->db
                ->select(['a.*', 'g.imagen', 'g.id as image_id'])
                ->from('articulos a')
                ->join('galeria_articulos g', 'g.articulo_id = a.id','left')
                ->order_by('a.creado','desc')
                ->where('a.estado',_ACTIVO)
                ->limit($limit)
                ->get()
                ->result_array();

        return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getArticulosRecientes($limit){

        $query = $this->db
                ->select(['a.*', 'g.imagen', 'g.id as image_id'])
                ->from('articulos a')
                ->join('galeria_articulos g', 'g.articulo_id = a.id','left')
                ->order_by('a.creado','desc')
                ->where('a.estado',_ACTIVO)
                ->limit($limit)
                ->get()
                ->result_array();

                 return ( ! empty($query) && is_array($query) ? $query : []);
    }

}
