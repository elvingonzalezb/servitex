<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('dashboard/model_pedidos', 'Pedido');
        SessionUsuario();
	}

	public function lista() { 
		
		$aux = $this->Pedido->getListaPedido();
		$ordenes = array();
		foreach($aux as $dato_orden){
			$aux2 = array();
			$aux2['id'] = $dato_orden['id'];
			$auxiliar = $dato_orden['id'];
			$aux2['codigo_orden'] = $dato_orden['codigo_pedido'];
			$aux2['id_cliente'] = $dato_orden['cliente_id'];
			if($dato_orden['cliente_id'] ===0)
			{
				$nombre='No se tiene asignado un cliente';
			}
			else
			{
				$ax = $this->Pedido->getCliente($dato_orden['cliente_id']);
				
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
			$aux2['fecha_venta'] = formatoFechaHora($dato_orden['fecha_venta']);
			$aux2['estado'] = $dato_orden['estado'];
			$aux2['codigos_productos'] = codigosProductosReserva($dato_orden['id']); 
			$ordenes[] = $aux2;
		}
		//$dataPrincipal['ordenes'] = $ordenes;
		$resultado = $this->uri->segment(5);
		$datapanel["resultado"] = $resultado;

		//body
		$datapanel['body'] 		= 'pedidos/lista';
		//data
		$datapanel['ordenes'] = $ordenes;
		//$datapanel['dataset'] 	= $this->Pedido->getProductByCategory($id);
		$this->load->view("dashboard/includes/template", $datapanel);
	}

    public function detalle() {
        // DETALLE DE ORDEN
        $id_carro = $this->uri->segment(4);
        $resultado = $this->uri->segment(5);
        $orden= $this->Pedido->getPedido($id_carro);
        $cliente = $this->Pedido->getCliente($orden['cliente_id']);

        $datapanel['cliente'] = $cliente;

        $datapanel['orden'] = $orden;
        $datapanel["resultado"] = $resultado;
        $datapanel['carro'] = $orden;
        $detalles = $this->Pedido->getDetallesPedido($id_carro);
        $datapanel['detalles'] = $detalles;
        $datapanel['body'] 		= 'pedidos/detalle';
        $this->load->view("dashboard/includes/template", $datapanel);
    }
}