<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atributos extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('dashboard/model_atributos', 'Atributo');
	}

	public function index()
	{
		///$this->load->view('welcome_message');
	}

	public function getAjaxAtributos(){
		if ($_POST && !empty($_POST)) {
			$data['atributos'] = $this->Atributo->getCategAtrib($_POST['id_atributos']);
			$this->load->view("dashboard/sections/atributos/getAjaxAtributos", $data);
		}
	}
	
	public function agrega_precio_lista() {
		$atributos = implode(",", array_filter($_POST['atributos']));
		print_r($_POST['atributos_id']);die;
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
		$envio = $atributos.'|'.replace(".", ":")$atributos_id.'|'.$precio.'|'.$precio_oferta.'|'.$se_agrego.'|'.$stock.'|'.$final;
		$json['dato'] = $envio;
		echo json_encode($json);
	}

	public function quitar_precio_lista() {
		$atributos_id = $_POST['atributos_id'];
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

		$json['dato'] = $atributos_id.'|'.implode("│",$aux2);
		echo json_encode($json);
	}
}