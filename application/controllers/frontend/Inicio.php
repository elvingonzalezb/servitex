<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('frontend/Model_inicio','Inicio');
		$this->load->model('frontend/Model_categorias','Categoria');
		$this->load->model('frontend/Model_articulos', 'Articulo');
		$this->load->model('frontend/model_solo_servicios', 'Servicios');
		$this->load->model('frontend/model_productos','Producto');
		SessionCliente(array('*'));
    }

	public function index()
	{	
		#HEADER - SEO ----------
      	$seccion = 'inicio';
      	$seo = getSeccion($seccion);
      	$data['seo'] = $seo;

		//body
		$datapanel['body'] 	= $seccion;
		$data['banners'] = getBanners();
	    $datapanel['banners'] = $this->parser->parse('frontend/includes/banner',$data, true);
	    $datapanel['menu'] = $this->Producto->getCategoriaMerchandising(2);
	    $datapanel['promociones'] = $this->Inicio->getBannerPromociones();
	    $datapanel['productosDestacados'] = $this->Categoria->getProductosDestacados(20);
	    $datapanel['productosNuevos'] = $this->Categoria->getProductosNuevos(6);
	    $datapanel['productosOfertas'] = $this->Categoria->getProductosOfertas();
	    // $datapanel['productosOfertas'] = $this->Categoria->getProductsOfert();
	    $datapanel['clientes'] = $this->Inicio->getClientes(100);
	    $per_page_textiles= getConfiguraciones(21);
	    // var_dump('<pre>',$per_page_textiles);exit();
	    $per_page_servicios= getConfiguraciones(22);

	    // var_dump('<pre>',$per_page['valor']);exit();

	 //    $url = $this->uri->segment( 2, 0);

	 //   if($url==''){
		// 	$id_textiles=42;  //se iguala a 1 para indicar que aun hay categorias
		// }else{
		// 	// var_dump('entro');exit();
		// 	// si viene url e id lo separamos
		// 	$id_textiles = substr(strrchr($url,'-'),1);
		// }
	    
	    
	    $titulo_paginacion = $this->uri->segment(2,0);
	    if($titulo_paginacion==="textiles"){
	    	$offset_servicios = 0;
	    	$offset_textiles = $this->uri->segment(3,0);
	    	#------------------------
	        # Paginacion
	        #------
	       	$config['base_url'] = base_url().'inicio/textiles';
	      	$config['total_rows'] = $this->Producto->getNumCategory( 3 );
	      	$config['per_page'] = $per_page_textiles['valor'];
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
		    $textiles = $this->Producto->getCategoryByParent($config['per_page'],$offset_textiles,3);
		    if( empty($textiles)){ 
		        $this->load->view("frontend/includes/template", ['body'=>'error_404']);
		    }
			foreach ($textiles as $cat => $cat_pro) {
				$textiles[$cat]['ruta'] = 'files/categorias/thumbs/'.$cat_pro['imagen'];
			}
			$datapanel['categorias'] = $textiles;
		  	#------------------------
			# Paginacion
			#------
			$config2['base_url'] = base_url().'inicio/solo_servicios';
			$config2['total_rows'] = $this->Servicios->num();
			$config2['per_page'] = $per_page_servicios['valor'];
			$config2['first_tag_open'] = '<li>';
			$config2['first_tag_close'] = '</li>';
			$config2['prev_tag_open'] = '<li class="prev">';
			$config2['prev_link'] = '<i class="fa fa-angle-left"></i>';
			$config2['next_link'] = '<i class="fa fa-angle-right"></i>';
			$config2['prev_tag_close'] = '</li>';
			$config2['next_tag_open'] = '<li class="next">';
			$config2['next_tag_close'] = '</li>';
			$config2['last_tag_open'] = '<li>';
			$config2['last_tag_close'] = '</li>';
			$config2['cur_tag_open'] = '<li class="active"><a>';
			$config2['cur_tag_close'] = '</a></li>';
			$config2['num_tag_open'] = '<li>';
			$config2['num_tag_close'] = '</li>';
			#------
			# Paginacion
			#------------
			$this->pagination->initialize($config2);
			$datapanel['paginacion2'] = $this->pagination->create_links();
			$servicios = $this->Servicios->getServicios($config2['per_page'],$offset_servicios);
			$datapanel['servicios'] = $servicios;

	    }elseif($titulo_paginacion==="solo_servicios"){
	    	$offset_textiles = 0;
	    	$offset_servicios = $this->uri->segment(3,0);
	    	#------------------------
			# Paginacion
			#------
			$config2['base_url'] = base_url().'inicio/solo_servicios';
			$config2['total_rows'] = $this->Servicios->num();
			$config2['per_page'] = $per_page_servicios['valor'];
			$config2['first_tag_open'] = '<li>';
			$config2['first_tag_close'] = '</li>';
			$config2['prev_tag_open'] = '<li class="prev">';
			$config2['prev_link'] = '<i class="fa fa-angle-left"></i>';
			$config2['next_link'] = '<i class="fa fa-angle-right"></i>';
			$config2['prev_tag_close'] = '</li>';
			$config2['next_tag_open'] = '<li class="next">';
			$config2['next_tag_close'] = '</li>';
			$config2['last_tag_open'] = '<li>';
			$config2['last_tag_close'] = '</li>';
			$config2['cur_tag_open'] = '<li class="active"><a>';
			$config2['cur_tag_close'] = '</a></li>';
			$config2['num_tag_open'] = '<li>';
			$config2['num_tag_close'] = '</li>';
			#------
			# Paginacion
			#------------
			$this->pagination->initialize($config2);
			$datapanel['paginacion2'] = $this->pagination->create_links();
			$servicios = $this->Servicios->getServicios($config2['per_page'],$offset_servicios);
			$datapanel['servicios'] = $servicios;

	    	#------------------------
	        # Paginacion
	        #------
	       	$config['base_url'] = base_url().'inicio/textiles';
	      	$config['total_rows'] = $this->Producto->getNumCategory( 3 );
	      	$config['per_page'] = $per_page_textiles['valor'];
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
		    $textiles = $this->Producto->getCategoryByParent($config['per_page'],$offset_textiles,3);
		    if( empty($textiles)){ 
		        $this->load->view("frontend/includes/template", ['body'=>'error_404']);
		    }
			foreach ($textiles as $cat => $cat_pro) {
				$textiles[$cat]['ruta'] = 'files/categorias/thumbs/'.$cat_pro['imagen'];
			}
			$datapanel['categorias'] = $textiles;
		  	
	    }else{
	    	$offset_textiles = 0;
	    	$offset_servicios = 0;
	    	#------------------------
	        # Paginacion
	        #------
	       	$config['base_url'] = base_url().'inicio/textiles';
	      	$config['total_rows'] = $this->Producto->getNumCategory( 3 );
	      	$config['per_page'] = $per_page_textiles['valor'];
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
		    // var_dump($datapanel['paginacion']);exit();
		    $textiles = $this->Producto->getCategoryByParent($config['per_page'],$offset_textiles,3);
		    if( empty($textiles)){ 
		        $this->load->view("frontend/includes/template", ['body'=>'error_404']);
		    }
			foreach ($textiles as $cat => $cat_pro) {
				$textiles[$cat]['ruta'] = 'files/categorias/thumbs/'.$cat_pro['imagen'];
			}
			$datapanel['categorias'] = $textiles;
		  	#------------------------
			# Paginacion
			#------
			$config2['base_url'] = base_url().'inicio/solo_servicios';
			$config2['total_rows'] = $this->Servicios->num();
			$config2['per_page'] = $per_page_servicios['valor'];
			$config2['first_tag_open'] = '<li>';
			$config2['first_tag_close'] = '</li>';
			$config2['prev_tag_open'] = '<li class="prev">';
			$config2['prev_link'] = '<i class="fa fa-angle-left"></i>';
			$config2['next_link'] = '<i class="fa fa-angle-right"></i>';
			$config2['prev_tag_close'] = '</li>';
			$config2['next_tag_open'] = '<li class="next">';
			$config2['next_tag_close'] = '</li>';
			$config2['last_tag_open'] = '<li>';
			$config2['last_tag_close'] = '</li>';
			$config2['cur_tag_open'] = '<li class="active"><a>';
			$config2['cur_tag_close'] = '</a></li>';
			$config2['num_tag_open'] = '<li>';
			$config2['num_tag_close'] = '</li>';
			#------
			# Paginacion
			#------------
			$this->pagination->initialize($config2);
			$datapanel['paginacion2'] = $this->pagination->create_links();
			$servicios = $this->Servicios->getServicios($config2['per_page'],$offset_servicios);
			$datapanel['servicios'] = $servicios;
	    }

		$this->parser->parse("frontend/includes/template", $datapanel);
	}

	public function addSuscripcion()
	{
		if ($_POST) {
			$names = array('correo|valid_email|is_unique[suscriptores.correo]');
			$data = $_POST;
			if (validacionForm($names, 'controller') == FALSE){
				$json['titulo'] = 'Error';
				$json['msj'] = 'Este correo se encuentra suscrito.';
				$json['estado'] = 'error';
			}else{
				if ($this->Inicio->addSuscripcion($data)) {
					$json['titulo'] = 'SUSCRITO';
					$json['msj'] = 'Se ha suscrito correctamente';
					$json['estado'] = 'success';
				}else{
					$json['titulo'] = 'Error';
					$json['msj'] = 'Ocurrió un Error';
					$json['estado'] = 'error';
				}
			}
			echo  json_encode($json);
		}
	}
}
