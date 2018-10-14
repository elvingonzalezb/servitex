<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeria_fotos extends CI_Controller {
	
	public $sizes = [
				            'thumbs_x'      => 150,
				            'thumbs_y'      => 112,
				            'medium_x'      => 400,
				            'medium_y'      => 299,
				            'principal_x'   => 870,
				            'principal_y'   => 650
				    ];

	public $al_sizes  = [
    						'thumbs_x'      => 400,
 							'thumbs_y'      => 75,
      						'medium_x'      => 800,
      						'medium_y'      => 160,
	 						'principal_x'   => 1600,
	 						'principal_y'   => 300
				    ];

	public $watermark = [
				            'text_mark' => '',
				            'img_mark'  => '',
				            'backgroud' => '',
				            'text_color'=> ''
				        ];

	public $names_foto = array('album_id','nombre','NOTdescripcion','orden');
	public $names_album = array('nombre','NOTdescripcion');

	public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_galeria_fotos', 'Galeria_fotos');
        $this->load->library('My_upload');
        $this->load->library('My_aws');
        SessionUsuario();
    }

	public function index()
	{
		///$this->load->view('welcome_message');
	}
	
	public function lista_album() {
		$datapanel['body'] 		= 'galeria_fotos/lista_album';
		$datapanel['dataset'] 	= $this->Galeria_fotos->getGaleriaAlbumesFotos();
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function lista_foto() {
		$id=$this->uri->segment(4,0);
		$datapanel['body'] 		= 'galeria_fotos/lista_foto';
		$datapanel['dataset'] 	= $this->Galeria_fotos->getGaleriaFotos($id);
		$datapanel['id_album']=$id; 
		$this->load->view("dashboard/includes/template", $datapanel);
	}
	
	public function nuevo_album() {

		if(!empty($_POST)){

			if (validacionForm($this->names_album, 'controller') == FALSE){
				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');

			}else{

				$data = $_POST;

				# Subida de Imagenes
				if ( ! empty($_FILES["imagen"]['name']))
				{		
					$file = $_FILES["imagen"];

					# Subida de Imagenes
					$uploaded = uploadImg( $file , 'galeria_fotos', $this->sizes );
					# Fin Subida

					if( $uploaded['status'] == 200 ){

						$data['imagen_title'] = $uploaded['titulo'];
					   	$data['imagen'] = $uploaded['principal'];
					   	$saved = $this->Galeria_fotos->saveAlbumesFotos($data);

						if($saved){
							$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se grabaron correctamente.</div>');
							header('Location: '.'lista_album', TRUE);
						}else{ 
							$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos, vuelva a intentarlo.</div>');
						};

					}else{ 
							    $this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo subir la imagen, vuelva a intentarlo.</div>');
					}
					 
				}else{
					   	$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No existe la imagen.</div>');
				}
			}
		}		
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names_album,'view');
		#body
		$datapanel['body'] 		= 'galeria_fotos/nuevo_album';
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function nueva_foto() {		

		$id_album=$this->uri->segment(4,0);

		if(!empty($_POST)){

			if (validacionForm($this->names_foto, 'controller') == FALSE){

				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');

			}else{
				
				$data = $_POST;
				
				# Subida de Imagenes
				if ( ! empty($_FILES["imagen"]['name']))
				{
					$file = $_FILES["imagen"];
					    
					# Subida de Imagenes
					$uploaded = uploadImg( $file , 'galeria_fotos', $this->sizes );
					# Fin Subida

					if( $uploaded['status'] == 200 ){
							
						$data['imagen_title'] = $uploaded['titulo'];
					   	$data['imagen'] = $uploaded['principal'];
					   	$saved = $this->Galeria_fotos->saveFotos($data);

					   	if($saved){
							
							$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
									header('Location: '.'lista_foto/'.$data['album_id'], TRUE);
						}else{ 

						    $this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos, vuelva a intentarlo.</div>');
						 };


					}else{ 
							    $this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo subir la imagen, vuelva a intentarlo.</div>');
					}
						  
				}else{
					   		$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No existe la imagen.</div>');
				}

			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names_foto,'view');
		#body
		$datapanel['body'] 		= 'galeria_fotos/nueva_foto';

		$datapanel['id_album']=$id_album;
		#data
		$datapanel['albumes'] 	= $this->Galeria_fotos->getGaleriaAlbumesFotos();
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editar_album() {

		$id_galeria_album = (int) $this->uri->segment(4,0);

		if(! $id_galeria_album){ echo "no existe, ver lista"; exit();};

		if(!empty($_POST)){

			if (validacionForm($this->names_album, 'controller') == FALSE){

				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');

			}else{

				$data = $_POST;
				$imgant = $data['imgant'];
				unset($data['imgant']);

				# Subida de Imagenes
				if ( ! empty($_FILES["imagen"]['name'])){	

				    $file = $_FILES["imagen"];

				    # Subida de Imagenes
					#-------------------	
					$uploaded = uploadImg( $file , 'galeria_fotos', $this->sizes );
					# Fin Subida

				    if( $uploaded['status'] == 200 ){	

						 	$data['imagen_title'] = $uploaded['titulo'];
						    $data['imagen'] = $uploaded['principal'];

					}else{
							 $this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo subir la imagen, vuelva a intentarlo.</div>');
					}

				}else{
						$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong>  No existe la imagen.</div>');
				}
				
				$updated = $this->Galeria_fotos->UpdateGaleriaAlbumesFotos($id_galeria_album, $data);	
				
				if($updated){

					$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
							
				}else{ 
					$this->session->set_flashdata('message', '<div class="alert alert-danger"><strong>RESULTADO:</strong> No se guardo los datos.</div>');
				};
				# Fin Subida
				header('Location: '.'../editar_album/'.$id_galeria_album);
			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names_album,'view');
		#body
		$datapanel['body'] 		= 'galeria_fotos/editar_album';
		#data
		$datapanel['dataset'] 	= $this->Galeria_fotos->getGaleriaAlbumesFotosById( $id_galeria_album );
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$this->load->view("dashboard/includes/template", $datapanel);
	
	}
	
	public function editar_foto() {
		
		$id_galeria_fotos = (int) $this->uri->segment(4,0);
		$id_album = (int) $this->uri->segment(5,0);
		if(! $id_galeria_fotos){ echo "no existe, ver lista"; exit();};
		if(!empty($_POST)){
			if (validacionForm($this->names_foto, 'controller') == FALSE){
				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{
				$data = $_POST;
				$imgant = $data['imgant'];
				unset($data['imgant']);

				# Subida de Imagenes
				if ( ! empty($_FILES["imagen"]['name']))
				{	
					$file = $_FILES["imagen"];

				    # Subida de Imagenes
					#-------------------	
					$uploaded = uploadImg( $file , 'galeria_fotos', $this->sizes );
					# Fin Subida

					if( $uploaded['status'] == 200 ){	

						 	$data['imagen_title'] = $uploaded['titulo'];
						    $data['imagen'] = $uploaded['principal'];

					}else{
							 $this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo subir la imagen, vuelva a intentarlo.</div>');
					}

				}else{
						$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong>  No existe la imagen.</div>');
				}

				$updated = $this->Galeria_fotos->UpdateGaleriaFotos($id_galeria_fotos, $data);
				
				if($updated){
					$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
					header('Location: '.'lista_foto/'.$id_galeria_fotos, TRUE);

				}else{ $this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Se guardo los datos de la galeria pero no la foto.</div>');
					header('Location: '.'lista_foto/'.$id_galeria_fotos, TRUE); echo "";};			
				# Fin Subida				
				header('Location: '.'../'.$id_galeria_fotos.'/'.$id_album);
			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names_foto,'view');
		#body
		$datapanel['body'] 		= 'galeria_fotos/editar_foto';
		#data
		$datapanel['dataset'] 	= $this->Galeria_fotos->getGaleriaFotosById($id_galeria_fotos);	
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$datapanel['albumes_fotos'] 	= $this->Galeria_fotos->getGaleriaAlbumesFotos();
		$datapanel['id_album'] = $id_album;
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function delete_foto(){

		if ($_POST) {
			$id_galeria_fotos = $_POST['param_id'];

			$id = $this->Galeria_fotos->getGaleriaFotosById( $id_galeria_fotos );
			if(empty($id)){ 
				echo "no existe, ver lista"; exit();
			};

        	$resultado = $this->Galeria_fotos->UpdateGaleriaFotos($id_galeria_fotos,array('estado'=>_ELIMINADO));
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

	public function delete_album(){

		if ($_POST) {

			$id_galeria_album = $_POST['param_id'];

			$id = $this->Galeria_fotos->getGaleriaAlbumesFotosById( $id_galeria_album );
			if(empty($id)){ 
				echo "no existe, ver lista"; exit();
			};

			$resultado = $this->Galeria_fotos->UpdateGaleriaAlbumesFotos($id_galeria_album,array('estado'=>_ELIMINADO));
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

	public function ajaxEstado(){

		$cat = (int) $this->uri->segment(4,0);
		if ($_POST) {

			$id = $_POST['param_id'];
			$estado = $_POST['param_estado'];
			$data = array('estado'=>$estado);

			if ($cat !=0) {
				$resultado = $this->Galeria_fotos->UpdateGaleriaAlbumesFotos($id, $data);
			} else {	
				$resultado = $this->Galeria_fotos->UpdateGaleriaFotos($id, $data);
			}
	
			if($resultado){
				$result['estado'] =  ($estado == _ACTIVO)? _ACTIVO : _INACTIVO;
				$result['msj'] = 'El estado se ha actualizado';
			} else {
				$result['estado'] = ($estado == _ACTIVO)? _INACTIVO : _ACTIVO;
				$result['msj'] = 'Ha ocurrido un error, vuelve a intertarlo';
			}
			
			echo json_encode($result);
		} 
		
	}

}

