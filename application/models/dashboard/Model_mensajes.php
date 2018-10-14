<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_mensajes extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function getMensajes(){
        $query = $this->db
                ->select('id,nombre,creado,estado')
                ->from('mensajes')
                ->order_by('creado')
                ->where('estado!=',_ELIMINADO)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getMensajesById( $id ){
        $query = $this->db
                ->select('*')
                    ->from('mensajes')
                    ->order_by('creado','desc')
                    ->where('estado!=',_ELIMINADO)
                    ->where('id',$id)
                    ->get()
                    ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }
    #--------
    # UPDATE
    #--------
    public function UpdateMensajes( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('mensajes', $data);
            return $query;
    }

    public function leidoMensaje($id_mensaje, $data) {
        $this->db->where('id', $id_mensaje);
        $this->db->update('mensajes', $data);
    }   
     
}
