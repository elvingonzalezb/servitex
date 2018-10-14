<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->model('frontend/model_proyectos', 'Proyectos');

    }

	public function index()
	{
		///$this->load->view('welcome_message');
	}
	
	public function listaProyectos() {

		    #HEADER - SEO ----------
        $seccion = 'proyectos';	
        $seo = getSeccion($seccion);
        $datapanel['seo'] = $seo;

        #------------------------
      	# Paginacion
      	#------
      	$config['base_url'] = base_url().'proyectos/';
      	$config['total_rows'] = $this->Proyectos->numProyectos();
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
  		  $datapanel['dataset'] 	= $this->Proyectos->getProyectos($config['per_page'],$offset);
  		  $datapanel['body'] 		= $seccion;
        $datapanel['banner'] = getSecciones(14);
  		  $this->parser->parse("frontend/includes/template", $datapanel);
	}

	public function listaTrabajos() {	

        $id = $this->uri->segment(2,0);

        $id_galerias_proyecto = substr(strrchr($id,'-'),1);

		    #------------------------
      	# Paginacion
      	#------
      	$config['base_url'] = base_url().'galerias_proyecto/'.$id;
      	$config['total_rows'] = $this->Proyectos->numGaleriasProyecto($id_galerias_proyecto);
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

  	    $datapanel['dataset'] = $this->Proyectos->getGaleriasProyectoPaginacion($id_galerias_proyecto,$config['per_page'],$offset);

  		  $datapanel['dataset_por_id'] = $this->Proyectos->getGaleriasProyectoById($id_galerias_proyecto);

        #HEADER - SEO ----------
        $datapanel['seo'] = $datapanel['dataset_por_id'];
        #------------------------
        
  	    if( empty($datapanel['dataset_por_id'])){ 
  	          $this->load->view("frontend/includes/template", ['body'=>'error_404']);
  	    }

  	    $datapanel['body'] = 'galerias_proyecto';
  		  $this->parser->parse("frontend/includes/template", $datapanel);
		
	}

  public function listaFotos() { 

        $id = $this->uri->segment(2,0);
        $id_foto = substr(strrchr($id,'-'),1);

        #------------------------
        # Paginacion
        #------
        $config['base_url'] = base_url().'fotos_proyecto/'.$id;
        $config['total_rows'] = $this->Proyectos->num_fotos($id_foto);
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
        $datapanel['dataset'] = $this->Proyectos->getFotosPaginacion($id_foto,$config['per_page'],$offset);
        $datapanel['dataset_por_id'] = $this->Proyectos->getFotosById($id_foto);
        if( empty($datapanel['dataset_por_id'])){ 
                $this->load->view("frontend/includes/template", ['body'=>'error_404']);
        }

        $datapanel['body']    = 'fotos_proyecto';
        $this->parser->parse("frontend/includes/template", $datapanel);
    
  }

}

