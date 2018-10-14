<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulos extends CI_Controller {

	public $sizes = [
				            'thumbs_x'      => 180,
				            'thumbs_y'      => 81,
				            'medium_x'      => 270,
				            'medium_y'      => 123,
				            'principal_x'   => 870,
				            'principal_y'   => 400
				    ];

	public $watermark = [
				            'text_mark' => '',
				            'img_mark'  => '',
				            'backgroud' => '',
				            'text_color'=> ''
				        ];			        

	public $names = array('nombre','url','orden','NOTdescripcion','destacado','autor','seo_title|max_length[150]','seo_description|max_length[150]','seo_keywords');		

	public $names_comentarios = array('nombre','correo','comentario','respuesta');		        
   
	public function __construct() {
		parent::__construct();
		$this->load->model('dashboard/Model_articulos', 'Articulo');
		$this->load->library('My_upload');
        $this->load->library('My_aws');
        SessionUsuario();
    }

	public function index(){
			///$this->load->view('welcome_message');
	}
	
	public function lista() {

		$data = array();
		$datapanel['body'] 		= 'articulos/lista';
		$datapanel['dataset'] 	= $this->Articulo->getArticulos();
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function listaComentarios() {

		$id = (int) $this->uri->segment(4,0);
		$datapanel['id_articulo']=$id;
		$datapanel['body'] 		= 'articulos/lista_comentarios';
		$datapanel['dataset'] 	= $this->Articulo->getComentariosByArticulo($id);
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function nuevo() {	
		
		if(!empty($_POST)){

			if (validacionForm($this->names, 'controller') == FALSE){

				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{
				$data = $_POST;
			
					if ( ! empty($_FILES["imagen"]['name']))
					{
					    $file = $_FILES["imagen"];

					    # Subida de Imagenes
						$uploaded = uploadImg( $file , 'articulos', $this->sizes );
						# Fin Subida
					
						    if( $uploaded['status'] == 200 ){
						    	
								$data['creado']=date('Y-m-j H:i:s');
						    	$saved = $this->Articulo->saveArticulos($data);
						    	
							    if($saved){

							    	$dataimage['imagen_title'] = $uploaded['titulo'];
				    			    $dataimage['imagen'] = $uploaded['principal'];
							    	$dataimage['articulo_id'] = $saved;
							    	$saved2 = $this->Articulo->saveImagenArticulos($dataimage);

								    if($saved2){

										$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
										header('Location: '.'lista', TRUE);

									}else{ echo "Se guardo los datos del articulo pero no la foto";};
						    	
						    	}else{
						    		$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos, vuelva a intentarlo.</div>');
								}
						    	
						    }else{
						    	$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo subir la imagen, vuelva a intentarlo.</div>');
							}

					}else{
					   	$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No existe la imagen.</div>');
					}
			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names,'view');

		#body
		$datapanel['body'] 		= 'articulos/nuevo';

		#data
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editar() {

		$id_articulo = (int) $this->uri->segment(4,0);

		if(! $id_articulo){ echo "no existe, ver lista"; exit();};

		if(!empty($_POST)){

			if (validacionForm($this->names,'controller') == FALSE){

					$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{
					$data = $_POST;
					$imgant = $data['imgant'];
					unset($data['imgant']);
					$image_id = $data['image_id'];
					unset($data['image_id']);

					if ( ! empty($_FILES["imagen"]['name'])){

						$file = $_FILES["imagen"];

						# Subida de Imagenes
						#-------------------	
						$uploaded = uploadImg( $file , 'articulos', $this->sizes );
						# Fin Subida

						if( $uploaded['status'] == 200 ){

									$dataimage['imagen_title'] = $uploaded['titulo'];
							    	$dataimage['imagen'] = $uploaded['principal'];
							
						}else{
									$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo subir la imagen, vuelva a intentarlo.</div>');
						}

					}else{
						   	$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong>  No existe la imagen.</div>');
					}

					$updated = $this->Articulo->UpdateArticulos($id_articulo, $data);
					if($updated){	

							$dataimage['articulo_id'] = $id_articulo;			
							$updImg = $this->Articulo->updateImagenArticulos( $image_id, $dataimage );
							
							if($updImg){
				
									$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
									header('Location: '.'../lista/'.$data['articulo_id'], TRUE);

							}else{ 
									echo "Se guardo los datos del articulo pero no la foto";
							}
									$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
									header('Location: '.'../editar/'.$id_articulo);	
								
					}else{ echo "No se pudo subir archivo"; exit();
					}
			}

		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names,'view');
		#body
		$datapanel['body'] 		= 'articulos/editar';
		#data
		$datapanel['dataset'] 	= $this->Articulo->getArticulosById( $id_articulo );
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editarComentarios() {

		$id_comentario = (int) $this->uri->segment(4,0);
		$id_articulo = (int) $this->uri->segment(5,0);

		if(! $id_comentario){ echo "no existe, ver lista"; exit();};

		if(!empty($_POST)){

			if (validacionForm($this->names_comentarios,'controller') == FALSE){

					$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{
					$data = $_POST;

					if ( ! empty($_FILES["imagen"]['name'])){

						$file = $_FILES["imagen"];

						# Subida de Imagenes
						#-------------------	
						$uploaded = uploadImg( $file , 'articulos', $this->sizes );
						# Fin Subida

						if( $uploaded['status'] == 200 ){

									$dataimage['imagen_title'] = $uploaded['titulo'];
							    	$dataimage['imagen'] = $uploaded['principal'];
							
						}else{
									$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo subir la imagen, vuelva a intentarlo.</div>');
						}

					}else{
						   	$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong>  No existe la imagen.</div>');
					}

					$updated = $this->Articulo->UpdateComentarios($id_comentario, $data);
					if($updated){	

								$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
									header('Location: '.'../editarComentarios/'.$id_comentario);	
								
					}else{ echo "No se pudo subir archivo"; exit();
					}
			}

		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names_comentarios,'view');
		#body
		$datapanel['body'] 		= 'articulos/editar_comentarios';
		#data
		$datapanel['id_articulo']=$id_articulo;
		$datapanel['dataset'] 	= $this->Articulo->getComentariosById( $id_comentario );
		if( empty($datapanel['dataset'])){ echo "este item no existezss"; exit();}
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function delete(){

		if ($_POST) {

			$id_articulos = $_POST['param_id'];
			$id_articulos = (int) $id_articulos;
			$id= $this->Articulo->getArticulosById( $id_articulos );
			if(empty($id)){ 
				echo "no existe, ver lista"; exit();
			};
			
	        $resultado = $this->Articulo->UpdateArticulos($id_articulos,array('estado'=>_ELIMINADO));
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

	public function deleteComentario(){

		if ($_POST) {
			$id_comentario = $_POST['param_id'];

			$id = $this->Articulo->getComentariosByArticulo( $id_comentario );
			if(empty($id)){ 
				echo "no existe, ver lista"; exit();
			};

        	$resultado = $this->Articulo->UpdateComentarios($id_comentario,array('estado'=>_ELIMINADO));
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

	#Ajax para el estado de la Articulos
	public function ajaxEstado(){

		$cat = (int) $this->uri->segment(4,0);
		if ($_POST) {

			$id = $_POST['param_id'];
			$estado = $_POST['param_estado'];
			$data = array('estado'=>$estado);
			if ($cat !=0) {
				$resultado = $this->Articulo->UpdateArticulos($id, $data);
			} else {	
				$resultado = $this->Articulo->UpdateComentarios($id, $data);
			}

			if($resultado){
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

