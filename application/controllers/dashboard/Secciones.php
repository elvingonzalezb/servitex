<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secciones extends CI_Controller {
	// public $sizes = [
	// 			            'thumbs_x'      => 150,
	// 			            'thumbs_y'      => 30,
	// 			            'medium_x'      => 600,
	// 			            'medium_y'      => 120,
	// 			            // 'principal_x'   => 600,
	// 			            // 'principal_y'   => 720
	// 			            'principal_x'   => 1920,
	// 			            'principal_y'   => 350
	// 			        ];
	public $sizes = [
				            'thumbs_x'      => 150,
				            'thumbs_y'      => 30,
				            'medium_x'      => 600,
				            'medium_y'      => 120,
				            // 'principal_x'   => 600,
				            // 'principal_y'   => 720
				            'principal_x'   => 1920,
				            // 'principal_y'   => 275
				            'principal_y'   => 200
				        ];
	public $names = array('titulo','descripcion','NOTorden','NOTimagen','seo_title','seo_description','seo_keywords');
	// public $inputs = array(
	// 	'imagen',
	// 	'nombre',
	// 	'descripcion',
	// 	'seo_title',
	// 	'seo_description',
	// 	'seo_keywords'
	// 	);

	public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_secciones', 'Seccion');
        $this->load->library('My_upload');
        $this->load->library('My_aws');
        $this->load->helper(array('form'));
        SessionUsuario();
    }

	public function index()
	{
	}

	public function lista() {

		//body
		$datapanel['body'] 		= 'secciones/lista';

		//data
		$datapanel['dataset'] 	= $this->Seccion->getSections();
		$this->load->view("dashboard/includes/template", $datapanel);
	}
	public function nuevo() {

		#body
		$datapanel['body'] 		= 'secciones/nuevo';
		#data
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editar() {
		$data = array();
		$id_sections = (int) $this->uri->segment(4,0);
		if(! $id_sections){ echo "no existe, ver lista"; exit();};

			if (!empty($_POST)) {

				$data = $_POST;
				$imgant = $data['imgant'];
				unset($data['imgant']);

				if ( validacionForm($this->names, 'controller') === FALSE){
					$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
				}else{

						if( ! empty($_FILES["imagen"]['name'])){
							$file = $_FILES['imagen'];
							#-------------------				
							# Subida de Imagenes
							#-------------------	
							$uploaded = uploadImg( $file , 'secciones', $this->sizes );
							# Fin Subida
						    if( $uploaded['status'] == 200 ){
								$data['imagen_title'] = $uploaded['titulo'];
						    	$data['imagen'] = $uploaded['principal'];
							}
						}

						$updated = $this->Seccion->UpdateSections($id_sections, $data);
						if($updated){
							$this->session->set_flashdata('success', '<strong>RESULTADO:</strong> Los datos se actualizaron correctamente.');
						}
						//redirect('dashboards/sections/edit/'.$id_sections);
						header('Location: '.'../editar/'.$id_sections);
					}
			}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names,'view');

		#body
		$datapanel['body'] 		= 'secciones/editar';
		#data
		$datapanel['dataset'] 	= $this->Seccion->getSectionsById( $id_sections );
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}

		$this->load->view("dashboard/includes/template", $datapanel);
	}


	public function save() {
		$data = $_POST;
		#--------------------
		# Subida de Imagenes
		#
		if ( ! empty($_FILES["image"]['name']))
		{
		    $file = $_FILES["image"];
		    $nombre = $file["name"];
		    $tipo = $file["type"];
		    $ruta_provisional = $file["tmp_name"];
		    $size = $file["size"];
		    $dimensiones = getimagesize($ruta_provisional);
		    $width = $dimensiones[0];
		    $height = $dimensiones[1];
		    $carpeta = "files/secciones/";
		    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
			    {
			      echo "Error, el archivo no es una imagen"; 
			    }else{
			    	$src = $carpeta.$nombre;
		    		$uploaded = move_uploaded_file($ruta_provisional, $src);
			    }
			    if($uploaded){
			    	$data['imagen'] = $nombre;
			    	
			    }else{ echo "No se pudo subir archivo";}
		}
		# Fin Subida
		#--------------------
	    $saved = $this->Seccion->saveSections($data);
	    if($saved){
			$this->session->set_flashdata('success', '<strong>RESULTADO:</strong> Los datos se actualizaron correctamente.');
		}
		header('Location: '.'lista');
		//redirect('dashboards/secciones/edit/'.$id_sections);

	}

	public function delete(){
		$id_sections = $this->uri->segment(4,0);
		if(! $id_sections){ echo "no existe, ver lista"; exit();};

        $sections = $this->Seccion->getSectionsById($id_sections);
        $imagen= $sections['imagen'];
        @unlink('files/secciones/'.$imagen);
        $resultado = $this->Seccion->deleteSections($id_sections);
        if($resultado) {
            $this->session->set_flashdata('success', '<strong>RESULTADO:</strong> Se elimino correctamente.');
        }
        else {
            $this->session->set_flashdata('error', 'Se ha producido un error al intentar eliminar.');
        }
        //redirect('mainpanel/secciones/listado');
        header('Location: '.'../lista');

	}

}

