<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prg_Frecuentes extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('frontend/model_prg_frecuentes','Prg_frecuentes');
    }

	public function index()
	{
		///$this->load->view('welcome_message');
	}
	
	public function lista() {	

		#HEADER - SEO ----------
	    $seccion = 'prg_frecuentes';
	    $seo = getSeccion($seccion);
	    $datapanel['seo'] = $seo;
		$datapanel['body'] 		= $seccion;
  		$datapanel['dataset'] 	= $this->Prg_frecuentes->getPrgfrecuentes();
		$datapanel['banner'] = getSecciones(6);

		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$this->load->view("frontend/includes/template", $datapanel);
	}

}

