<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_solo_servicios extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    #--------
    # GET
    #--------
  
    public function getServicios($limit,$offset){
       
        $query = $this->db
                ->select('s.id as id,s.nombre,s.resumen,s.descripcion,s.url,CONCAT_WS(\'-\',s.url,s.id) as url_id,
                    g.imagen as imagen,g.imagen_title as imagen_title,g.id as image_id,
                    c.nombre as nombre_categoria,c.id as categoria_id')
                ->from('servicios s')
                ->join('galeria_servicios g', 'g.servicios_id = s.id','left')
                 ->join('categorias c', 's.categoria_id = c.id','left')
                ->where('s.estado',_ACTIVO)
                ->where('s.categoria_id is null')
                ->group_by('s.id' )
                ->order_by('s.orden','asc')
                ->limit($limit, $offset)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getServiciosById( $id ){
        $query = $this->db
                ->select('s.id as id,s.url,s.nombre,s.descripcion,s.seo_title,s.seo_description,s.seo_keywords,
                    g.imagen as imagen,g.imagen_title as imagen_title,g.id as image_id,
                    c.nombre as nombre_categoria','c.id as categoria_id')
                ->from('servicios s')
                ->join('galeria_servicios g', 'g.servicios_id = s.id','left')
                ->join('categorias c', 's.categoria_id = c.id','left')
                ->where('s.estado',_ACTIVO)
                ->where('s.id', $id)
                ->where('s.categoria_id is null')
                ->order_by('s.orden','asc')
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);  
    }    

    public function num() {
        $query = $this->db
                ->select('id')
                ->from('servicios')
                ->where('estado',_ACTIVO)
                ->where('categoria_id is null')
                ->get();

            return $query->num_rows();
    }

    public function getServiciosByCategoria(){
        $query = $this->db
                ->select('c.id as id,c.nombre as nombre,
                    t.id as tipo_id,t.nombre as tipo_nombre')
                ->from('categorias c')
                ->join('tipo_categorias t', 'c.tipo_categoria_id = t.id','left')
                ->where('c.tipo_categoria_id',_CAT_SERVICIO)
                ->where('c.estado',_ACTIVO)
                ->get()
                ->result_array();

                $array = array();    
                for ($i=0; $i < count($query); $i++) { 
                        $array[$i] = $query[$i];
                        $array[$i]['servicios'] = $this->servicios($query[$i]['id']);
                 }
                return $array;
    }

    public function servicios($id){
        $query = $this->db
                ->select(['s.*','CONCAT_WS(\'-\',s.url,s.id) as url_id',
                    'g.imagen as imagen','g.imagen_title as imagen_title','g.id as image_id',
                    'c.nombre as nombre_categoria','c.id as categoria_id'])
                ->from('servicios s')
                ->join('galeria_servicios g', 'g.servicios_id = s.id','left')
                 ->join('categorias c', 's.categoria_id = c.id','left')
                ->where('s.estado',_ACTIVO)
                ->where('s.categoria_id',$id)
                ->where('s.categoria_id is null')
                ->order_by('orden','asc')
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getServiciosRelacionados($limit){

        $query = $this->db
                ->select(['s.*','CONCAT_WS(\'-\',s.url,s.id) as url_id',
                    'g.imagen as imagen','g.imagen_title as imagen_title','g.id as image_id'])
                ->from('servicios s')
                ->join('galeria_servicios g', 'g.servicios_id = s.id','left')
                ->where('s.estado',_ACTIVO)
                ->where('s.categoria_id is null')
                ->order_by('orden','asc')
                ->limit($limit)
                ->get()
                ->result_array();

                 return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getServiciosArticulos(){
        $query = $this->db
                ->select(['a.*','CONCAT_WS(\'-\',a.url,a.id) as url_id', 'g.imagen', 'g.id as image_id'])
                ->from('articulos a')
                ->join('galeria_articulos g', 'g.articulo_id = a.id','left')
                ->order_by('orden','asc')
                ->where('a.estado',_ACTIVO)
                ->where('a.destacado',_ACTIVO)
                ->get()
                ->result_array();
                $array = array();    
                for ($i=0; $i < count($query); $i++) { 
                        $array[$i] = $query[$i];
                        $array[$i]['num_comentarios'] = $this->num_comentarios($query[$i]['id']);
                }
                return $array;
    }

     public function num_comentarios($id) {

        $query = $this->db
                ->select('*')
                ->from('comentarios')
                ->where('articulo_id',$id)
                ->get();

        return $query->num_rows();
    }

    public function saveSolicitudServicios( $data ){
        $data['creado'] = date('Y-m-j H:i:s');
        $this->db->insert('solicitud_servicios', $data);
        return $this->db->insert_id();
    }

    public function getSecciones($id){
            $query = $this->db
                    ->select('*')
                    ->from('secciones')
                    ->where('estado!=',_ELIMINADO)
                    ->where('id', $id)
                    ->get()
                    ->row_array();
                return ( ! empty($query) && is_array($query) ? $query : []); 
    }

}
