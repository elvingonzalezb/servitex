<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactenos extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('frontend/model_contactenos','Contacto');
        $this->load->library('My_PHPMailer');
    }
    public $names = array('nombre','empresa','telefono','correo','mensaje');

	public function index()
	{
		///$this->load->view('welcome_message');
	}
	
	public function lista() {
        #HEADER - SEO ----------
        $seccion = 'contactenos';	
        $seo = getSeccion($seccion);
        $datapanel['seo'] = $seo;

		$datapanel['body'] 		= $seccion;
		$datapanel['mapa'] 	= $this->Contacto->getContactenos(2);
        $datapanel['seccion'] = getSecciones(7);
		if( empty($datapanel['mapa'])){ echo "este item no existe"; exit();}
		$this->load->view("frontend/includes/template", $datapanel);
	}

	public function enviarMensaje() {

        if(!empty($_POST)){
            
            $data = $_POST;

            if (validacionForm($this->names, 'controller') == FALSE){
            
                $this->form_validation->set_error_delimiters('<div class="form-group has-feedback"><label class="error">', '</label></div>');
              }else{
                
                $id_mensaje = $this->Contacto->saveContactenosId($data);

                if( $id_mensaje ) {

                    $correo_notificaciones = explode("," , dataConfig('correo_notificaciones'));
                    // ENVIO  DE MAIL DE VERIFICACION CON EL PHP MAILER
                    $mail = new PHPMailer();
                    // luego descomentarlo para probar en servidor

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

                    $mail->Subject = "Formulario de contacto.";

                    $data['data']=$data; 
                    $data['body']='contactenos_mensaje';
                    $msg = $this->load->view('frontend/mailing/includes/template', $data, true);
                    $mail->Body = $msg;
                    $mail->IsHTML(true);
                    @$mail->Send();

                    $this->session->set_flashdata('message', '<div class="alert alert-success"> Su mensaje ha sido enviado satisfactoriamente.</div>');

                    redirect(base_url().'contactenos');
                } else {
                        
                        $this->session->set_flashdata('message', '<div class="alert alert-success"> Ha ocurrido un error. Inténtelo nuevamente.</div>'); 
                }
            }

        }
        #validaciones
  }


}

