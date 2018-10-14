<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_inicio extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function getBannerPromociones(){
        $query = $this->db
                ->select('*')
                ->from('banners')
                ->where('tipo_banner_id', 2)
                ->where('estado', _ACTIVO)
                ->order_by('creado','desc')
                ->limit(2)
                ->get()
                ->result_array();
        return $query;
    }
    #--------
    # INSERT
    #--------
    public function addSuscripcion( $data ){
        $this->db->insert('suscriptores', $data);
        return $this->db->insert_id();
    }

    public function getClientes( $limit ){
        $query = $this->db
                ->select("*")
                ->from('clientes_web')
                ->where('estado',_ACTIVO)
                ->limit($limit)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getTextiles($limit,$offset,$id){
        $query = $this->db
            ->select('*,imagen,imagen_title, CONCAT_WS(\'-\',url,id) as url')
            ->from('categorias')
            ->order_by('orden','asc')
            ->where('estado',_ACTIVO)
            ->where('tipo_categoria_id',_CAT_PRODUCTO)
            ->where('padre_id',$id)
            ->limit($limit, $offset)
            ->get()
            ->result_array();

        return ( ! empty($query) && is_array($query) ? $query : []);
    }

    #--------
    # UPDATE
    #-------- 

    #--------
    # DELETE
    #-------- 

}
