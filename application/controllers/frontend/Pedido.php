<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(_LIBRARIESPATH.'culqi/Requests-master/library/Requests.php');
Requests::register_autoloader();
require_once(_LIBRARIESPATH.'culqi/lib/culqi.php');

class Pedido extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('frontend/model_productos','Producto');
        $this->load->model('frontend/Model_ajax','Ajax');
        $this->load->library('My_PHPMailer');
    }

	public function index()
    {
        $data['carrito'] = $this->session->userdata('carrito_items');
        $data['body'] = 'pedido';
        $this->parser->parse("frontend/includes/template", $data);
    }

    public function continuar(){
        if (!$this->session->userdata('Cliente')) {
            $this->session->set_userdata('pedido_login',array('carrito'=>true));
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Para continuar con tu compra, ingresa a tu cuenta.</div>');
            redirect(base_url().'clientes/login#redirectLogin');
        }
        $carrito = ( ! empty($this->session->userdata('carrito_items')) ? $this->session->userdata('carrito_items') : []);
        $data['numpedido'] = time().'MF';
        $data['pedido'] = $carrito;
        $data['body'] = 'pedido_continuar';
        $this->parser->parse("frontend/includes/template", $data);
    }

    public function enviar() {
        $cliente = $this->session->userdata('Cliente');
        if( ! $this->session->userdata('carrito_items') ) {    
            redirect(base_url());
        }else{
            header('Content-Type: application/json');
            // API Key y autenticación
            $SECRET_API_KEY = "sk_test_VWxGM9sdYJGSyMR1";//API KEY private PARA PRUEBA
            //$SECRET_API_KEY = "bJntWqgJJKKMvU5mw+q5+Ff1vONawZzZo1mSvXMe9J0="; //API KEY PARA PRODUCCION
            $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));
            $total = $_POST['total'];
            $token = $_POST['token'];
            $correo = $_POST['email'];
            //$sum_descuento = $_POST['sum_descuento'];

            //$cliente = $this->session->userdata('cliente');

            $pedidoId = $_POST['numpedido'];

            // ACOPIAMOS LOS DATOS DE LA RESERVA
            $data = array();
            $data['cliente_id'] = $cliente['id'];
            $data['codigo_pedido'] = $pedidoId;
            $data['token'] = $token;
            $data['total'] = $total/100;
            $data['estado'] = _C_PAGADO;
            $data['fecha_venta'] = date("Y-m-d H:i:s");
            // Vencimiento
            $ahora = time();
            //$data['monto_descuento'] = $sum_descuento;
            $fecha_venta = date('d-m-Y H:i:s', $ahora);
            // Creando Cargo
            try {

                $cargo = $culqi->Charges->create(
                    array(
                        "capture" => true,
                        "currency_code"=> "PEN",
                        "amount"=> $total,
                        "source_id"=> $token,
                        //"usuario"=> $id_cliente,
                        "description"=> "Venta web",
                        //"pedido"=> $pedidoId,
                        //"codigo_pais"=> $codigo_pais,
                        //"direccion"=> $cliente->direccion,
                        //"ciudad"=> $ciudad,
                        //"telefono"=> $cliente->telefono,
                        "metadata" => array("pedido"=>$pedidoId),
                        "email"=> $correo,
                        "antifraud_details" => array(
                            "address" => $cliente['direccion'],
                            "address_city"=> $cliente['ciudad'],
                            "country_code" => $cliente['codigo_pais'],
                            "first_name"=> $cliente['nombres'],
                            "last_name"=> $cliente['apellidos'],
                            "phone_number" => $cliente['telefono']
                            )
                        )
                    );

                # GUARDAMOS COTIZACION
                $id_carro = $this->Ajax->grabarPedido($data);
                # GUARDAMOS EL DETALLE DE LA COTIZACION
                $carrito = $this->session->userdata('carrito_items');
                $aux = array();
                $cont = 0;
                foreach ($carrito as $value) {
                    $datos = array();
                    $datos['carrito_id'] = $id_carro;
                    $datos['producto_id'] = $value['item_id'];
                    $datos['imagen'] = $value['item_imagen'];
                    //$datos['link_producto'] = $value['url'];
                    $datos['nombre'] = $value['item_nombre'];
                    //$datos['codigo'] = $value['codigo'];
                    //$datos['talla'] = $value['talla'];
                    $datos['atributo_id'] = $value['item_atributo_id'];
                    $datos['cantidad'] = $value['item_cantidad'];
                    $datos['precio'] = $value['item_precio'];
                    $datos['subtotal'] = $value['item_subtotal'];
                    //$datos['peso'] = $value['peso'];
                    //$datos['subtotalpeso'] = $value['subtotalpeso'];
                    $id_detalle = $this->Ajax->grabarDetallePedido($datos);
                    $cont += 1;
                    if (!empty($value['item_atributo_id'])) {
                        $this->Ajax->updateStockAtributo($value['item_atributo_id'], $value['item_cantidad']);
                    }else{
                        $this->Ajax->updateStock($value['item_id'], $value['item_cantidad']);
                    }
                    
                }
                $dataMail['carrito'] = $carrito;
                $dataMail['cliente'] = $cliente;
                $dataMail['pedido'] = $data;
                if ($id_carro>0) {
                   $notificaciones = dataConfig('correo_notificaciones');
                    $correo_notificaciones = explode(",", $notificaciones);
                    // ENVIO  DE MAIL DE VERIFICACION CON EL PHP MAILER
                    $mail = new PHPMailer();
                    // luego descomentarlo para probar en servidor
                     
                    $mail->From = 'no-reply@homemusic.com'; // direccion de quien envia
                    $mail->FromName = dataConfig('nombre_comercial'); // nombre de quien envia

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
                  
                    $mail ->AddAddress($cliente['correo']);
                    //$mail ->AddAddress('er.ick9015@gmail.com');

                    $mail->Subject = "Compra realizada :: ".dataConfig('nombre_comercial');
                    $msg = $this->load->view('frontend/mailing/pedido_carrito_cliente', $dataMail, true);
                    $mail->Body = $msg;
                    $mail->IsHTML(true);
                    @$mail->Send();
                    #######################################
                    # CORREO PARA LA ADMINISTRACION 
                    $mail2 = new PHPMailer();
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
                    $mail2->Subject =  "Se ha realizado una venta.";
                    $msg2 = $this->load->view('frontend/mailing/pedido_carrito_admin', $dataMail, true);
                    $mail2->Body = $msg2;
                    $mail2->IsHTML(true);
                    @$mail2->Send();
                }
                $this->session->unset_userdata('carrito_items');
                $this->session->set_flashdata('message', '<div class="alert alert-success">'.$cargo->outcome->user_message.'</div>');
                // $json = array('tipo'=>'success','redirect'=>'pedido/enviado','message'=>$cargo->outcome->user_message);
                $json = array('tipo'=>'success','redirect'=>'clientes/pedido-detalle/'.$id_carro,'message'=>$cargo->outcome->user_message);
                //print_r();die;
                echo json_encode($json);
            } catch(Exception $e) {
                // ERROR: El cargo tuvo algún error o fue rechazado
                $js = json_decode($e->getMessage());
                $json = array('tipo'=>'error','redirect'=>'pedido/error','message'=>$js->{'user_message'});

                echo json_encode($json);
            }
        }
       
    }

    public function agregar() {
        if (!empty($_POST)) {
            // var_dump('<pre>',$_POST);exit();
            $id = $this->input->post('id');
            $cantidad = $this->input->post('cantidad');
            $atributo_id = $this->input->post('atributo');
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
                        $carritoItems[$i]['item_subtotal'] = $carritoItems[$i]['item_cantidad'] * $carritoItems[$i]['item_precio'];  
                    }else{
                        #LEER LOS DATOS DEL PRODUCTO Y SI TIENE ATRIBUTO
                        $itemread = $this->Producto->getProductById($id);
                        $itemAtributo = $this->Producto->getStockAtributo($atributo_id,$id);
                        // var_dump('<pre>',$itemAtributo);exit();
                        if ($itemAtributo) {
                            $itemread['precio'] = (empty($itemAtributo['precio_oferta']))? $itemAtributo['precio'] : $itemAtributo['precio_oferta'];
                            $itemread['atributo_nombre'] = $itemAtributo['atributos_nombres'];
                        }else{
                            $itemread['precio'] = (empty($itemread['precio_oferta']))? $itemread['precio'] : $itemread['precio_oferta'];
                            $itemread['atributo_nombre'] = '';
                        }
                        // var_dump($codigo);exit();
                        if(count($itemread)>0){
                                $item = array(
                                    'item_carroID' => time(),
                                    'item_id' => $itemread['id'],
                                    'item_codigo' => $codigo,
                                    'item_nombre' => $itemread['nombre'],
                                    'item_precio' => $itemread['precio'],
                                    'item_imagen' => $itemread['imagen'],
                                    'item_atributo_id' => $atributo_id,
                                    'item_atributo_nombre' => $itemread['atributo_nombre'],
                                    'item_cantidad' => $cantidad,
                                    'item_subtotal' => $cantidad * $itemread['precio']
                                );
                                $carritoItems[] = $item;
                        }else{
                            redirect(base_url().'pedido');
                        }
                    }
                }else{ /*no hay ningun producto en la cesta, leer la info del producto y agregar a la sesion*/
                    #LEER LOS DATOS DEL PRODUCTO Y SI TIENE ATRIBUTO
                    $itemread = $this->Producto->getProductById($id);
                    $itemAtributo = $this->Producto->getStockAtributo($atributo_id,$id);
                    // var_dump('<pre>',$itemAtributo);exit();
                    if ($itemAtributo) {
                        $itemread['precio'] = (!empty($itemAtributo['precio']))? $itemAtributo['precio'] : $itemAtributo['precio_oferta'];
                        $itemread['atributo_nombre'] = $itemAtributo['atributos_nombres'];
                    }else{
                        $itemread['atributo_nombre'] = '';
                    }
                    // var_dump($codigo);exit();
                    if(count($itemread)>0){
                            $item = array(
                                    'item_carroID' => time(),
                                    'item_id' => $itemread['id'],
                                    'item_codigo' => $codigo,
                                    'item_nombre' => $itemread['nombre'],
                                    'item_precio' => $itemread['precio'],
                                    'item_imagen' => $itemread['imagen'],
                                    'item_atributo_id' => $atributo_id,
                                    'item_atributo_nombre' => $itemread['atributo_nombre'],
                                    'item_cantidad' => $cantidad,
                                    'item_subtotal' => $cantidad * $itemread['precio']
                                );
                                //$carritoItems[$item['item_id']] = $item;
                                $carritoItems[] = $item;
                    }else{
                        redirect(base_url().'pedido');
                    }
                }
                // var_dump('<pre>',$carritoItems);exit();
                $this->session->set_userdata('carrito_items',$carritoItems);
                redirect(base_url().'pedido');
            }
        }else{
            redirect(base_url().'pedido');
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
