<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atributos extends CI_Controller {
	public $names = array('nombre','estado');
	public function __construct() {
		parent::__construct();
		$this->load->model('dashboard/model_atributos', 'Atributo');
		$this->load->model('dashboard/model_productos', 'Producto');
		SessionUsuario();
	}

	public function index()
	{
		///$this->load->view('welcome_message');
	}

	public function lista()
	{	
		$id = 2;
		$datapanel['body'] 		= 'atributos/lista';
		$datapanel['detalle'] 	= $this->Atributo->getDetalleAtributo($id);
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function getAjaxAtributos(){
		if ($_POST && !empty($_POST)) {
			$data['atributos'] = $this->Atributo->getCategAtrib($_POST['id_categoria']);
			$this->load->view("dashboard/sections/atributos/getAjaxAtributos", $data);
		}
	}

	public function getAjaxAtributos_edit(){
		if ($_POST && !empty($_POST)) {
			$data['detalle'] = $this->Atributo->getDetalleAtributoMultiple($_POST['producto_id']);
			
			$data['atributos'] = $this->Atributo->getCategAtrib($_POST['id_categoria']);
			if (empty($data['atributos'])) {
				$data['producto'] = $this->Producto->getProductById($_POST['producto_id']);
			} 
			$this->load->view("dashboard/sections/atributos/getAjaxAtributos", $data);
		}
	}
	
	public function agrega_precio_lista() {
		$atributos = implode(",", array_filter($_POST['atributos']));
		$atributos_id = implode(",", array_filter($_POST['atributos_id']));
		$stock = $_POST['stock'];
		$precio = $_POST['precio'];
		$precio_oferta = $_POST['precio_oferta'];
		$datos = array_filter(explode("║", $_POST['datos']));
		
		$repite = 0;
		for ($i=0; $i < count($datos); $i++) { 
			$datos2 = explode("│", $datos[$i]);
			if (!empty($datos) && $datos2[1] == $atributos_id ) {
				$repite = 1;
			}
		}
		if (empty($datos)) {
			// Esta vacio, lo agregamos
			$datos_atributos = $atributos.'│'.$atributos_id.'│'.$precio.'│'.$precio_oferta.'│'.$stock;
			$final = $datos_atributos;
			$se_agrego = 1;
		}else if($repite == 1){
			// Ya esta, no hacemos nada
			$final = $_POST['datos'];
			$se_agrego = 0;
		}else{
			// No esta, lo agregamos
			$datos[] = $atributos.'│'.$atributos_id.'│'.$precio.'│'.$precio_oferta.'│'.$stock;
			$final = implode("║",array_filter($datos));
			$se_agrego = 1;
		}
		$envio = $atributos.'|'.$atributos_id.'|'.$precio.'|'.$precio_oferta.'|'.$se_agrego.'|'.$stock.'|'.$final;
		$json['dato'] = $envio;
		echo json_encode($json);
	}

	public function quitar_precio_lista() {
		$atributos_id = str_replace("-",",",$_POST['atributos_id']);
		$atributos = explode("║", $_POST['atributos']);
		$aux2 = array();
		for($i=0; $i<count($atributos); $i++)
		{
			$lista_precios = explode('│', $atributos[$i]);
			if($lista_precios[1] != $atributos_id)
			{
				$aux2[] = $atributos[$i];
			}
		}
		$json['dato'] = $atributos_id.'|'.implode("║",$aux2);
		echo json_encode($json);
	}


	// public function lista()
	// {
	// 	$datapanel['body'] 		= 'atributos/lista';
	// 	$datapanel['dataset'] 	= $this->Atributo->getAtributos();
	// 	$datapanel['required'] 		= array();
	// 	$this->load->view("dashboard/includes/template", $datapanel);
	// }

	// public function nuevo()
	// {
	// 	if(!empty($_POST)){
	// 		if (validacionForm($this->names, 'controller') === FALSE){
	// 			$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	// 		}else{
	// 			$data = $_POST;
	// 			$atributos = $data['atributos'];
	// 			unset($data['atributos']);
	// 			$saved = $this->Atributo->saveAtributo($data);
	// 			if($saved){
	// 				foreach ($atributos as $key => $value) {
	// 					$atributos[$key]['atributo_id'] = $saved;
	// 				}
	// 				$saved2 = $this->Atributo->saveDetalleAtributoMultiple($atributos);
	// 				if ($saved2) {
	// 					$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
	// 					header('Location: '.'lista');exit();
	// 				}else{
	// 					$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos.</div>');	
	// 				}
	// 			}else{
	// 			    $this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos.</div>');	
	// 			}
	// 			header('Location: '.'nuevo');
	// 		}
	// 	}
	// 	#body
	// 	$datapanel['body'] 		= 'atributos/nuevo';
	// 	#validaciones
	// 	$datapanel['required'] 	= validacionForm($this->names,'view');
	// 	$this->load->view("dashboard/includes/template", $datapanel);
	// }

	public function nuevoModal() {
		if(!empty($_POST)){
			$data = $_POST;
			$data['atributo_id']=2;
			if($this->Atributo->saveDetalleAtributoColor($data)){
				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Se guardo correctamente.</div>');
							header('Location: '.'lista', TRUE);
			}else{ 
				$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos.</div>');	
			};
		}
		$data['data']=array();
		$this->load->view("dashboard/sections/atributos/new_modal", $data);
	}

	// public function editar()
	// {	
	// 	$id = (int) $this->uri->segment(4,0);
	// 	if(! $id){ echo "no existe, ver lista"; exit();};
	// 	if ( ! empty($_POST) )
	// 	{
	// 		$data = $_POST;
	// 		unset($data['a_id']);
	// 		unset($data['a_nombre']);
	// 		unset($data['a_descripcion']);
	// 		unset($data['a_valor']);
	// 		unset($data['a_atributo_id']);
	// 		if (validacionForm($this->names, 'controller') == FALSE){
	// 			$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
	// 		}else{
	// 		   	#Grabacion de Datos
	// 			$updated = $this->Atributo->UpdateAtributo($id, $data);
	// 		    if($updated){
	// 				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
	// 				header('Location: '.'../editar/'.$id);
	// 			}else{
	// 	    		$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos.</div>');
	// 			}
	// 		}
	// 	}

	// 	$datapanel['body'] 		= 'atributos/editar';
	// 	$datapanel['dataset'] 	= $this->Atributo->getAtributoById($id);
	// 	$datapanel['detalle'] 	= $this->Atributo->getDetalleAtributo($id);
	// 	$datapanel['required'] 	= array();
	// 	$this->load->view("dashboard/includes/template", $datapanel);
	// }

	public function editarModal()
	{	
		$id_solo_color = (int) $this->uri->segment(4,0);
		$id_color = 2;
		if(! $id_color){ echo "no existe, ver lista"; exit();};

		if ( ! empty($_POST) )
		{
			$datos = $_POST;
			#Grabacion de Datos
			$updated = $this->Atributo->updateDetalleAtributo($id_solo_color ,$datos);
			if($updated){
				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
				header('Location: '.'../lista');
			}else{
		    	$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos.</div>');
			}
		}
		
		$data['data']=array();
		$data['data'] = $this->Atributo->getDetalleAtributoSoloColor($id_color,$id_solo_color);
		$this->load->view("dashboard/sections/atributos/edit_modal", $data);
	}

	public function delete(){
		if ($_POST) {
			$id = $_POST['param_id'];
			if(! $id){ echo "no existe, ver lista"; exit();};
	        $resultado = $this->Atributo->deleteAtributo($id);
	        $resultado2 = $this->Atributo->deleteDetallesAtributo($id);
	        if($resultado2) {
	            $result['titulo'] =  '¡Hecho!';
				$result['estado'] =  'success';
				$result['msj'] = 'Se elimino correctamente.';
	        }else {
	        	$result['titulo'] =  '¡Error!';
				$result['estado'] = 'error';
				$result['msj'] = 'Ha ocurridó un error, vuelve a intertarlo';
	        }
	        echo json_encode($result);
		}
	}

	public function ajaxDetalleAtributo()
	{
		if (!empty($_POST)) {
			$data = $_POST;
			$action = $data['action'];
			if ($action=='edit') {
				unset($data['action']);
				$id = $data['a_id'];
				$datos['nombre'] = $data['a_nombre'];
				$datos['descripcion'] = $data['a_descripcion'];
				$datos['valor'] = $data['a_valor'];
				if ($id == 'xx') {
					$datos['atributo_id'] = $data['a_atributo_id'];
					$grabar = $this->Atributo->saveDetalleAtributo($datos);
				} else {
					$grabar = $this->Atributo->updateDetalleAtributo($id ,$datos);
				}
				$json['a_id'] = $grabar;
				$json['action'] = $action;
				echo json_encode($json);
			}else if($action=='delete') {
				if ($data['a_id'] == 'xx') {
					echo json_encode($data);
				}else{
					$delete = $this->Atributo->deleteDetalleAtributo($data['a_id']);
					if ($delete) {
						echo json_encode($data);
					}
				}
			}
		} else {
			header('Location: '.'/');
		}
	}

	public function ajaxEstado()
	{
		if ($_POST) {
			$id = $_POST['param_id'];
			$estado = $_POST['param_estado'];
			$data = array('estado'=>$estado);
			$updated = $this->Atributo->updateAtributo($id, $data);
			$updated2 = $this->Atributo->updateDetallesAtributo($id, $data);
			if($updated2){
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