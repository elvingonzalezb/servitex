<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solo_servicios extends CI_Controller {

	public $sizes = [
				            'thumbs_x'      => 180,
				            'thumbs_y'      => 81,
				            'medium_x'      => 270,
				            'medium_y'      => 123,
				            'principal_x'   => 870,
				            'principal_y'   => 400
				    ];

	public $watermark = [
				            'text_mark' => '',
				            'img_mark'  => '',
				            'backgroud' => '',
				            'text_color'=> ''
				        ];
	public $names_servicio = array('nombre','url','NOTdescripcion','orden','destacado','seo_title|max_length[150]','seo_description|max_length[150]','seo_keywords');

	public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_solo_servicios', 'Servicio');
        $this->load->library('My_upload');
        $this->load->library('My_aws');
        SessionUsuario();
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function listaServicio() {

		$id = (int) $this->uri->segment(4,0);
		$datapanel['body'] 		= 'solo_servicios/lista_servicio';
		$datapanel['dataset'] 	= $this->Servicio->getServicios();
		
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function consultaServicio() {

		$datapanel['body'] 		= 'solo_servicios/lista_solicitud';
		$datapanel['dataset'] 	= $this->Servicio->getConsultaServicios();

		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function detalleSolicitud() {
		
        $id = (int) $this->uri->segment(4,0); 
        $datapanel['body']      = 'solo_servicios/detalle_solicitud';
        $datapanel['dataset']   = $this->Servicio->getSolicitudById($id);
        
        $this->load->view("dashboard/includes/template", $datapanel);
    }

	public function responder() {

		$this->load->library('My_PHPMailer');
        $id = (int) $this->uri->segment(4,0);  
        $data = $_POST;
        $id_servicio = $data['servicio_id'];
        $solicitud   = $this->Servicio->getSolicitudById($id);
        $data['creado']=date('Y-m-j H:i:s');
        if($this->Servicio->updateSolicitud($id, $data)){

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
			$servicio = $this->Servicio->getServiciosPorId($id_servicio);
			$datos['servicio']=$servicio;
			$datos['data']=$solicitud;
			$datos['data']['respuesta']=$data['respuesta'];
			$msg = $this->load->view('dashboard/mailing/solicitud_servicio', $datos, true);
			$mail->Body = $msg;
			$mail->IsHTML(true);
			@$mail->Send();
			$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Se envio la respuesta correctamente.</div>');
        } else {
        	$this->session->set_flashdata('message', '<div class="alert alert-danger"><strong>RESULTADO:</strong> Ocurrió un problema, Intente nuevamente.</div>');
        }
        redirect(base_url().'dashboard/solo_servicios/detalleSolicitud/'.$id);
    }
	
	public function nuevoServicio() {

		if(!empty($_POST)){

			if (validacionForm($this->names_servicio, 'controller') == FALSE){
				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{

				$data = $_POST;

				if ( ! empty($_FILES["imagen"]['name']))
				{	
					 $file = $_FILES["imagen"];

					# Subida de Imagenes
					$uploaded = uploadImg( $file , 'solo_servicios', $this->sizes );
					# Fin Subida

					if( $uploaded['status'] == 200 ){

						$saved = $this->Servicio->saveServicios($data);
						if($saved){

							$dataimage['imagen_title'] = $uploaded['titulo'];
				    		$dataimage['imagen'] = $uploaded['principal'];
				    		$data['creado']=date('Y-m-j H:i:s');
							$dataimage['servicios_id'] = $saved;
							$saved2 = $this->Servicio->saveImagenServicios($dataimage);

							if($saved2){
								$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
								header('Location: '.'listaServicio',TRUE);

							}else{ echo "Se guardo los datos del servicio pero no la foto";};
						    	
						}else{
						    	$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos, vuelva a intentarlo.</div>');
						}
						    	
					}else{ 
						    $this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo subir la imagen, vuelva a intentarlo.</div>');
					}

				}else{
					   	$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No existe la imagen.</div>');
				}
				
			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names_servicio,'view');
		#body
		$datapanel['body'] 		= 'solo_servicios/nuevo_servicio';
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editarServicio() {

		$id_servicio = (int) $this->uri->segment(4,0);

		if(! $id_servicio){ echo "no existe, ver lista"; exit();};
		
		if(!empty($_POST)){

			if (validacionForm($this->names_servicio,'controller') == FALSE){

					$this->form_validation->set_error_delimiters('<label class="error">', '</label>');

			}else{

					$data = $_POST;
					$imgant = $data['imgant'];
					unset($data['imgant']);
					$image_id = $data['image_id'];
					unset($data['image_id']);
				
					if ( ! empty($_FILES["imagen"]['name']))
					{	
						$file = $_FILES["imagen"];		

						# Subida de Imagenes
						#-------------------	
						$uploaded = uploadImg( $file , 'solo_servicios', $this->sizes );
						# Fin Subida	
					 	
						if( $uploaded['status'] == 200 ){	

						 	$dataimage['imagen_title'] = $uploaded['titulo'];
						    $dataimage['imagen'] = $uploaded['principal'];

						}else{
							    $this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo subir la imagen, vuelva a intentarlo.</div>');
						}

					}else{
						   	$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong>  No existe la imagen.</div>');
					}

					$updated = $this->Servicio->UpdateServicios($id_servicio, $data);
						
					if($updated){	

						$dataimage['servicios_id'] = $id_servicio;		
						$updImg = $this->Servicio->updateImagenServicios( $image_id, $dataimage );

						if($updImg){

							$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
						}else{ 
							echo "Se guardo los datos del servicio pero no la foto";
						};
								
							$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');	
							header('Location: '.'../editarServicio/'.$id_servicio);

					}else{ 
							echo "No se pudo subir archivo"; exit();
					};

			}	
				
		}
		
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names_servicio,'view');
		#body
		$datapanel['body'] 		= 'solo_servicios/editar_servicio';
		#data
		$datapanel['dataset'] 	= $this->Servicio->getServiciosPorId( $id_servicio );
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function deleteServicio(){

		if ($_POST) {

			$id_servicios = $_POST['param_id'];

			$id = $this->Servicio->getServiciosPorId( $id_servicios );
			if(empty($id)){ 
				echo "no existe, ver lista"; exit();
			};

		    $resultado = $this->Servicio->UpdateServicios($id_servicios,array('estado'=>_ELIMINADO));
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

	#Ajax para el estado de la categoria
	public function ajaxEstado(){

		$cat = (int) $this->uri->segment(4,0);

		if ($_POST) {

			$id = $_POST['param_id'];
			$estado = $_POST['param_estado'];
			$data = array('estado'=>$estado);

			if ($cat == _CAT_SERVICIO) {
				$updated = $this->Servicio->UpdateCategorias($id, $data);
			} else {
				$updated = $this->Servicio->UpdateServicios($id, $data);
			}

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
}



