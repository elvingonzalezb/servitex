<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizaciones extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('dashboard/model_cotizaciones', 'Cotizacion');
		$this->load->helper(array('form'));
		$this->load->library('My_PHPMailer');
        SessionUsuario();
	}

	public function index()
	{
		///$this->load->view('welcome_message');
	}

	public function lista() { 
		
		$aux = $this->Cotizacion->getListaCotizacion();
		$ordenes = array();
		foreach($aux as $dato_orden){
			$aux2 = array();
			$aux2['id'] = $dato_orden['id'];
			$auxiliar = $dato_orden['id'];
			$aux2['codigo_orden'] = $dato_orden['codigo'];
			$aux2['id_cliente'] = $dato_orden['cliente_id'];
			if($dato_orden['cliente_id'] ===0)
			{
				$nombre='No se tiene asignado un cliente';
			}
			else
			{
				$ax = $this->Cotizacion->getCliente($dato_orden['cliente_id']);
				
				$num_ax=count($ax);
				if($num_ax>0){
					$nombre = $ax['nombres'];
					$apellidos = $ax['apellidos']; 
				}
				else
				{
					$nombre='El cliente no existe en la Base de Datos';
				}
			}

			$aux2['nombre_cliente'] = $nombre." ".$apellidos;
			$aux2['fecha_venta'] = formatoFechaHora($dato_orden['fecha']);
			$aux2['estado'] = $dato_orden['estado'];
			$aux2['codigos_productos'] = codigosProductosReserva($dato_orden['id']); 
			$ordenes[] = $aux2;
		}
		$resultado = $this->uri->segment(5);
		$datapanel["resultado"] = $resultado;

		//body
		$datapanel['body'] 		= 'cotizaciones/lista';
		//data
		$datapanel['ordenes'] = $ordenes;
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function cotizar() {
        // DATOS PEDIDO
        $id_carro = $this->uri->segment(4);
        $resultado = $this->uri->segment(5);
        $orden= $this->Cotizacion->getCotizacion($id_carro);

        $cliente = $this->Cotizacion->getCliente($orden['cliente_id']);
        
        $datapanel['cliente'] = $cliente;
        $datapanel['orden'] = $orden;
        $datapanel["resultado"] = $resultado;
        $detalles = $this->Cotizacion->getDetallesCotizacion($id_carro);
        $datapanel['detalles'] = $detalles;

        //body
		$datapanel['body'] 		= 'cotizaciones/cotizar';
		$this->load->view("dashboard/includes/template", $datapanel);      
    }

    public function detalle() {
        // DETALLE DE ORDEN
        $id_carro = $this->uri->segment(4);
        $resultado = $this->uri->segment(5);
        $orden= $this->Cotizacion->getCotizacion($id_carro);
        $cliente = $this->Cotizacion->getCliente($orden['cliente_id']);     
        $datapanel['cliente'] = $cliente;

        $datapanel['orden'] = $orden;
        $datapanel["resultado"] = $resultado;
        $datapanel['carro'] = $orden;
        $detalles = $this->Cotizacion->getDetallesCotizacion($id_carro);
        $datapanel['detalles'] = $detalles;
        $datapanel['body'] 		= 'cotizaciones/detalle';
        $this->load->view("dashboard/includes/template", $datapanel);
    }

    public function enviar() {
        $id_carro = $this->input->post('id'); 
        $num_items = $this->input->post('num_items');
        $id_cliente = $this->input->post('id_cliente');
        $total = $this->input->post('total');
        for($i=0; $i<$num_items; $i++)
        {
            $id_detalle = $this->input->post('id_detalle_'.$i);
            $valor = $this->input->post('precio_'.$i);
            $cantidad = $this->input->post('cantidad_'.$i);
            $precio = $valor;
            $subtotal = $valor * $cantidad;
            $data = array("precio"=>$precio,"subtotal"=>$subtotal);
            $this->Cotizacion->updatePreciosCotizacion($id_detalle, $data);
        }

        $d = array('total'=>$total);
        $this->Cotizacion->updateTotalPrecio($id_carro, $d);

        // ****** CAMBIAMOS EL ESTADO A BORRADA **********
        $ahora = time();
        $fecha_cotizacion = date('Y-m-d H:i:s', $ahora);

        $dataup = array(
            "estado"    => _C_COTIZADO,
            "fecha" => $fecha_cotizacion
        );
        $this->Cotizacion->updateEstado($id_carro, $dataup);
       
        $orden = $this->Cotizacion->getCotizacion($id_carro);

        $vectorFecha = explode(" ", $fecha_cotizacion);
        $fechaCotizacion = Ymd_2_dmY($vectorFecha[0]);
        $horaCotizacion = $vectorFecha[1];
        $fechaHoraCotizacion = $fechaCotizacion.' '.$horaCotizacion;


        /******** ENVIAMOS NOTIFICACION DE LA ANULACION A CLIENTE Y A CKI **********/
        $datosCliente = $this->Cotizacion->getCliente($orden['cliente_id']); 
        //****************  FIN DE CREACION DE CARRITO *******************

        $correo_notificaciones = explode(",", dataConfig("correo_notificaciones"));

        //********** INFORMACION PARA CKI *************/
        $mail = new PHPMailer();

        //$mail->From     = dataConfig("correo_from");  //direccion de quien envia el correo   
        $mail->FromName = dataConfig('nombre_comercial');

        /****PROTOCOLO SMTP PRUEBA *****/
        //indico a la clase que use SMTP
		$mail->IsSMTP();
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
		$mail->Password = "solajax123";
		/****PROTOCOLO SMTP PRUEBA *****/

        for($i=0; $i<count($correo_notificaciones); $i++)
        {
            $currentMail = trim($correo_notificaciones[$i]);
            $mail->AddBCC($currentMail);
        }
        $mail->AddAddress($datosCliente['correo']);
        $mail->Subject =  "Solicitud de cotización atendida";

        $datos['cliente'] = $datosCliente;
        $datos['fecha'] = $fechaHoraCotizacion;
        $datos['pedidos'] = $orden; 
        $datos['total'] = $total; 
        $datos['carrito'] = $this->Cotizacion->getDetallesCotizacion($id_carro);
        $msg = $this->load->view('dashboard/mailing/solicitud_cotizacion', $datos, true);
        

        $mail->Body = $msg;
        $mail->IsHTML(true); 
        @$mail->Send(); 
        redirect(base_url().'dashboard/cotizaciones/detalle/'.$id_carro.'/success');
    }

}