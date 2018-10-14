<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('frontend/model_servicios','Servicios');
		$this->load->library('My_PHPMailer');
		$this->load->helper('captcha');
	}

	public function index(){
		///$this->load->view('welcome_message');
	}
	
	public function lista() {	

		#HEADER - SEO ----------
		$seccion = 'servicios';
		$seo = getSeccion($seccion);
		$datapanel['seo'] = $seo;

		#------------------------
		# Paginacion
		#------
		$config['base_url'] = base_url().'servicios/';
		$config['total_rows'] = $this->Servicios->num();
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
		$datapanel['dataset'] = $this->Servicios->getServicios($config['per_page'],$offset);
		$datapanel['banner'] = getSecciones(3);
  		if( empty($datapanel['dataset'])){ 
			$this->load->view("frontend/includes/template", ['body'=>'error_404']);
		}

		$datapanel['body']    = $seccion;
		
		$this->parser->parse("frontend/includes/template", $datapanel); 
		
	}

	public function listaDetalle() {
   
		$id = $this->uri->segment(2,0);
		$id_servicio = substr(strrchr($id,'-'),1);
		
		$datapanel['dataset_por_id'] 	= $this->Servicios->getServiciosById($id_servicio);
		$datapanel['dataset'] = $this->Servicios->getServiciosByCategoria();
		$datapanel['articulo']=$this->Servicios->getServiciosArticulos();
		$servicios=$datapanel['dataset_por_id'];
		#HEADER - SEO ----------
		$datapanel['seo'] = $servicios;
		#------------------------

		if( empty($datapanel['dataset_por_id'])){ 
			$this->load->view("frontend/includes/template", ['body'=>'error_404']);
		}
		#body
		$datapanel['body'] = 'servicio_detalle';
		#captcha
		$datapanel['recaptcha'] = $this->recaptcha->render();

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
				$data['creado']=date('Y-m-j H:i:s');
				$id_comentario = $this->Servicios->saveSolicitudServicios($data);

				if( $id_comentario ) {
					$correo_notificaciones = explode("," , dataConfig('correo_notificaciones'));
					// var_dump('<pre>',$correo_notificaciones);exit();
					// ENVIO  DE MAIL DE VERIFICACION CON EL PHP MAILER
					$mail = new PHPMailer();
					// luego descomentarlo para probar en servidor

					// $mail->From = dataConfig('correo_from'); // direccion de quien envia
					// $mail->FromName = dataConfig('nombre_comercial'); // nombre de quien envia
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

					$mail->Subject = "Formulario de servicio.";

					$id_servicio=$data['servicio_id'];
					$servicio = $this->Servicios->getServiciosById($id_servicio);
					$datos['servicio']=$servicio;
					$datos['data']=$data; 
					$datos['body']='solicitud_servicio';
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

}