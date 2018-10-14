<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('frontend/model_productos','Producto');
		$this->load->model('frontend/Model_categorias','Categoria');
		$this->load->library('My_PHPMailer');
		$this->load->helper('captcha');
	}
	public function index() {
		///$this->load->view('welcome_message');
	}

	public function lista() { 
		// Traeremos los nombres para comprarar luego segun el url_category, que puede ser nombre(merchandising o textiles), como el datos del campo url e id.
		$getcategoriasMCategorias=getcategoriasMT(2);
		$getcategoriasTCategorias=getcategoriasMT(3);
    	// Traemos el nombre o url con id
    	$url_category = $this->uri->segment(2,1);
    	if($url_category == $getcategoriasMCategorias['nombre'] || $url_category==$getcategoriasTCategorias['nombre']){
    		// Se mantiene el nombre y según el nombre se traeran datos.
    		$url_category = $url_category;
    	}elseif($url_category != ""){
    		$url_categoryMT = substr(strrchr($url_category,'-'),1);
    		if($url_categoryMT == 2 || $url_categoryMT == 3){
    			// Si es merchandising o textiles se tareran los datos
    			$url_categoryMT = getcategoriasMT($url_categoryMT);
	    		$url_categoryMT = $url_categoryMT['nombre'];
		    	$url_category=$url_categoryMT;
    		}else{
    			$url_category=$url_category;
    		}
    	}
    	// Traemos el nombre o url con id
    	$url_subcategory = $this->uri->segment(3,1);
    	// Inicializamos las variables.
    	$datapanel['titulo_menu'] = '';
    	$per_pageMT="";
    	$id_prod_category="";
    	$per_page_proMT="";
    	// Según las condiciones se traera los datos.
		if($url_category==$getcategoriasMCategorias['nombre']){
			// Se le asigna un nombre fijo, yaque en el router es fijo el nombre Merchandising
			$url_category='Merchandising';
			$getcategoriasM=getcategoriasMT(2);
			$id_prod_category=2;  //se iguala a 1 para indicar que aun hay categorias
			$datapanel['titulo_menu'] = $getcategoriasM['nombre'];
			$per_pageMT= getConfiguraciones(23);

			#HEADER - SEO ----------
			$seccion = 'merchandising';
			$seo = getSeccion($seccion);
			$datapanel['seccion'] = getSecciones(16);
			$datapanel['seo'] = $seo;
		}elseif($url_category==$getcategoriasTCategorias['nombre']){
			// Se le asigna un nombre fijo, yaque en el router es fijo el nombre textiles
			$url_category='Textiles';
			$getcategoriasT=getcategoriasMT(3);
			$id_prod_category=3;  //se iguala a 1 para indicar que aun hay categorias
			$datapanel['titulo_menu'] = $getcategoriasT['nombre'];
		    $per_pageMT= getConfiguraciones(24);

		    #HEADER - SEO ----------
			$seccion = 'textiles';
			$seo = getSeccion($seccion);
			$datapanel['seccion'] = getSecciones(17);
			$datapanel['seo'] = $seo;
		}elseif($url_subcategory == $getcategoriasMCategorias['nombre']){
			$getcategoriasM=getcategoriasMT(2);
			$id_prod_category = substr(strrchr($url_category,'-'),1);
			$datapanel['titulo_menu'] = $getcategoriasM['nombre'];
			$per_pageMT= getConfiguraciones(23);
			$per_page_proMT= getConfiguraciones(25);
		}elseif($url_subcategory == $getcategoriasTCategorias['nombre']){
			$getcategoriasT=getcategoriasMT(3);
			$id_prod_category = substr(strrchr($url_category,'-'),1);
			$datapanel['titulo_menu'] = $getcategoriasT['nombre'];
			$per_pageMT= getConfiguraciones(24);
			$per_page_proMT= getConfiguraciones(25);
		}else{
			$id_prod_category = substr(strrchr($url_category,'-'),1);
			$per_page_proMT= getConfiguraciones(25);
			//Se inicializa $per_pageMT['valor'], yaque la variable per_pageMT esta vacia.
			$per_pageMT['valor']="";
		} 
			
			$num_categorias = $this->Producto->getNumCategory($id_prod_category);
		if( $num_categorias > 0){
			#------------------------
		    # Paginacion
		    #------
		    $config['base_url'] = base_url().'productos/'.$url_category;
		    $config['total_rows'] = $this->Producto->getNumCategory( $id_prod_category );
		    $config['per_page'] = $per_pageMT['valor'];
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
			$categorias = $this->Producto->getCategoryByParent($config['per_page'],$offset,$id_prod_category);

			foreach ($categorias as $cat => $cat_pro) {
				$categorias[$cat]['ruta'] = 'files/categorias/medianas/'.$cat_pro['imagen'];
			}

			if( empty($categorias)){ 
			    $this->load->view("frontend/includes/template", ['body'=>'error_404']);
			}

			$datapanel['categorias'] = $categorias;
			$datapanel['titulo'] = 'CATEGORÍAS';
			$seccion = 'productos';

			// #HEADER - SEO ----------
			// $datapanel['seo'] = $categorias;
			// #------------------------
		}else{
			// Entra a productos
			$id = $this->uri->segment(2,0);
			if($id==='MT'){
				$offset = $this->uri->segment(4,0);
				$id_prod_category=$this->uri->segment(3,0);
			}else{
				$offset = $this->uri->segment(3,0);
			}

			#------------------------
			# Paginacion
			#------
			$config['base_url'] = base_url().'productos/MT/'.$id_prod_category;
	      	$config['total_rows'] = $this->Producto->numProductos($id_prod_category);
	      	$config['per_page'] = $per_page_proMT['valor'];
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
			$productos = $this->Producto->getProductosByCategory($config['per_page'],$offset,$id_prod_category );
			foreach ($productos as $cat => $pro) {
					$productos[$cat]['ruta']='files/productos/medianas/'.$pro['imagen'];
			}
			$datapanel['categorias']=$productos;
			$datapanel['titulo'] = 'PRODUCTOS';
			$seccion = 'productos';
			$categorias = $this->Producto->getCategoriaById($id_prod_category);
			$datapanel['seo'] = $categorias;

		}
		$this->session->set_flashdata('message', '');
		//session_destroy();
	    $datapanel['menu'] = $this->Producto->getCategoriaMerchandising(2);
	    if( empty($datapanel['categorias'])){ 
		    $this->session->set_flashdata('message', '<div class="alert alert-danger"> No existe productos en esta categoria</div>');
		}

	   	// $datapanel['seccion']['imagen'] = $seo['imagen'];
		$datapanel['body'] 		= $seccion;
		
		$this->parser->parse("frontend/includes/template", $datapanel);
	}

	public function detalle() {
		$url = $this->uri->segment(2, FALSE);  if( ! $url ){ die('cargar vista 404 no existe url');}
		$id_producto = substr(strrchr($url,'-'),1);
		$datapanel['body']    = 'producto_detalle';
		$datapanel['url_post'] = (dataConfig('tipo_tienda') == '1')? 'frontend/pedido/agregar' :'frontend/cotizaciones/agregar';

      	$datapanel['menu'] = $this->Producto->getCategoriaMerchandising(2);
		$datapanel['productosOfertas'] = $this->Categoria->getProductosOfertas();
		$producto = $this->Producto->getProductById($id_producto);
		$datapanel['producto'] = $producto;
		$datapanel['imagenes']=$datapanel['producto']['imagenes'];
		#HEADER - SEO ----------
	    $datapanel['seo'] = $producto;
		$datapanel['producto']['url_share'] = base_url().'productos/'.$producto['url'].'-'.$producto['id'].'/detalle';
		$datapanel['atributos'] = $this->Producto->getAtributos($id_producto);
		#captcha
    	$datapanel['recaptcha'] = $this->recaptcha->render();

		$migaja = $this->Producto->getMigajas($id_producto, 'productos');
		$datapanel['migaja'] = $migaja;

		$this->parser->parse("frontend/includes/template", $datapanel);
	}

	public function oferta() { 
			
			#HEADER - SEO ----------
			$seccion = 'ofertas';
			$seo = getSeccion($seccion);
			$datapanel['seccion'] = getSecciones(15);
			$datapanel['seo'] = $seo;
			$per_page_ofertas= getConfiguraciones(26);
			
			#------------------------
			# Paginacion
			#------
			$config['base_url'] = base_url().'ofertas';
	      	$config['total_rows'] = $this->Producto->numProductosOfertas();
	      	$config['per_page'] = $per_page_ofertas['valor'];
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
			$productos = $this->Producto->getProductosOferta($config['per_page'],$offset );
			foreach ($productos as $cat => $pro) {
				$productos[$cat]['ruta']='files/productos/medianas/'.$pro['imagen'];
			}
			$datapanel['categorias']=$productos;
			$datapanel['titulo'] = 'PRODUCTOS';
			$data['banners'] = getBanners();
			$datapanel['banners'] = $this->parser->parse('frontend/includes/banner',$data, true);
			//session_destroy();
			$this->session->set_flashdata('message', '');
			$datapanel['menu'] = $this->Producto->getCategoriaMerchandising(2);
			if( empty($datapanel['categorias'])){ 
		        $this->session->set_flashdata('message', '<div class="alert alert-danger"> No existe productos en esta categoria</div>');
			}
			$datapanel['body'] 		= 'producto_oferta';
		
			$this->parser->parse("frontend/includes/template", $datapanel);
  	}


	public function enviarInformacion() {
						
		$datos=array();
		if(!empty($_POST)){
			$data = $_POST;
			$recaptcha = $this->input->post('recaptcha');
			$response = $this->recaptcha->verifyResponse($recaptcha);
			if($response['success']){

				unset($data['recaptcha']);

				$data['creado'] = date('Y-m-j H:i:s');
				$id_comentario = $this->Producto->saveSolicitudProductos($data);

				if( $id_comentario ) {
					$correo_notificaciones = explode("," , dataConfig('correo_notificaciones') );
					// ENVIO  DE MAIL DE VERIFICACION CON EL PHP MAILER
					$mail = new PHPMailer();
					// luego descomentarlo para probar en servidor

					
                    $mail->From = $data['correo']; // direccion de quien envia
                    $mail->FromName = $data['nombre']; // nombre de quien envia

					// /****PROTOCOLO SMTP PRUEBA *****/
					// //indico a la clase que use SMTP
					// $mail->IsSMTP();
					// //permite modo debug para ver comentarios de las cosas que van ocurriendo
					// $mail->SMTPDebug = 0;
					// $mail->CharSet = 'UTF-8';
					// //Debo de hacer autenticación SMTP
					// $mail->SMTPAuth = true;
					// $mail->SMTPSecure = "ssl";
					// //indico el servidor de Gmail para SMTP
					// $mail->Host = "smtp.gmail.com";
					// //indico el puerto que usa Gmail
					// $mail->Port = 465;
					// //indico un usuario / clave de un usuario de gmail
					// $mail->Username = "soluciones.ajax2017@gmail.com";
					// $mail->Password = "solajax123";
					// /****PROTOCOLO SMTP PRUEBA *****/

					for($i=0; $i<count($correo_notificaciones); $i++) {
						$currentEmail = trim($correo_notificaciones[$i]);
						$mail->AddAddress($currentEmail);
					}

					$mail->Subject = "Formulario de producto";

					$id_producto=$data['producto_id'];
					$producto = $this->Producto->getProductById($id_producto);
					$datos['producto']=$producto;
					$datos['data']=$data; 
					$datos['body']='solicitud_producto';
					$msg = $this->load->view('frontend/mailing/includes/template', $datos, true);
					$mail->Body = $msg;
					$mail->IsHTML(true);
					@$mail->Send();
					$json['status'] ='1';
					$json['msj'] = '<div class="alert alert-success"> Su mensaje ha sido enviado satisfactoriamente.</div>';
				}else {
					$json['status'] ='2';
					$json['msj'] = '<div class="alert alert-danger"> Ha ocurrido un error. Inténtelo nuevamente.</div>';
				}
			} else {
				$json['status'] ='2';
				$json['msj'] = '<div class="alert alert-warning"> Se requiere marcar el captcha.</div>';
			}
			echo json_encode($json);
		}
	}

	public function verificarStock()
	{
		if (!empty($_POST)) {
			$datos = $_POST;
			if (!empty($datos['atributo_id'])) {
				$stock = $this->Producto->getStockAtributo($datos['atributo_id'],$datos['producto_id']);
			}else{
				$stock = $this->Producto->getProductById($datos['producto_id']);
			}
			
			if ($stock['cantidad'] < 1) {
				$json['mensaje'] = 'No contamos con stock disponible.';
				$json['estado'] = 2;
			}else if ($stock['cantidad'] < $datos['stock']) {
				$json['mensaje'] = 'No contamos con la cantidad solicitada.';
				$json['estado'] = 2;
			}else{
				$json['mensaje'] = '';
				$json['estado'] = 1;
			}
			echo json_encode($json);
		}
	}

	public function getDatoAtributo(){
		if ($_POST) {
			$datos = $_POST;
			$atributo = $this->Producto->getStockAtributo($datos['atributo_id'],$datos['producto_id']);
			if ($atributo) {
				$atributo['d_precio'] = dataConfig('moneda').$atributo['precio'];
				$atributo['d_precio_oferta'] = dataConfig('moneda').$atributo['precio_oferta'];
				$atributo['estado']= 1;
			}else{
				$atributo['estado']= 2;
			}
			echo json_encode($atributo);
		}
	}

	// public function getDatoAtributoPrecio(){
	// 	if ($_POST) {
	// 		$datos = $_POST;
	// 		$atributo = $this->Producto->getStockAtributo($datos['atributo_id'],$datos['producto_id']);
	// 		// var_dump('<pre>',$atributo);exit();
	// 		if ($atributo) {
	// 			$atributo['d_precio'] = dataConfig('moneda').$atributo['precio'];
	// 			$atributo['d_precio_oferta'] = dataConfig('moneda').$atributo['precio_oferta'];
	// 			$atributo['estado']= 1;
	// 		}else{
	// 			$atributo['estado']= 2;
	// 		}
	// 		echo json_encode($atributo);
	// 	}
	// }

	public function resultado()
	{
		$busqueda = $this->input->get('search');
		$busqueda = preg_replace('([^A-Za-z0-9[:space:]])', '', $busqueda);
		/*if ($busqueda<>''){ 
			//CUENTA EL NUMERO DE PALABRAS 
			$trozos=explode(" ",$busqueda); 
			$numero=count($trozos); 
			if ($numero==1) { */
				//SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCION CON LIKE 
				$cadbusca = $this->Producto->buscarPorTexto($busqueda);
			/*} elseif ($numero>1) { 
				//SI HAY UNA FRASE SE UTILIZA EL ALGORTIMO DE BUSQUEDA AVANZADO DE MATCH AGAINST 
				//busqueda de frases con mas de una palabra y un algoritmo especializado 
				$cadbusca = $this->Producto->buscarVariasPalabras($busqueda);
			} 
		}*/
		$seo = getSeccion('productos');

		$datapanel['seo']['titulo'] = 'Resultados de Búsqueda';
		$datapanel['seccion'] = $seo;
		$datapanel['categorias'] = $this->Producto->getCategoriaPorTipo(1);
		$datapanel['productos'] = $cadbusca;
		$datapanel['body']    = 'resultados';
		$this->parser->parse("frontend/includes/template", $datapanel);
	}
}