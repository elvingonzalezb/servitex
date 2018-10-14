<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizaciones extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('frontend/model_productos','Producto');
        $this->load->model('frontend/Model_cotizaciones','Cotizacion');
        $this->load->library('My_PHPMailer');
    }

	public function index()
    {
        $data['carrito'] = $this->session->userdata('carrito_items');
        ///var_dump('<pre>',$data['carrito']);die;
        $data['body'] = 'cotizacion';
        $this->parser->parse("frontend/includes/template", $data);
    }

    public function continuar(){
        if (!$this->session->userdata('Cliente')) {
            $this->session->set_userdata('pedido_login',array('carrito'=>true));
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Para continuar, ingresa a tu cuenta.</div>');
            redirect(base_url().'clientes/login#redirectLogin');
        }
        $carrito = ( ! empty($this->session->userdata('carrito_items')) ? $this->session->userdata('carrito_items') : []);
        $data['numpedido'] = time().'MF';
        $data['pedido'] = $carrito;
        $data['body'] = 'cotizacion_continuar';
        $this->parser->parse("frontend/includes/template", $data);
    }

    public function enviar() {
        $cliente = $this->session->userdata('Cliente');
        if( ! $this->session->userdata('carrito_items') ) {    
            redirect(base_url());
        }else{

            // ACOPIAMOS LOS DATOS DE LA RESERVA
            $data = array();
            $data['cliente_id'] = $cliente['id'];
            $data['codigo'] = time();
            $data['estado'] = _C_PENDIENTE;
            $data['fecha'] = date("Y-m-d H:i:s");
            $correo = $cliente['correo'];
            // Vencimiento
            $ahora = time();
            //$data['monto_descuento'] = $sum_descuento;
            $fecha_venta = date('d-m-Y H:i:s', $ahora);
            // Creando Cargo
                # GUARDAMOS COTIZACION
                $id_carro = $this->Cotizacion->grabarCotizacion($data);
                # GUARDAMOS EL DETALLE DE LA COTIZACION
                $carrito = $this->session->userdata('carrito_items');
                $aux = array();
                $cont = 0;
                foreach ($carrito as $value) {
                    $datos = array();
                    $datos['cotizacion_id'] = $id_carro;
                    $datos['producto_id'] = $value['item_id'];
                    $datos['imagen'] = $value['item_imagen'];
                    //$datos['link_producto'] = $value['url'];
                    $datos['nombre'] = $value['item_nombre'];
                    //$datos['codigo'] = $value['codigo'];
                    //$datos['talla'] = $value['talla'];
                    $datos['atributo_id'] = $value['item_atributo_id'];
                    $datos['cantidad'] = $value['item_cantidad'];
                    $datos['precio'] = '';
                    $datos['subtotal'] = '';
                    //$datos['peso'] = $value['peso'];
                    //$datos['subtotalpeso'] = $value['subtotalpeso'];
                    $id_detalle = $this->Cotizacion->grabarDetalleCotizacion($datos);
                    $cont += 1;
                    
                }
                $dataMail['carrito'] = $carrito;
                $dataMail['cliente'] = $cliente;
                $dataMail['pedido'] = $data;
                if ($id_carro>0) {
                    $correo_notificaciones = explode("," , $correo);
                    // ENVIO  DE MAIL DE VERIFICACION CON EL PHP MAILER
                    $mail = new PHPMailer();
                    // luego descomentarlo para probar en servidor
                    // $mail->From = dataConfig('correo_from'); // direccion de quien envia
                    // $mail->FromName = dataConfig('nombre_comercial'); // nombre de quien envia
                    $mail->From = 'no-reply@servitex.com'; // direccion de quien envia
                    $mail->FromName = dataConfig('nombre_comercial'); // nombre de quien envia

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
                  
                    $mail ->AddAddress($cliente['correo']);
                    //$mail ->AddAddress('er.ick9015@gmail.com');

                    $mail->Subject = "Compra realizada :: ".dataConfig('nombre_comercial');
                    $msg = $this->load->view('frontend/mailing/cotizacion_carrito_cliente', $dataMail, true);
                    $mail->Body = $msg;
                    $mail->IsHTML(true);
                    if ($mail->Send()) {
                        //$this->session->unset_userdata('carrito_items');
                       // $this->session->set_flashdata('message', '<div class="alert alert-success">Su solicitud de cotización se ha realizado con éxito.</div>');
                       // redirect(base_url().'cotizacion/enviado');
                    }else{
                        echo 'Mailer Error: ' . $mail->ErrorInfo.'<br>';
                        // echo 'aaaaaaa';
                        exit;
                    }
                    #######################################
                    # CORREO PARA LA ADMINISTRACION 
                    $mail2 = new PHPMailer();
                    // $mail2->From = dataConfig('correo_from');
                    // $mail2->FromName = $cliente['nombres'];
                    $mail2->From = $cliente['correo'];
                    $mail2->FromName = $cliente['nombres'];
                 //    /****PROTOCOLO SMTP PRUEBA *****/
                 //    //indico a la clase que use SMTP
                 //    $mail2->IsSMTP();
                 //    //permite modo debug para ver mensajes de las cosas que van ocurriendo
                 //    $mail2->SMTPDebug = 0;
                 //    $mail2->CharSet = 'UTF-8';
                 //    //Debo de hacer autenticación SMTP
                 //    $mail2->SMTPAuth = true;
                 //    $mail2->SMTPSecure = "ssl";
                 //    //indico el servidor de Gmail para SMTP
                 //    $mail2->Host = "smtp.gmail.com";
                 //    //indico el puerto que usa Gmail
                 //    $mail2->Port = 465;
                 //    //indico un usuario / clave de un usuario de gmail
                 //    $mail2->Username = "soluciones.ajax2017@gmail.com";
                 //    $mail2->Password = "solajax123";
                 // /****PROTOCOLO SMTP PRUEBA *****/
                    for($i=0; $i<count($correo_notificaciones); $i++) {
                        $currentMail = trim($correo_notificaciones[$i]);
                        $mail2->AddAddress($currentMail);
                    }
                    $mail2->Subject =  "Se ha realizado una cotización.";
                    $msg2 = $this->load->view('frontend/mailing/cotizacion_carrito_admin', $dataMail, true);
                    $mail2->Body = $msg2;
                    $mail2->IsHTML(true);
                    if ($mail2->Send()) {
                        $this->session->unset_userdata('carrito_items');
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Su solicitud de cotización se ha realizado con éxito.</div>');
                        redirect(base_url().'cotizacion/enviado');
                    }else{
                        echo 'Mailer Error: ' . $mail2->ErrorInfo;exit;
                    }
                }
                
        }
       
    }

    public function agregar() {
        if (!empty($_POST)) {
            $id = $this->input->post('id');
            $cantidad = $this->input->post('cantidad');
            $atributo_id = $this->input->post('atributo');
            //var_dump($atributo_id);exit();
            $codigo = $this->input->post('codigo');
            if( $id != null){ //viene un ID para agregar
                
                $carritoItems = is_array($this->session->userdata('carrito_items')) ? $this->session->userdata('carrito_items') : array();
                if (count($carritoItems)>0){ //ya existe algo en el carrito
                     
                    $flag = false;
                    for($i=0; $i<count($carritoItems); $i++){
                        if( $carritoItems[$i]['item_id'] == $id && $carritoItems[$i]['item_atributo_id'] == $atributo_id){
                            $flag = true;
                            break;
                        }
                    }
                     
                    if($flag){
                        $carritoItems[$i]['item_cantidad'] = $cantidad;
                        //$carritoItems[$i]['item_cantidad']    += $cantidad;
                    }else{
                        #LEER LOS DATOS DEL PRODUCTO Y SI TIENE ATRIBUTO
                        $itemread = $this->Producto->getProductById($id);
                        $itemAtributo = $this->Producto->getStockAtributo($atributo_id,$id);
                        if ($itemAtributo) {
                            $itemread['atributo_nombre'] = $itemAtributo['atributos_nombres'];
                        }else{
                            $itemread['atributo_nombre'] = '';
                        }
                        if(count($itemread)>0){
                                $item = array(
                                    'item_carroID' => time(),
                                    'item_id' => $itemread['id'],
                                    'item_codigo' => $codigo,
                                    'item_nombre' => $itemread['nombre'],
                                    'item_precio' => '0',
                                    'item_imagen' => $itemread['imagen'],
                                    'item_atributo_id' => $atributo_id,
                                    'item_atributo_nombre' => $itemread['atributo_nombre'],
                                    'item_cantidad' => $cantidad
                                );
                                $carritoItems[] = $item;
                        }else{
                            redirect(base_url().'cotizacion');
                        }
                    }
                }else{ /*no hay ningun producto en la cesta, leer la info del producto y agregar a la sesion*/
                    #LEER LOS DATOS DEL PRODUCTO Y SI TIENE ATRIBUTO
                    $itemread = $this->Producto->getProductById($id);
                    $itemAtributo = $this->Producto->getStockAtributo($atributo_id,$id);
                    if ($itemAtributo) {
                        $itemread['precio'] = (!empty($itemAtributo['precio']))? $itemAtributo['precio'] : $itemAtributo['precio_oferta'];
                        $itemread['atributo_nombre'] = $itemAtributo['atributos_nombres'];
                    }else{
                        $itemread['atributo_nombre'] = '';
                    }
                    if(count($itemread)>0){
                            $item = array(
                                    'item_carroID' => time(),
                                    'item_id' => $itemread['id'],
                                    'item_codigo' => $codigo,
                                    'item_nombre' => $itemread['nombre'],
                                    'item_precio' => '0',
                                    'item_imagen' => $itemread['imagen'],
                                    'item_atributo_id' => $atributo_id,
                                    'item_atributo_nombre' => $itemread['atributo_nombre'],
                                    'item_cantidad' => $cantidad
                                );
                                //$carritoItems[$item['item_id']] = $item;
                                $carritoItems[] = $item;
                    }else{
                        redirect(base_url().'cotizacion');
                    }
                }
                $this->session->set_userdata('carrito_items',$carritoItems);
                redirect(base_url().'cotizacion');
            }
        }else{
            redirect(base_url().'cotizacion');
        }
    }

    public function error() {
        $data['body'] = 'error';
        $this->load->view("frontend/includes/template", $data);
    }
    public function enviado() {
        $data['body'] = 'enviado';
        $this->load->view("frontend/includes/template", $data);
    }
}
