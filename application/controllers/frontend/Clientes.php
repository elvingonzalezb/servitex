<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	#public $names = array('correo|valid_email|is_unique[clientes.correo]','password');

	public function __construct() {
        parent::__construct();
        $this->load->model('frontend/model_clientes', 'Cliente');
        $this->load->helper('captcha');
        $this->load->library('My_PHPMailer');
        SessionCliente(array('login','logout','nuevo','activar_cuenta','olvido','restablecer'));
    }

	public function login() {
		$names = array('email|valid_email','clave');
		if ($this->session->userdata('Cliente')) {
			redirect(base_url().'clientes/mi-cuenta');
		}
		if (isset($_GET['account']) && !empty($_GET['account'])) {
			$codigo = htmlspecialchars($_GET['account']);
			$cliente = $this->Cliente->getClienteByKey('codigo',$codigo,_INACTIVO);
			if($cliente){
				$data = array('estado' => _ACTIVO, 'codigo'=>null);
				$this->Cliente->updateCliente($cliente['id'],$data);
				$this->session->set_flashdata('message','<div class="form-group has-feedback"><div class="alert alert-success">Su cuenta ha sido activada satisfactoriamente.</div></div>');    
			}else{
				$this->session->set_flashdata('message','<div class="form-group has-feedback"><div class="alert alert-danger">Ocurrió un error al activar tu cuenta, intente nuevamente por favor.</div></div>');
			}
			redirect(base_url().'clientes/login#redirectLogin');
		}
		if (! empty($_POST)) {
			if (validacionForm($names, 'controller') == FALSE){
				$this->form_validation->set_error_delimiters('<label class="error" style="color:#FF0000;">', '</label>');
			}else{
				$correo = $_POST['email'];
				$password = $_POST['clave'];
				if ($this->Cliente->clienteLogin($correo, $password)) {
					$cliente = $this->Cliente->getClienteByKey('correo',$correo,_ACTIVO);
					$estado = $this->Cliente->getEstadoById($cliente['estado_id']);
					$pais = $this->Cliente->getPaisById($estado['pais_id']);

					$cliente['ciudad'] = $estado['estado'];
					$cliente['pais'] = $pais['pais'];
					$cliente['codigo_pais'] = $pais['codigo'];
					$this->session->set_userdata('Cliente',$cliente);
					#verificar si existe carrito
					$pedido = $this->session->userdata('pedido_login');
					if (!empty($pedido) && $pedido['carrito'] == true) {
						$this->session->unset_userdata('pedido_login');
						if (dataConfig('tipo_tienda')==1) {
							redirect(base_url().'pedido/continuar');
						}else{
							redirect(base_url().'cotizacion/continuar');
						}
						
					}else{
						redirect(base_url().'clientes/mi-cuenta');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="form-group has-feedback"><div class="alert alert-danger">Correo o contraseña incorrecto.</div></div>');
				}
			}
    	}
		#captcha
		$data['recaptcha'] = $this->recaptcha->render();
		$data['body'] = 'login';
		$this->parser->parse("frontend/includes/template", $data);
	}

	public function logout() {
		$this->session->set_flashdata('message', '<div class="form-group has-feedback"><div class="alert alert-info">Sesión finalizada.</div></div>');
		$this->session->unset_userdata('Cliente');
		redirect(base_url().'clientes/login#redirectLogin');
    }

	public function index()	{
		///$this->load->view('welcome_message');
	}
	
	public function lista() {
	}

	public function nuevo() {
		if ($this->session->userdata('Cliente')) {
			redirect(base_url().'clientes/mi-cuenta');
		}
		$names = array('correo|valid_email|is_unique[clientes.correo]','password','nombres','apellidos','telefono');
		if ( ! empty($_POST) ) {
			
			if (validacionForm($names, 'controller') == FALSE){
				$this->form_validation->set_error_delimiters('<label class="error" style="color:#FF0000;">', '</label>');
			}else{
				// GRABAR REGISTRO  
				//$recaptcha = $this->input->post('g-recaptcha-response');
				//$response = $this->recaptcha->verifyResponse($recaptcha);
				# if($response['success']){
					$tipo_de_activacion = 1; #para saber si el correo se activara defrente o sera por correo
					$datos = $_POST;
					unset($datos['g-recaptcha-response']);
					unset($datos['cfmPassword']);
					$datos['idioma_id'] = 1;
					$datos['estado_id'] = 1;
					$datos['password'] = $this->Cliente->hashPassword($datos['password']);
					$datos['creado'] = date('Y-m-j H:i:s');
					$correo = $datos['correo'];
					if (dataConfig('tipo_activacion')== 1) {
						#Grabacion de Datos(1) si necesita activacion url por email
						$datos['codigo'] = md5(time());
						$datos['estado'] = _INACTIVO;
						$saved = $this->Cliente->saveCliente($datos);
						if($saved){
							$datos['id'] = $saved;
							
							$correo_notificaciones = explode("," , $correo);
				            // ENVIO  DE MAIL DE VERIFICACION CON EL PHP MAILER
				            $mail = new PHPMailer();
				            // luego descomentarlo para probar en servidor
							// $mail->From = dataConfig('correo_from'); // direccion de quien envia
							// $mail->FromName = dataConfig('nombre_comercial'); // nombre de quien envia
							$mail->From = $datos['correo']; // direccion de quien envia
                    		$mail->FromName = $datos['nombres']; // nombre de quien envia
				            /****PROTOCOLO SMTP PRUEBA *****/
				            //indico a la clase que use SMTP
				            /*$mail->IsSMTP();
				            //permite modo debug para ver mensajes de las cosas que van ocurriendo
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
				            $mail->Password = "solajax123";*/
				            /****PROTOCOLO SMTP PRUEBA *****/
				                  
				            for($i=0; $i<count($correo_notificaciones); $i++) {
				                $currentEmail = trim($correo_notificaciones[$i]);
				                $mail->AddAddress($currentEmail);
				            }

		            		$mail->Subject = "Bienvenido a ".dataConfig('nombre_comercial');
		            		$dato['data'] = $datos;
		            		$msg = $this->load->view('frontend/mailing/cliente_activarcuenta', $dato, true);
		            		$mail->Body = $msg;
		            		$mail->IsHTML(true);
		            		@$mail->Send();

		            		$this->session->set_flashdata('message_add', '<div class="alert alert-success">Se ha registrado correctamente, Usted recibirá un correo para confirmar la activación de su cuenta.</div>');
		            		redirect(base_url().'clientes/registrate');
		            	}else{
							$this->session->set_flashdata('message_add', '<div class="alert alert-warning">No se pudo guardar los datos, vuelva a intentarlo.</div>');
						}
						redirect(base_url().'clientes/registrate');
					}else{
						// var_dump('entro2');exit();
							// var_dump('entro3');exit();
							// var_dump('<pre>',$datos);exit();
						$saved = $this->Cliente->saveCliente($datos);
						if($saved){

							$datos['id'] = $saved;

							$correo_notificaciones = explode("," , $correo);
				            // ENVIO  DE MAIL DE VERIFICACION CON EL PHP MAILER
				            $mail = new PHPMailer();
				            // luego descomentarlo para probar en servidor
							// $mail->From = dataConfig('correo_from'); // direccion de quien envia
							// $mail->FromName = dataConfig('nombre_comercial'); // nombre de quien envia
							$mail->From = $datos['correo']; // direccion de quien envia
                    		$mail->FromName = $datos['nombres']; // nombre de quien envia
							// var_dump('<pre>',$datos);exit();
				            /****PROTOCOLO SMTP PRUEBA *****/
				            //indico a la clase que use SMTP
				            /*$mail->IsSMTP();
				            //permite modo debug para ver mensajes de las cosas que van ocurriendo
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
				            $mail->Password = "solajax123";*/
				            /****PROTOCOLO SMTP PRUEBA *****/
				                  
				            for($i=0; $i<count($correo_notificaciones); $i++) {
				                $currentEmail = trim($correo_notificaciones[$i]);
				                $mail->AddAddress($currentEmail);
				            }

		            		$mail->Subject = "Bienvenido a ".dataConfig('nombre_comercial');
		            		$dato['data'] = $datos;
		            		$msg = $this->load->view('frontend/mailing/cliente_activarcuenta', $dato, true);
		            		$mail->Body = $msg;
		            		$mail->IsHTML(true);
		            		@$mail->Send();

							$this->session->set_flashdata('message_add', '<div class="alert alert-success">Los datos se guardaron correctamente.</div>');
							$this->session->set_userdata('Cliente',$datos);
							redirect(base_url().'clientes/mi-cuenta');exit();
						}else{
							$this->session->set_flashdata('message_add', '<div class="alert alert-warning">No se pudo guardar los datos, vuelva a intentarlo.</div>');
						}
					}
				/*} else {
	                $msg_error = 'error|El código que acaba de ingresar no coincide con el de la imagen.';
	                echo $msg_error;
	        	}*/
				redirect(base_url().'clientes/registrate');	
			}
			
		}

		$data = array();
		#captcha
		//$data['recaptcha'] = $this->recaptcha->render();
		$data['body'] = 'login';
        $this->parser->parse("frontend/includes/template", $data);
	}

	public function miCuenta() {
		$sesion = $this->session->userdata('Cliente');
		$data = $this->Cliente->getClienteByKey('id', $sesion['id'],_ACTIVO);
		$data['body'] = 'mi-cuenta';
        $this->parser->parse("frontend/includes/template", $data);
	}

	public function update() {
		$names = array('nombres','apellidos','telefono');
		if (! empty($_POST)) {
			if (validacionForm($names, 'controller') == FALSE){
				$this->form_validation->set_error_delimiters('<label class="error" style="color:#FF0000;">', '</label>');
			}else{
				$datos = $_POST;
				unset($datos['correo']);
				if ($this->Cliente->updateCliente(getDataSesionCliente('id'),$datos)) {
					$this->session->set_flashdata('message', '<div class="alert alert-success">Los datos se actualizaron correctamente.</div>');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger">Ocurrió un error al actualizar los datos.</div>');
				}
			}
		}
		redirect(base_url().'clientes/mi-cuenta#postCliente');
	}

	public function nuevaClave() {
		if (! empty($_POST)) {
			$datos = $_POST;
			unset($datos['correo']);
			$cliente = $this->Cliente->getClienteById(getDataSesionCliente('id'));
			if ($cliente) {
				if ($this->Cliente->verifyPasswordHash($datos['old_clave'], $cliente['password'])) {
					$dato['password'] = $this->Cliente->hashPassword($datos['new_clave']);
					if ($this->Cliente->updateCliente(getDataSesionCliente('id'), $dato)) {
						$this->session->set_flashdata('message', '<div class="alert alert-success">La contraseña se actualizo correctamente.</div><script>$(document).ready(function() {$(".nav-tabs a.tab-password").tab("show");});</script>');
					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger">Ocurrió un error al actualizar los datos.</div><script>$(document).ready(function() {$(".nav-tabs a.tab-password").tab("show");});</script>');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-warning">La contraseña actual no coincide.</div><script>$(document).ready(function() {$(".nav-tabs a.tab-password").tab("show");$(".old_clave").focus();});</script>');
				}
			}
		}
		redirect(base_url().'clientes/mi-cuenta#postCliente');
	}

	public function olvido() {
		if ($this->session->userdata('Cliente')) {
			redirect(base_url().'clientes/mi-cuenta');
		}
		if (isset($_POST['correo']) && ! empty($_POST['correo'])) {
			$correo = $_POST['correo'];
			$cliente = $this->Cliente->getClienteByKey('correo',$correo,_ACTIVO);
			if($cliente){
				$data = array('codigo' => md5(time()),'fecha_codigo'=>date('Y-m-j H:i:s'));
				if ($this->Cliente->updateCliente($cliente['id'],$data)) {
 					$correo_notificaciones = explode("," , $correo);
 					// ENVIO  DE MAIL DE VERIFICACION CON EL PHP MAILER
					$mail = new PHPMailer();
					// luego descomentarlo para probar en servidor
					 //$mail->From = $email; // direccion de quien envia
					// $mail->FromName = dataConfig('nombre_comercial'); // nombre de quien envia
					$mail->From = $data['correo']; // direccion de quien envia
                    $mail->FromName = $data['nombre']; // nombre de quien envia
					// /****PROTOCOLO SMTP PRUEBA *****/
					// //indico a la clase que use SMTP
					// $mail->IsSMTP();
					// //permite modo debug para ver mensajes de las cosas que van ocurriendo
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

					$mail->Subject = dataConfig('nombre_comercial')." :: RECUPERAR CONTRASEÑA";
					$datos['data'] = $cliente;
					$datos['data']['codigo'] = $data['codigo'];
					$msg = $this->load->view('frontend/mailing/cliente_olvidoclave', $datos, true);
					$mail->Body = $msg;
					$mail->IsHTML(true);
					@$mail->Send();
					$this->session->set_flashdata('message', '<div class="alert alert-success">Le hemos enviado un correo electrónico, revíselo para continuar el proceso y pueda generar una nueva contraseña.</div>');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger">Ocurrió un error al generar la nueva contraseña, intente nuevamente por favor.</div>');  
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-warning">Correo ingresado no existe.</div>');
			}
			redirect(base_url().'clientes/olvido');
		}
		
		$dataView['body'] = 'restablecer';
        $this->parser->parse("frontend/includes/template", $dataView);
	}

	public function restablecer() {
		if ($this->session->userdata('Cliente')) {
			redirect(base_url().'clientes/mi-cuenta');
		}
		if (isset($_GET['account']) && !empty($_GET['account'])) {
			$codigo = htmlspecialchars($_GET['account']);
			$cliente = $this->Cliente->getClienteByKey('codigo',$codigo,_ACTIVO);
			if($cliente){
				$fecha = getCalcularFechas($cliente['fecha_codigo'],date('Y-m-j H:i:s'));
				
				if ($fecha <1) {
					$this->session->set_userdata('Cliente_restablecer',$cliente['id']);
					$this->session->set_flashdata('message_restablecer', '<div class="alert alert-success">Para terminar el proceso, ahora debe ingresar una nueva contraseña.</div>');  
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger">Ocurrió un error al generar la nueva contraseña, intente nuevamente por favor.</div>');
					redirect(base_url().'clientes/login#redirectLogin'); 
				}
				 
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Ocurrió un error al generar la nueva contraseña, intente nuevamente por favor.</div>');
				redirect(base_url().'clientes/login#redirectLogin');    
			}
        }else if (!empty($_POST)) {
            if($this->session->userdata('Cliente_restablecer')){
                if($_POST['password'] == $_POST['cfmPassword']){
                    $data = array('password' => $this->Cliente->hashPassword($_POST['password']), 'codigo'=>NULL,'fecha_codigo'=>NULL);
                    if ($this->Cliente->updateCliente($this->session->userdata('Cliente_restablecer'),$data)) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Ahora puede iniciar sesión con su nueva contraseña.</div>');
                        $this->session->unset_userdata('Cliente_restablecer');
                        redirect(base_url().'clientes/login#redirectLogin');    
                    }else{
                        $this->session->set_flashdata('message_restablecer', '<div class="alert alert-danger">Ocurrió un error, intente nuevamente por favor.</div>');
                    }
                }else{
                    $this->session->set_flashdata('message_restablecer', '<div class="alert alert-warning">Las contraseñas ingresadas no son iguales, intente nuevamente por favor.</div>');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Ocurrió un error al generar la nueva contraseña, intente nuevamente por favor.</div>');
                redirect(base_url().'clientes/login#redirectLogin');    
            }
		}
		$dataView['body'] = 'restablecer';
		$this->parser->parse("frontend/includes/template", $dataView);
	}

	public function misPedidos() {
		#-------------
		# Paginacion
		#------

		$config['base_url'] = base_url().'clientes/mis-pedidos';
		$config['total_rows'] = $this->Cliente->numPedidos(getDataSesionCliente('id'));
		$config['per_page'] = 8;
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

		$this->pagination->initialize($config);
		$dataView['paginacion'] = $this->pagination->create_links();
		$offset = $this->uri->segment( 3, 0);
		
		#------
		# Paginacion
		#------------

		$pedidos = $this->Cliente->getPedidos($config['per_page'],$offset,getDataSesionCliente('id'));
		$dataView['pedidos'] = $pedidos;
		$dataView['body'] = 'mis-pedidos';
		$this->parser->parse("frontend/includes/template", $dataView);
	}

	public function pedidoDetalle()
	{
		//print_r($this->session->userdata('Cliente'));
		$carro_id = $this->uri->segment(3,0);
		//print_r($carro_id);die;
		$pedidos = $this->Cliente->getDetallePedido($carro_id,getDataSesionCliente('id'));
		$pedidos['fecha_venta'] = getFechaTexto($pedidos['fecha_venta']);
		//print_r($pedidos);die;
		$dataView = $pedidos;
		$dataView['body'] = 'pedido-detalle';
		$this->parser->parse("frontend/includes/template", $dataView);
	}
}