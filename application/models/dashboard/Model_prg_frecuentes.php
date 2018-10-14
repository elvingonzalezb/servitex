<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_prg_frecuentes extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function getPrgfrecuentes( ){

        $query = $this->db
                ->select('p.id, p.pregunta, p.respuesta, p.autor,p.creado, p.orden, p.mail_autor, p.estado')
                ->from('preguntas_frecuentes p')
                ->join('idiomas i', 'p.idioma_id=i.id')
                ->order_by('orden','asc')
                ->where('p.estado!=',_ELIMINADO)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getPrgfrecuentesById( $id ){

        $query = $this->db
                ->select('*')
                    ->from('preguntas_frecuentes p')
                    ->join('idiomas i', 'p.idioma_id=i.id')
                    ->order_by('orden','asc')
                    ->where('p.estado!=',_ELIMINADO)
                    ->where('p.id', $id)
                    ->get()
                    ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }
    #--------
    # UPDATE
    #--------
    public function UpdatePregFrecuentes( $id , $data ){

        $query = $this->db
                ->where('id', $id)
                ->update('preguntas_frecuentes', $data);
            return $query;
    }
    #--------
    # INSERT
    #--------
    public function savePrgFrecuentes( $data ){

        $this->db->insert('preguntas_frecuentes', $data);
            return $this->db->insert_id();
    }

}
