<?php
defined('BASEPATH') OR exit('No direct script access allowed');
					
class Productos extends CI_Controller {

	public $sizes = [
				    	'thumbs_x'      => 85,
						'thumbs_y'      => 100,
						'medium_x'      => 270,
						'medium_y'      => 347,
						'principal_x'   => 370,
						'principal_y'   => 450
				        ];
	public $watermark = [
				            'text_mark' => '',
				            'img_mark'  => '',
				            'backgroud' => '',
				            'text_color'=> ''
				        ];
	public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_productos', 'Producto');
        $this->load->model('dashboard/model_categorias', 'Categoria');
        $this->load->model('dashboard/model_atributos', 'Atributo');
        $this->load->model('dashboard/model_galeria_productos', 'Galeria');
        $this->load->library('My_aws.php');
        $this->load->library('My_upload.php');
        $this->load->library('session'); 
        SessionUsuario();
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function lista() {
		
		$id = (int) $this->uri->segment(4,0);

		//body
		$datapanel['body'] 		= 'productos/lista';

		//data
		$datapanel['dataset'] 	= $this->Producto->getProductByCategory($id);
		$datapanel['id_categoria'] = $id;
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function consulta_producto() {

		$datapanel['body'] 		= 'productos/lista_solicitud';
		$datapanel['dataset'] 	= $this->Producto->getConsultaProductos();

		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function detalleSolicitud() {

        $id = (int) $this->uri->segment(4,0); 
        $datapanel['body']      = 'productos/detalle_solicitud';
        $datapanel['dataset']   = $this->Producto->getSolicitudById($id);
        
        $this->load->view("dashboard/includes/template", $datapanel);
    }

    public function responder() {
    	$this->load->library('My_PHPMailer');
        $id = (int) $this->uri->segment(4,0);  
        $data = $_POST;
        
        $id_producto = $data['producto_id'];
        $solicitud = $this->Producto->getSolicitudById($id);
        $data['creado']=date('Y-m-j H:i:s');
		if ($this->Producto->updateSolicitud($id, $data)) {
			$correo_notificaciones = $solicitud['correo'];
			// ENVIO  DE MAIL DE VERIFICACION CON EL PHP MAILER
			$mail = new PHPMailer();
			// luego descomentarlo para probar en servidor

			//$mail->From = dataConfig('correo_from'); // direccion de quien envia
			$mail->FromName = dataConfig('nombre_comercial'); // nombre de quien envia
					/****PROTOCOLO SMTP PRUEBA *****/
					//indico a la clase que use SMTP
					$mail->IsSMTP();
					//permite modo debug para ver comentarios de las cosas que van ocurriendo
					$mail->SMTPDebug = 0;
					$mail->CharSet = 'UTF-8';
					//Debo de hacer autenticación SMTP
					$mail->SMTPAuth = true;
					$mail->SMTPSecure = "ssl";
					//indico el servidor de Gmail para SMTP
					$mail->Host = "smtp.gmail.com";
					//indico el puerto que usa Gmail
					$mail->Port = 465;
					//indico un usuario / clave de un usuario de gmail
					$mail->Username = "soluciones.ajax2017@gmail.com";
					$mail->Password = "solajax123";
					/****PROTOCOLO SMTP PRUEBA *****/
			$mail->AddAddress($correo_notificaciones);


			$mail->Subject = "Formulario de producto";
			$producto = $this->Producto->getProductById($id_producto);
			$datos['producto']=$producto;
			$datos['data']=$solicitud;
			$datos['data']['respuesta']=$data['respuesta'];
			$msg = $this->load->view('dashboard/mailing/solicitud_producto', $datos, true);
			$mail->Body = $msg;
			$mail->IsHTML(true);
			@$mail->Send();
			$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Se envio la respuesta correctamente.</div>');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger"><strong>RESULTADO:</strong> Ocurrió un problema, Intente nuevamente.</div>');
		}
		redirect(base_url().'dashboard/productos/detalleSolicitud/'.$id);
    }

	public function editar() {

		$data = array();
		$id = (int) $this->uri->segment(4,0);
		$id_categoria = (int) $this->uri->segment(5,0);
		$validaciones = array('categoria_id','nombre','url','orden','seo_title','seo_description','seo_keywords');

		if(!empty($_POST)){

			if(! $id){ echo "no existe, ver lista"; exit();};
			
			if (validacionForm($validaciones,'controller') == FALSE){
				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{

				#--------------------
				# Subida de Imagenes

				if( ! empty(array_filter($_FILES['files']['name'])) &&  (count($_FILES['files']['name']))>0){
					$files = $_FILES['files'];					
				    #-- Se enivia el array de archivos multiples  //desarrollado solo para el plugin multiple--#
					$imagenes  = ( ! empty($files['name']) ? uploadImgMultiple( $files, 'productos', $this->sizes, $this->watermark ) : '');
				}
				//echo '<pre>';print_r($imagenes);echo '</pre>';die;
				// if uploaded and success
				if(isset($imagenes['status']) && $imagenes['status'] == '200' && count($imagenes['data']) > 0) {
					// get uploaded files
					$uploadedFiles = $imagenes['data'];
				}
				if(isset($imagenes['status']) && $imagenes['status'] == '400'){
					//echo '<pre>';print_r($warnings);echo '</pre>';exit;
					$this->session->set_flashdata('
						', '<div class="alert alert-warning"><strong>RESULTADO:</strong>'.$imagenes['error'].'</div>');
					redirect(base_url().'dashboard/productos/editar/'.$id);

				}

				# Fin Subida
				#--------------------

				$data = $_POST;
				$datos_atributos = isset($data['datos_atributos'])? $data['datos_atributos'] : '';
				
				/*if($datos_atributos != ''){
					unset($data['precio']);
					unset($data['precio_oferta']);
					unset($data['cantidad']);
				}*/
				unset($data['datos_atributos']);
				unset($data['fileuploader-list-files']);
				$updated = $this->Producto->updateProduct($id, $data);
				#print_r($updated);die;	
				if($updated){

					if (isset($uploadedFiles)) {
						$array_imagenes = array();
						for ($i=0; $i < count($uploadedFiles); $i++) {
							$array_imagenes[$i]['imagen_title'] = $uploadedFiles[$i]['titulo'];
							$array_imagenes[$i]['imagen'] = $uploadedFiles[$i]['principal'];
							$array_imagenes[$i]['ruta_amazon'] = isset($uploadedFiles[$i]['amazon_path']['principal']['file'])? $uploadedFiles[$i]['amazon_path']['principal']['file']:'';
							$array_imagenes[$i]['producto_id'] = $id;
						}
						//echo '<pre>';print_r($array_imagenes);echo '</pre>';die;
						$updImg = $this->Producto->saveImagenProduct($array_imagenes);

						if(!$updImg){
							$this->session->set_flashdata('success', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar las fotos del producto</div>');
						}
					}
					$data_atributo = array();

					if($datos_atributos != ''){
						$atributos = explode('║', $datos_atributos);
						for ($i=0; $i < count($atributos); $i++) { 
							$atributo = explode('│', $atributos[$i]);
							$data_atributo[$i]['producto_id'] = $id;
							$data_atributo[$i]['atributos_nombres'] = $atributo[0];
							$data_atributo[$i]['atributos'] = str_replace(",","#",$atributo[1]);
							$data_atributo[$i]['cantidad'] = $atributo[4];
							$data_atributo[$i]['precio'] = $atributo[2];
							$data_atributo[$i]['creado'] = date('Y-m-d H:i:s');
							$data_atributo[$i]['precio_oferta'] = $atributo[3];
						}
					}

					$this->Atributo->deleteMultipleAtributo($id); #se elimina los atributos relacionados para volver a crear
					$saved_atributo = $this->Atributo->saveMultipleAtributo($data_atributo);
					//echo '<pre>';print_r($saved_atributo);echo '</pre>';die;
					/*if(!$saved_atributo){
						$this->session->set_flashdata('success', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los atributos</div>');
						redirect(base_url().'dashboard/productos/editar/'.$id);
					}*/
					$this->session->set_flashdata('success', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
				}else{ 
					$this->session->set_flashdata('success', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos del producto</div>');
				};
				redirect(base_url().'dashboard/productos/editar/'.$id);
			}
		}
		#validaciones
		$datapanel['requerid'] 		= validacionForm($validaciones,'view');
		#body
		$datapanel['body'] 		= 'productos/editar';
		#data
		$productos = $this->Producto->getProductById($id);
		$datapanel['dataset'] 	= $productos; 

		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		
		$datapanel['galerias'] 	= $this->Galeria->getGaleryByProduct($id);
		$datapanel['categorias'] 	= $this->Categoria->getCategoryTreeForParentId();
		$datapanel['id_categoria'] 	=$id_categoria;
		$this->load->view("dashboard/includes/template", $datapanel);
		
	}

	public function nuevo() {
		$validaciones = array('categoria_id','nombre','url','NOTfiles[]','orden','seo_title|max_length[150]','seo_description|max_length[150]','seo_keywords');
		if(!empty($_POST)){
			
			if (validacionForm($validaciones,'controller') == FALSE){
				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{
				#--------------------
				# Subida de Imagenes
				if( ! empty($_FILES['files']['name']) &&  (count($_FILES['files']['name']))>0){
					$files = $_FILES['files'];					
				    #-- Se enivia el array de archivos multiples  //desarrollado solo para el plugin multiple--#
					$imagenes  = ( ! empty($files['name']) ? uploadImgMultiple( $files, 'productos', $this->sizes, $this->watermark ) : '');
				}else{
					echo "implementar validacion no existe archivo"; exit();
				}

				// if uploaded and success
				if((isset($imagenes['status']) && isset($imagenes['data'])) && $imagenes['status'] == '200' && count($imagenes['data']) > 0) {
					// get uploaded files
					$uploadedFiles = $imagenes['data'];
				}else{ 
					$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se encontro la imagen</div>');
					redirect(base_url().'dashboard/productos/nuevo');
				}
				if(isset($imagenes['status']) && $imagenes['status'] == '400'){
					$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong>'.$imagenes['error'].'</div>');
					redirect(base_url().'dashboard/productos/nuevo');
				}
				
				$data = $_POST;

				$datos_atributos = isset($data['datos_atributos'])? $data['datos_atributos'] : '';
				/*if($datos_atributos != ''){
					unset($data['precio']);
					unset($data['precio_oferta']);
					unset($data['cantidad']);
				}*/
				unset($data['datos_atributos']);
				unset($data['fileuploader-list-files']);
				$saved = $this->Producto->saveProduct($data);

				if($saved){
					$array_imagenes = array();
					for ($i=0; $i < count($uploadedFiles); $i++) { 
						$array_imagenes[$i]['imagen_title'] = $uploadedFiles[$i]['titulo'];
						$array_imagenes[$i]['imagen'] = $uploadedFiles[$i]['principal'];
						$array_imagenes[$i]['ruta_amazon'] = isset($uploadedFiles[$i]['amazon_path']['principal']['file'])? $uploadedFiles[$i]['amazon_path']['principal']['file']:'';
						$array_imagenes[$i]['producto_id'] = $saved;
					}
					$data_atributo = array();
					if($datos_atributos != ''){
						$atributos = explode('║', $datos_atributos);
						for ($i=0; $i < count($atributos); $i++) { 
							$atributo = explode('│', $atributos[$i]);
							$data_atributo[$i]['producto_id'] = $saved;
							$data_atributo[$i]['atributos_nombres'] = $atributo[0];
							$data_atributo[$i]['atributos'] = str_replace(",","#",$atributo[1]);
							$data_atributo[$i]['cantidad'] = $atributo[4];
							$data_atributo[$i]['precio'] = $atributo[2];
							$data_atributo[$i]['creado'] = date('Y-m-d H:i:s');
							$data_atributo[$i]['precio_oferta'] = $atributo[3];
						}
						$saved_atributo = $this->Atributo->saveMultipleAtributo($data_atributo);
					}
					$saved2 = $this->Producto->saveImagenProduct($array_imagenes);
					if($saved2){
						$this->session->set_flashdata('success', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
					}else{ 
						$this->session->set_flashdata('success', '<div class="alert alert-info"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente, pero no la foto.</div>');
					};
				}else{ 
					$this->session->set_flashdata('success', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos del producto</div>');
					redirect(base_url().'dashboard/productos/nuevo');
				};
			redirect(base_url().'dashboard/productos/lista/'.$data['categoria_id']);
			# Fin Subida
			#--------------------
			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($validaciones,'view');
		#body
		$datapanel['body'] 		= 'productos/nuevo';
		#data
		$datapanel['dataset'] 	= $this->Categoria->getCategoryTreeForParentId();
		$this->load->view("dashboard/includes/template", $datapanel);
	}


	public function delete(){

		if ($_POST) {
			$id = $_POST['param_id'];

			$id_producto = $this->Producto->getProductById( $id );
			if(empty($id_producto)){ 
				echo "no existe, ver lista"; exit();
			};

			if(! $id){ echo "no existe, ver lista"; exit();};

			$product = $this->Producto->getProductById($id);

	        $resultado = $this->Producto->deleteImageProduct($product['id']);
	        if($resultado){
	        	$eliminado = $this->Producto->deleteProduct($product['id']);
	        }
	        if($eliminado){
	        	$result['titulo'] =  '¡Hecho!';
				$result['estado'] =  'success';
				$result['msj'] = 'Se elimino correctamente.';
			}else{
				$result['titulo'] =  '¡Error!';
				$result['estado'] = 'error';
				$result['msj'] = 'Ha ocurridó un error, vuelve a intertarlo';
			}
			echo json_encode($result);
		} else {
			header('Location: '.'../lista/', TRUE);
		}
       
	}

	public function deleteSolicitud(){
		
		if ($_POST) {

			$id_solicitud = $_POST['param_id'];

			$id = $this->Servicio->getSolicitudById( $id_solicitud );
			if(empty($id)){ 
				echo "no existe, ver lista"; exit();
			};

		    $resultado = $this->Servicio->updateSolicitud($id_solicitud,array('estado'=>_ELIMINADO));
		    if($resultado) {
		        $result['titulo'] =  '¡Hecho!';
				$result['estado'] =  'success';
				$result['msj'] = 'Se elimino correctamente.';
		    } else {
		       	$result['titulo'] =  '¡Error!';
				$result['estado'] = 'error';
				$result['msj'] = 'Ha ocurridó un error, vuelve a intertarlo';
		    }
		    
		    echo json_encode($result);
		}
	}

	#Ajax para el estado del producto
	public function ajaxEstado(){
		if ($_POST) {
			$id = $_POST['param_id'];
			$estado = $_POST['param_estado'];
			$data = array('estado'=>$estado);
			$updated = $this->Producto->updateProduct($id, $data);
			if($updated){
				$result['estado'] =  ($estado == _ACTIVO)? _ACTIVO : _INACTIVO;
				$result['msj'] = 'El estado se ha actualizado';
			}else{
				$result['estado'] = ($estado == _ACTIVO)? _INACTIVO : _ACTIVO;
				$result['msj'] = 'Ha ocurrido un error, vuelve a intertarlo';
			}
			echo json_encode($result);
		} 
	}

	public function eliminarGaleriaImg(){
		if ($_POST) {
			$id = $_POST['id_imagen'];
			$eliminado = $this->Galeria->deleteImageGalery($id);
			if($eliminado){
				$result['mensaje'] = "Ha sido eliminado correctamente";
			}else{
				$result['mensaje'] = "Ocurrió un error, intente de nuevo";
			}
			echo json_encode($result);
		}
	}
	
}