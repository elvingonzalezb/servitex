<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_galeria_solo_fotos extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    #--------
    # GET
    #--------

    //////////////////////////////////////////////////////////////
    //GALERIA FOTOS

    public function getGaleriaFotosPaginacion($limit,$offset){
        $query = $this->db
                ->select('f.id,f.nombre,f.imagen,f.imagen_title,f.estado,f.orden,f.destacado')
                ->from('fotos f')
                ->join('albumes_fotos a', 'a.id = f.album_id','left')
                ->order_by('orden','asc')
                ->where('f.estado',_ACTIVO)
                ->where('f.album_id is null')
                ->limit($limit, $offset)
                ->get()
                ->result_array();
                
            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function numFotos() {
        
        $query = $this->db
                ->select('id')
                ->from('fotos')
                ->where('estado',_ACTIVO)
                ->where('album_id is null')
                ->get();

            return $query->num_rows();
    }

}