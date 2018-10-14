<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeria_videos extends CI_Controller {
	public $sizes = [
				            'thumbs_x'      => 180,
				            'thumbs_y'      => 81,
				            'medium_x'      => 360,
				            'medium_y'      => 240,
				            'principal_x'   => 870,
				            'principal_y'   => 400
				    ];

	public $watermark = [
				            'text_mark' => 'http://www.graffixperu.com',
				            'img_mark'  => 'assets/frontend/img/agua.png',
				            'backgroud' => '#7FB401',
				            'text_color'=> '#000000'
				        ];

	public $names_video = array('album_id','link','nombre','NOTdescripcion','orden','destacado');

	public $names_album = array('nombre','url','NOTdescripcion','orden','destacado','seo_title|max_length[150]','seo_description|max_length[150]','seo_keywords');

	public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_galeria_videos', 'Galeria_videos');
        $this->load->library('My_upload');
        $this->load->library('My_aws');
        SessionUsuario();
    }

	public function index()
	{
		///$this->load->view('welcome_message');
	}
	
	public function lista_album() {
		$data = array();
		$datapanel['body'] 		= 'galeria_videos/lista_album';
		//data
		$datapanel['dataset'] 	= $this->Galeria_videos->getGaleriaAlbumesVideos();
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function lista_video() {
		$id = $this->uri->segment(4,0);
		$data = array();
		$datapanel['body'] 		= 'galeria_videos/lista_video';
		$datapanel['dataset'] 	= $this->Galeria_videos->getGaleriaVideos($id);
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
						$uploaded = uploadImg( $file , 'galeria_videos', $this->sizes );
						# Fin Subida

						if( $uploaded['status'] == 200 ){

							$data['video_title'] = $uploaded['titulo'];
						   	$data['video'] = $uploaded['principal'];
						   	$saved = $this->Galeria_videos->saveAlbumesVideos($data);

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
		$datapanel['requerid'] 	= validacionForm($this->names_album,'view');
		$datapanel['body'] 		= 'galeria_videos/nuevo_album';
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function nuevo_video() {

		$id_album=$this->uri->segment(4,0);

		if(!empty($_POST)){
			if (validacionForm($this->names_video, 'controller') == FALSE){

				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{
				
				$data = $_POST;
				
				if ( ! empty($data['link']))
				{
					$link= $data['link'];
					$codigo = explode('?v=', $link);
					$data['codigo_video']=$codigo[1];
					unset($data['link']);

					$data['video_title'] = $data['nombre'];
					$saved = $this->Galeria_videos->saveVideos($data);

				  	if($saved){
							$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
									header('Location: '.'lista_video/'.$data['album_id'], TRUE);
					} else { 
						    $this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos, vuelva a intentarlo.</div>');
					}
						
				} else {
					   		$this->session->set_flashdata('mensaje', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No existe el link de youtube.</div>');
				}
			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names_video,'view');
		#body
		$datapanel['body'] 		= 'galeria_videos/nuevo_video';
		$datapanel['id_album']=$id_album;
		#data
		$datapanel['albumes'] 	= $this->Galeria_videos->getGaleriaAlbumesVideos();
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editar_album() {
		
		$data = array();
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
				if ( ! empty($_FILES["imagen"]['name']))
				{	
				    $file = $_FILES["imagen"];

				    # Subida de Imagenes
					#-------------------	
					$uploaded = uploadImg( $file , 'galeria_videos', $this->sizes );
					# Fin Subida

					if( $uploaded['status'] == 200 ){	

						 	$data['video_title'] = $uploaded['titulo'];
						    $data['video'] = $uploaded['principal'];

					}else{
							 $this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo subir la imagen, vuelva a intentarlo.</div>');
					}
		
				} else { 
						$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong>  No existe la imagen.</div>');
				}

				$updated = $this->Galeria_videos->UpdateGaleriaAlbumesVideos($id_galeria_album, $data);

				if($updated){

					$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
					header('Location: '.'lista_album/'.$id_galeria_album, TRUE);

				} else { 
					echo "Se guardo los datos del video pero no el video";
				};

				$this->session->set_flashdata('success', '<strong>RESULTADO:</strong> Los datos se actualizaron correctamente.');
				header('Location: '.'../editar_album/'.$id_galeria_album);
			}
		}

		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names_album,'view');
		$datapanel['body'] 		= 'galeria_videos/editar_album';
		$datapanel['dataset'] 	= $this->Galeria_videos->getGaleriaAlbumesVideosById( $id_galeria_album );
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editar_video() {
		
		$data = array();
		$id_galeria_fotos = (int) $this->uri->segment(4,0);
		$id_album = (int) $this->uri->segment(5,0);
		if(! $id_galeria_fotos){ echo "no existe, ver lista"; exit();};

		if(!empty($_POST)){

			if (validacionForm($this->names_video, 'controller') == FALSE){

				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{

				$data = $_POST;
				
				if ( ! empty($data['link'])){

					$link= $data['link'];
					$codigo = explode('?v=', $link);
					$data['codigo_video']=$codigo[1];
					unset($data['link']);
					$data['video_title'] = $data['nombre'];
				}

				$updated = $this->Galeria_videos->UpdateGaleriaVideos($id_galeria_fotos, $data);
			
				if($updImg){
						$this->session->set_flashdata('success', '<strong>RESULTADO:</strong> Los datos se actualizaron correctamente.');
						header('Location: '.'lista_video/'.$id_galeria_fotos, TRUE);
				} else { 
						echo "Se guado los datos del video pero no el video";};
							$this->session->set_flashdata('success', '<strong>RESULTADO:</strong> Los datos se actualizaron correctamente.');					
				# Fin Subida
				header('Location: '.'../'.$id_galeria_fotos.'/'.$id_album);
			}
		}
		
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names_video,'view');
		#body
		$datapanel['body'] 		= 'galeria_videos/editar_video';
		#data
		$datapanel['dataset'] 	= $this->Galeria_videos->getGaleriaVideosById($id_galeria_fotos);	
		$datapanel['albumes_videos'] 	= $this->Galeria_videos->getGaleriaAlbumesVideos();
		$datapanel['id_album']=$id_album;
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$this->load->view("dashboard/includes/template", $datapanel);
	
	}
	public function delete_album(){

		if ($_POST) {	
			$id_galeria_album = $_POST['param_id'];	
			$id = $this->Galeria_videos->getGaleriaAlbumesVideosById( $id_galeria_album );

			if(empty($id)){ 
				echo "no existe, ver lista"; exit();
			};

	        $resultado = $this->Galeria_videos->UpdateGaleriaAlbumesVideos($id_galeria_album,array('estado'=>_ELIMINADO));
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

	public function delete_video(){

		if ($_POST) {
			$id_galeria_videos = $_POST['param_id'];
			$id = $this->Galeria_videos->getGaleriaVideosById( $id_galeria_videos );

			if(empty($id)){ 
				echo "no existe, ver lista"; exit();
			};	
	        $resultado = $this->Galeria_videos->UpdateGaleriaVideos( $id_galeria_videos,array('estado'=>_ELIMINADO) );

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
				$resultado = $this->Galeria_videos->UpdateGaleriaAlbumesVideos($id, $data);
			} else {	
				$resultado = $this->Galeria_videos->UpdateGaleriaVideos($id, $data);
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

