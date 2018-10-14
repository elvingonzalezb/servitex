<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensajes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_mensajes', 'Mensajes');
        SessionUsuario();
    }
    public $names = array('nombre');

    public function index()
    {
        ///$this->load->view('welcome_message');
    }
    
    public function lista() {

        $datapanel['body']      = 'mensajes/lista';
        $datapanel['dataset']   = $this->Mensajes->getMensajes();
        $this->load->view("dashboard/includes/template", $datapanel);
    }
    public function lista_detalle() {

        $id = (int) $this->uri->segment(4,0);  
        $datapanel['body']      = 'mensajes/lista_detalle';
        $dat['estado']      = 1;
        $this->Mensajes->leidoMensaje($id,$dat);
        $datapanel['dataset']   = $this->Mensajes->getMensajesById($id);
        $this->load->view("dashboard/includes/template", $datapanel);
    }

    public function responder() {
        $this->load->library('My_PHPMailer');
        $id = (int) $this->uri->segment(4,0);  
        
        $data = $_POST;
        $mensaje = $this->Mensajes->getMensajesById($id);

       if ($this->Mensajes->UpdateMensajes($id, $data)) {
            $correo_notificaciones = $mensaje['correo'];
            // ENVIO  DE MAIL DE VERIFICACION CON EL PHP MAILER
            $mail = new PHPMailer();
            // luego descomentarlo para probar en servidor

           // $mail->From = dataConfig('correo_from'); // direccion de quien envia
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


            $mail->Subject = "Respuesta Contacto :: ".dataConfig('nombre_comercial');
            $datos['data']=$mensaje;
            $datos['data']['respuesta']=$data['respuesta'];
            $msg = $this->load->view('dashboard/mailing/contactenos_respuesta', $datos, true);
            $mail->Body = $msg;
            $mail->IsHTML(true);
            @$mail->Send();
            $this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Se envio la respuesta correctamente.</div>');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger"><strong>RESULTADO:</strong> Ocurrió un problema, Intente nuevamente.</div>');
        }
        redirect(base_url().'dashboard/mensajes/lista_detalle/'.$id);
    }

    // public function editar() {
        
    //     $id_mensajes = (int) $this->uri->segment(4,0);        
    //     if(! $id_mensajes){ echo "no existe, ver lista"; exit();};  

    //     if(!empty($_POST)){

    //         if (validacionForm($this->names,'controller') == FALSE){

    //             $this->form_validation->set_error_delimiters('<label class="error">', '</label>');
    //         }else{

    //             $data = $_POST;
    //             $data['estado'] = (int) $data['estado'];
    //             $updated = $this->Mensajes->UpdateMensajes($id_mensajes, $data);
    //             if($updated){                   
    //                     $this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
    //             }else{ echo "No se pudo subir archivo"; exit();};

    //             header('Location: '.'../editar/'.$id_mensajes);
    //         }
    //     }
    //     #validaciones
    //     $datapanel['requerid']  = validacionForm($this->names,'view');
    //     $datapanel['body']      = 'mensajes/editar';
    //     $datapanel['dataset']   = $this->Mensajes->getMensajesById( $id_mensajes );
    //     if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
    //     $this->load->view("dashboard/includes/template", $datapanel);
        
    // }

    public function delete(){

        if ($_POST) {
            $id_mensajes = $_POST['param_id'];

            $id=$this->Mensajes->getMensajesById( $id_mensajes );
            if(empty($id)){ 
                echo "no existe, ver lista"; exit();
            };

            $resultado = $this->Mensajes->UpdateMensajes($id_mensajes,array('estado'=>_ELIMINADO));
            if($resultado) {
                $result['titulo'] =  '¡Hecho!';
                $result['estado'] =  'success';
                $result['msj'] = 'Se elimino correctamente.';
            }
            else {
                $result['titulo'] =  '¡Error!';
                $result['estado'] = 'error';
                $result['msj'] = 'Ha ocurridó un error, vuelve a intertarlo';
            }
            echo json_encode($result);
        }
    }


}

