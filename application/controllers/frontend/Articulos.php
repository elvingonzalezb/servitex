<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulos extends CI_Controller {

  public function __construct() {
        parent::__construct();
        $this->load->model('frontend/Model_articulos','Articulos');
        $this->load->library('My_PHPMailer');
    }

  public $names = array('nombre','correo','comentario');

  public function index(){
    ///$this->load->view('welcome_message');
  }
  
  public function lista() { 

      #HEADER - SEO ----------
      $seccion = 'articulos';
      $seo = getSeccion($seccion);
      $data['seo'] = $seo;

      $recientes = $this->Articulos->getArticulosRecientes(5);
      $data['recientes'] = $recientes;
      
      #------------------------
      # Paginacion
      #------

      $config['base_url'] = base_url().'articulos/';
      $config['total_rows'] = $this->Articulos->numArticulos();
      $config['per_page'] = 9;
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
      $data['paginacion'] = $this->pagination->create_links();
      $offset = $this->uri->segment( 2, 0);
      
      #------
      # Paginacion
      #------------

      $articulos= $this->Articulos->getArticulos($config['per_page'],$offset);
      if( empty($articulos)){ 
          $this->load->view("frontend/includes/template", ['body'=>'error_404']);
      }

      $data['body'] = $seccion;
      $data['articulos']=$articulos;
      $data['seccion'] = getSecciones(4);

      $this->parser->parse( "frontend/includes/template", $data );

  }

  public function listaDetalle() {
      $id = $this->uri->segment( 2, 0);
      $id_articulo = substr(strrchr($id,'-'),1);
      $articulo = $this->Articulos->getArticulosById($id_articulo);
      # HEADER - SEO ----------
      $data['seo'] = $articulo;
      #------------------------

      $recientes = $this->Articulos->getArticulosRecientes(5);
      $data['recientes'] = $recientes;
      #VALIDACION DEL QUERY
      if( empty($articulo)){ $this->load->view("frontend/includes/template", ['body'=>'error_404']);}
      

      $data['articulo'] = $articulo;
      $data['articulo']['url_share'] = base_url().'articulos/'.$articulo['url'].'-'.$articulo['id'];
      $data['body']    = 'articulo_detalle';
      $data['dataset']   = $articulo;

      $this->parser->parse("frontend/includes/template", $data);
  }

  public function enviarComentario() {
      
      $datos=array();
      if(!empty($_POST)){
          $data = $_POST;
          if (validacionForm($this->names, 'controller') == FALSE){
        
            $this->form_validation->set_error_delimiters('<div class="form-group has-feedback"><label class="error">', '</label></div>');

          }else{
            unset($data['url']);
            $id_comentario = $this->Articulos->saveComentarioId($data);

            if( $id_comentario ) {
                $correo_notificaciones = explode("," , dataConfig('correo_notificaciones'));
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

                $mail->Subject = "Formulario de articulo.";

                $id_articulo=$data['articulo_id'];
                $articulo = $this->Articulos->getArticulosById($id_articulo);
                $datos['articulo']=$articulo;
                $datos['data']=$data; 
                $datos['body']='articulo_comentario';

                $msg = $this->load->view('frontend/mailing/includes/template', $datos, true);
                $mail->Body = $msg;
                $mail->IsHTML(true);
                @$mail->Send();

                $this->session->set_flashdata('message', '<div class="alert alert-success"> Su mensaje ha sido enviado satisfactoriamente.</div>');

                // header('Location: '.base_url().'articulos/'.$articulo['url'].'-'.$articulo['id'],TRUE);
                redirect(base_url()."articulos/".$articulo['url'].'-'.$articulo['id'], TRUE);

            }else {

                  $this->session->set_flashdata('message', '<div class="alert alert-success"> Ha ocurrido un error. Inténtelo nuevamente.</div>'); 
            }
         }  //fin validacion controller
      }

  }

}

