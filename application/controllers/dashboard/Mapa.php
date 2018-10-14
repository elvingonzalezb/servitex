<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapa extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_mapa', 'Mapa');
        $this->load->helper(array('form'));
        SessionUsuario();
    }

	public function index()
	{
		///$this->load->view('welcome_message');
	}
	
	public function editar() {

		$id_sede = (int) $this->uri->segment(4,0);	
		if(! $id_sede){ echo "no existe, ver listtta"; exit();};		
		if(!empty($_POST)){
		
				$data = $_POST;
				$updated = $this->Mapa->UpdateMapa($id_sede, $data);
				if($updated){					
						$this->session->set_flashdata('success', '<strong>RESULTADO:</strong> Los datos se actualizaron correctamente.');
				}else{ echo "No se pudo subir archivo"; exit();};

				header('Location: '.'../editar/'.$id_sede);
			}
		
		$datapanel['body'] 		= 'mapa/editar';
		$datapanel['mapa'] 	= $this->Mapa->getSede( $id_sede );
		if( empty($datapanel['mapa'])){ echo "este item no existe"; exit();}
		$this->load->view("dashboard/includes/template", $datapanel);
	}

}

