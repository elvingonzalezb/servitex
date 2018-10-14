<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuraciones extends CI_Controller {

	public $sizes = [
					'thumbs_x'      => 180,
					'thumbs_y'      => 81,
					'medium_x'      => 360,
					'medium_y'      => 240,
					'principal_x'   => 870,
					'principal_y'   => 400
				];

	public function __construct() {
		parent::__construct();
		$this->load->model('dashboard/model_configuraciones', 'Configuracion');
		$this->load->helper(array('form'));
		$this->load->library('My_upload');
		$this->load->library('My_aws');
		SessionUsuario();
	}

	public function index() {
		///$this->load->view('welcome_message');
	}
	
	public function lista() {
		$data = array();
		$datapanel['body'] 		= 'configuraciones/lista';
		$datapanel['dataset'] 	= $this->Configuracion->getConfiguraciones();
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editar() {
		$names = array('llave','descripcion');
		$data = array();
		$id_configuraciones = (int) $this->uri->segment(4,0);	
		if(! $id_configuraciones){ echo "no existe, ver lista"; exit();};		
		if(!empty($_POST)){
			// $this->cache->delete('dataConfig');
			if (validacionForm($names,'controller') == FALSE){
				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{
				
				$data = $_POST;
				$tipo = $this->Configuracion->getConfiguracion($id_configuraciones);

		        if(($tipo['tipo']==2)){
		        	$imgant = $data['imgant'];
					unset($data['imgant']);

					# Subida de Imagenes
					if ( ! empty($_FILES["valor"]['name'])) {	
						$file = $_FILES["valor"];

						# Subida de Imagenes
						#-------------------	
						$uploaded = uploadImg( $file , 'configuraciones', $this->sizes );
						# Fin Subida

						if( $uploaded['status'] == 200 ){
							$data['valor'] = $uploaded['principal'];
						}else{
							$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo subir la imagen, vuelva a intentarlo.</div>');
						}
					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong>  No existe la imagen.</div>');
					}
		        }
		   		if(($tipo['tipo']==3)){
		   			$json = json_decode($tipo['descripcion'],true);
		   			$json['descripcion'] = $data['descripcion'];
		   			$data['descripcion'] = json_encode($json);
		   		}
				$updated = $this->Configuracion->UpdateConfiguraciones($id_configuraciones, $data);

				if($updated){					
						$this->session->set_flashdata('success', '<strong>RESULTADO:</strong> Los datos se actualizaron correctamente.');
				}else{ echo "No se pudo subir archivo"; exit();};

				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');			
				# Fin Subida				
				header('Location: '.'../editar/'.$id_configuraciones);

			}
		}

		#validaciones
		$datapanel['requerid'] 	= validacionForm($names,'view');
		$datapanel['body'] 		= 'configuraciones/editar';
		$datapanel['dataset'] 	= $this->Configuracion->getConfiguracionesById( $id_configuraciones );
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$this->load->view("dashboard/includes/template", $datapanel);
	}
}

