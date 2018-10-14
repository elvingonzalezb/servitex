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
                ->select('p.id,p.pregunta,p.respuesta,p.creado,p.mail_autor')
                ->from('preguntas_frecuentes p')
                ->join('idiomas i', 'p.idioma_id=i.id')
                ->order_by('orden','desc')
                ->where('p.estado',_ACTIVO)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getPrgfrecuentesById( $id ){
        $query = $this->db
                ->select('p.id,p.pregunta,p.respuesta,p.creado,p.mail_autor')
                    ->from('preguntas_frecuentes p')
                    ->join('idiomas i', 'p.idioma_id=i.id')
                    ->order_by('orden','desc')
                    ->where('p.estado',_ACTIVO)
                    ->where('p.id', $id)
                    ->get()
                    ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

}
