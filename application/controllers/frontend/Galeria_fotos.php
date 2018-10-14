<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeria_fotos extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->model('frontend/model_galeria_fotos', 'Galeria_fotos');

    }

	public function index()
	{
		///$this->load->view('welcome_message');
	}
	
	/*public function listaAlbumes() {
    		#HEADER - SEO ----------
        $seccion = 'galeria_albumes_fotos';	
        $seo = getSeccion($seccion);
        $datapanel['seo'] = $seo;

        #------------------------
      	# Paginacion
      	#------
      	$config['base_url'] = base_url().'galeria_albumes_fotos/';
      	$config['total_rows'] = $this->Galeria_fotos->numAlbumes();
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

  		  $datapanel['dataset'] 	= $this->Galeria_fotos->getGaleriaAlbumesFotos($config['per_page'],$offset);
		
    		if( empty($datapanel['dataset'])){ 
              $this->load->view("frontend/includes/template", ['body'=>'error_404']);
          	}
          	
    		$datapanel['body'] 		= $seccion;
        $datapanel['banner'] = getSecciones(11);
    		$this->parser->parse("frontend/includes/template", $datapanel);
	}*/

  public function listaAlbumes() {
        #HEADER - SEO ----------
        $seccion = getSecciones(11);
        $datapanel['seo'] = $seccion;

        $datapanel['personalizados']   = $this->Galeria_fotos->getAlbumById(1);
        $datapanel['vendidos']   = $this->Galeria_fotos->getAlbumById(2);
        $datapanel['publicitarios']   = $this->Galeria_fotos->getAlbumById(3);
        $datapanel['promocionales']   = $this->Galeria_fotos->getAlbumById(4);
        $datapanel['novedades']   = $this->Galeria_fotos->getBanners();
        //echo "<pre>";print_r($datapanel);echo "</pre>";die;
        $datapanel['body']    = 'galeria_albumes_fotos';
        $datapanel['banner'] = $seccion;
        $this->parser->parse("frontend/includes/template", $datapanel);
  }

	public function listaFotos() {	
    
    		$id = $this->uri->segment(2,0);
        $id_galeria_album = substr(strrchr($id,'-'),1);
    		#------------------------
      	# Paginacion
      	#------
      	$config['base_url'] = base_url().'galeria_fotos/'.$id;
      	$config['total_rows'] = $this->Galeria_fotos->numFotos($id_galeria_album);
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
  	    $offset = $this->uri->segment(3,0);	 

  	    $datapanel['dataset'] = $this->Galeria_fotos->getGaleriaFotosPaginacion($id_galeria_album,$config['per_page'],$offset);

    		$datapanel['dataset_por_id'] = $this->Galeria_fotos->getGaleriaFotosById($id_galeria_album);
        
        #HEADER - SEO ----------
        $datapanel['seo'] = $datapanel['dataset_por_id'];
        #------------------------

    	  if( empty($datapanel['dataset_por_id'])){ 
    	          $this->load->view("frontend/includes/template", ['body'=>'error_404']);
    	  }

    	  $datapanel['body']    = 'galeria_fotos_detalle';
    		$this->parser->parse("frontend/includes/template", $datapanel);
		
	}

}