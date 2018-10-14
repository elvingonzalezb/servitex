<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeria_solo_fotos extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->model('frontend/model_galeria_solo_fotos', 'Galeria_fotos');

    }

	public function index()
	{
		///$this->load->view('welcome_message');
	}
	
	public function listaFotos() {	
    
        #HEADER - SEO ----------
        $seccion = 'galeria_albumes_fotos'; 
        $seo = getSeccion($seccion);
        $datapanel['seo'] = $seo;
          
    		#------------------------
      	# Paginacion
      	#------
      	$config['base_url'] = base_url().'galeria_solo_fotos';
      	$config['total_rows'] = $this->Galeria_fotos->numFotos();
      	$config['per_page'] = 3;
      	$config['first_tag_open'] = '<li>';
      	$config['first_tag_close'] = '</li>';
      	$config['prev_tag_open'] = '<li class="prev">';
      	$config['prev_link'] = '<i class="fa fa-angle-left"></i>';
      	$config['next_link'] = '<i class="fa fa-angle-right"></i>';
      	$config['prev_tag_close'] = '</li>';
      	$config['next_tag_open'] = '<li class="next">';
      	$config['next_tag_close'] = '</li>';
     	  $config['last_tag_open'] = '<li>';
      	$config['last_tag_close'] = '</li>';
      	$config['cur_tag_open'] = '<li class="active"><a>';
      	$config['cur_tag_close'] = '</a></li>';
      	$config['num_tag_open'] = '<li>';
      	$config['num_tag_close'] = '</li>';
      	#------
  	    # Paginacion
  	    #------------
  	    $this->pagination->initialize($config);
  	    $datapanel['paginacion'] = $this->pagination->create_links();
        $offset = $this->uri->segment(2,0);

  	    $datapanel['dataset'] = $this->Galeria_fotos->getGaleriaFotosPaginacion($config['per_page'],$offset);

    	  if( empty($datapanel['dataset'])){ 
    	          $this->load->view("frontend/includes/template", ['body'=>'error_404']);
    	  }

    	  $datapanel['body']    = 'galeria_fotos_detalle';
        $datapanel['banner'] = getSecciones(11);
    		$this->parser->parse("frontend/includes/template", $datapanel);
		
	}

}