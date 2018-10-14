<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nosotros extends CI_Controller {

 	public function __construct() {
        parent::__construct();
        $this->load->model('frontend/Model_nosotros','Nosotros');
    }

	public function index()
	{
		//body
		$datapanel['body'] 		= 'nosotros';
		//data
		$datapanel['dataset'] = $this->Nosotros->getSecciones();

		$this->load->view("frontend/includes/template", $datapanel);
	}

	public function lista()
	{	
		#HEADER - SEO ----------
	    $seccion = 'nosotros';
	    $seo = getSeccion($seccion);
	    $datapanel['seo'] = $seo;
	    //body
		$datapanel['body'] 		= $seccion;
		//datapanel
		$datapanel['dataset'] = $this->Nosotros->getSecciones(2);
		$datapanel['seccion'] = getSecciones(2);

		if( empty($datapanel['dataset'])){ 
          	$this->load->view("frontend/includes/template", ['body'=>'error_404']);
    	}

			$this->load->view("frontend/includes/template", $datapanel);
	}
}
