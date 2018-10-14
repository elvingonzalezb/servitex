<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos extends CI_Controller {
	
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

	public $names_proyecto = array('nombre','url','orden','destacado','seo_title|max_length[150]','seo_description|max_length[150]','seo_keywords');
	public $names_trabajo = array('proyecto_id','nombre','orden','destacado');
	public $names_foto = array('galeria_proyecto_id','nombre','orden');

	public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_proyectos', 'Galeria_proyectos');
        $this->load->library('My_upload');
        $this->load->library('My_aws');
        SessionUsuario();
    }

	public function index()
	{
		///$this->load->view('welcome_message');
	}
	
	public function listaProyecto() {

		$datapanel['body'] 		= 'proyectos/lista_proyecto';
		$datapanel['dataset'] 	= $this->Galeria_proyectos->getProyectos();
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function listaTrabajo() {

		$id = (int) $this->uri->segment(4,0);
		$datapanel['body'] 		= 'proyectos/lista_trabajo';
		$datapanel['dataset'] 	= $this->Galeria_proyectos->getGaleriasProyecto($id);
		$datapanel['id_proyecto']=$id;
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function listaFoto() {

		$id = (int) $this->uri->segment(4,0);
		$id_proyecto = (int) $this->uri->segment(5,0);
		$datapanel['body'] 		= 'proyectos/lista_foto';
		$datapanel['dataset'] 	= $this->Galeria_proyectos->getFotosProyecto($id);
		$datapanel['id_trabajo'] = $id;
		$datapanel['id_proyecto'] = $id_proyecto;
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function nuevoProyecto() {
		
		if(!empty($_POST)){

			if (validacionForm($this->names_proyecto, 'controller') == FALSE){

				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{
				$data = $_POST;

				# Subida de Imagenes
				if ( ! empty($_FILES["imagen"]['name']))
				{		
					$file = $_FILES["imagen"];

					# Subida de Imagenes
					$uploaded = uploadImg( $file , 'proyectos', $this->sizes );
					# Fin Subida

					if( $uploaded['status'] == 200 ){

						$data['imagen_title'] = $uploaded['titulo'];
					   	$data['imagen'] = $uploaded['principal'];
					   	$data['creado']=date('Y-m-j H:i:s');
					   	$saved = $this->Galeria_proyectos->saveProyectos($data);

						if($saved){
							$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se grabaron correctamente.</div>');
							header('Location: '.'listaProyecto', TRUE);
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
		$datapanel['requerid'] 	= validacionForm($this->names_proyecto,'view');
		#body
		$datapanel['body'] 		= 'proyectos/nuevo_proyecto';
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function nuevoTrabajo() {	

		$id_proyecto=$this->uri->segment(4,0);
		if(!empty($_POST)){

			if (validacionForm($this->names_trabajo, 'controller') == FALSE){

				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{
				$data = $_POST;

					# Subida de Imagenes
					if ( ! empty($_FILES["imagen"]['name']))
					{
					    $file = $_FILES["imagen"];
					    
					    # Subida de Imagenes
						$uploaded = uploadImg( $file , 'proyectos', $this->sizes );
						# Fin Subida

						if( $uploaded['status'] == 200 ){
							
							$data['imagen_title'] = $uploaded['titulo'];
						   	$data['imagen'] = $uploaded['principal'];
						   	$saved = $this->Galeria_proyectos->saveTrabajo($data);

						   	if($saved){
									$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
									header('Location: '.'listaTrabajo/'.$data['proyecto_id'], TRUE);
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
		$datapanel['requerid'] 	= validacionForm($this->names_trabajo,'view');
		#body
		$datapanel['body'] 		= 'proyectos/nuevo_trabajo';

		$datapanel['id_proyecto']=$id_proyecto;
		#data
		$datapanel['proyectos'] 	= $this->Galeria_proyectos->getProyectos();
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function nuevaFoto() {	
		$id_trabajo=$this->uri->segment(4,0);
		$id_proyecto=$this->uri->segment(5,0);
		if(!empty($_POST)){

			if (validacionForm($this->names_foto, 'controller') == FALSE){

				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{

				$data = $_POST;

				unset($data['proyecto_id']);
					# Subida de Imagenes
					if ( ! empty($_FILES["imagen"]['name']))
					{
					    $file = $_FILES["imagen"];
					    
					    # Subida de Imagenes
						$uploaded = uploadImg( $file , 'proyectos', $this->sizes );
						# Fin Subida

						if( $uploaded['status'] == 200 ){
							
							$data['imagen_title'] = $uploaded['titulo'];
						   	$data['imagen'] = $uploaded['principal'];
						   	$saved = $this->Galeria_proyectos->saveFoto($data);

						   	if($saved){
									$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
									header('Location: '.'listaFoto/'.$data['galeria_proyecto_id'], TRUE);
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
		$datapanel['body'] 		= 'proyectos/nueva_foto';
		$datapanel['id_trabajo'] = $id_trabajo;
		$datapanel['id_proyecto'] = $id_proyecto;
		#data
		$datapanel['proyectos'] 	= $this->Galeria_proyectos->getProyectos();
		// #data
		// $datapanel['trabajos'] 	= $this->Galeria_proyectos->getGaleriasFoto();
		
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editarProyecto() {

		$id_proyecto = (int) $this->uri->segment(4,0);

		if(! $id_proyecto){ echo "no existe, ver lista"; exit();};

		if(!empty($_POST)){

			if (validacionForm($this->names_proyecto, 'controller') == FALSE){

				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{
				// var_dump('entro3');exit();
				$data = $_POST;
				$imgant = $data['imgant'];
				unset($data['imgant']);

				# Subida de Imagenes
				if ( ! empty($_FILES["imagen"]['name'])){	

				    $file = $_FILES["imagen"];

				    # Subida de Imagenes
					#-------------------	
					$uploaded = uploadImg( $file , 'proyectos', $this->sizes );
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
				
				$updated = $this->Galeria_proyectos->UpdateProyectos($id_proyecto, $data);	
				
				if($updated){

							$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
							header('Location: '.'listaProyecto/'.$id_proyecto, TRUE);
				}else{ 
						echo "Se guardo los datos del proyecto pero no la foto";
				};

				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
				# Fin Subida
				header('Location: '.'../editarProyecto/'.$id_proyecto);
			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names_proyecto,'view');
		#body
		$datapanel['body'] 		= 'proyectos/editar_proyecto';
		#data
		$datapanel['dataset'] 	= $this->Galeria_proyectos->getProyectosById( $id_proyecto );
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$this->load->view("dashboard/includes/template", $datapanel);
	
	}
	public function editarTrabajo() {

		$id_galeria_proyecto = (int) $this->uri->segment(4,0);
		$id_proyecto = (int) $this->uri->segment(5,0);
		if(! $id_galeria_proyecto){ echo "no existe, ver lista"; exit();};

		if(!empty($_POST)){

			if (validacionForm($this->names_trabajo, 'controller') == FALSE){

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
					$uploaded = uploadImg( $file , 'proyectos', $this->sizes );
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

				$updated = $this->Galeria_proyectos->UpdateGaleriaProyectos($id_galeria_proyecto, $data);
				
				if($updated){
					$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
					header('Location: '.'listaTrabajo/'.$id_galeria_proyecto, TRUE);

				}else{ echo "Se guardo los datos de la galeria pero no la foto";};

				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');			
				# Fin Subida				
				header('Location: '.'../'.$id_galeria_proyecto.'/'.$id_proyecto);
			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names_trabajo,'view');
		#body
		$datapanel['body'] 		= 'proyectos/editar_trabajo';
		#data
		$datapanel['dataset'] 	= $this->Galeria_proyectos->getTrabajoById($id_galeria_proyecto);
		$datapanel['id_proyecto']=$id_proyecto;
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$datapanel['trabajo'] 	= $this->Galeria_proyectos->getProyectos();
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editarFoto() {
		$id_foto_proyecto = (int) $this->uri->segment(4,0);
		$id_trabajo = (int) $this->uri->segment(5,0);
		if(! $id_foto_proyecto){ echo "no existe, ver lista"; exit();};

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
					$uploaded = uploadImg( $file , 'proyectos', $this->sizes );
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

				$updated = $this->Galeria_proyectos->UpdateFotosProyecto($id_foto_proyecto, $data);
				
				if($updated){
					$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
					header('Location: '.'listaFoto/'.$id_foto_proyecto, TRUE);

				}else{ echo "Se guardo los datos de la galeria pero no la foto";};

				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');			
				# Fin Subida				
				header('Location: '.'../'.$id_foto_proyecto.'/'.$id_trabajo);
			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names_foto,'view');
		#body
		$datapanel['body'] 		= 'proyectos/editar_foto';
		#data
		$datapanel['dataset'] 	= $this->Galeria_proyectos->getFotoById($id_foto_proyecto);	
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$id_galeria_proyecto=$datapanel['dataset']['id'];
		$datapanel['foto'] 	= $this->Galeria_proyectos->getGaleriasFoto($id_foto_proyecto);
		$datapanel['id_trabajo']=$id_trabajo;
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function deleteProyecto(){
		if ($_POST) {

			$id_proyecto = $_POST['param_id'];

			$id = $this->Galeria_proyectos->getProyectosById( $id_proyecto );
			if(empty($id)){ 
				echo "no existe, ver lista"; exit();
			};

			$resultado = $this->Galeria_proyectos->UpdateProyectos($id_proyecto,array('estado'=>_ELIMINADO));
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

	public function deleteTrabajo(){
		// var_dump('en mantenimiento');exit();
		if ($_POST) {
			$id_galeria_proyecto = $_POST['param_id'];

			$id = $this->Galeria_proyectos->getTrabajoById( $id_galeria_proyecto );
			if(empty($id)){ 
				echo "no existe, ver lista"; exit();
			};

        	$resultado = $this->Galeria_proyectos->UpdateGaleriaProyectos($id_galeria_proyecto,array('estado'=>_ELIMINADO));
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

	public function deleteFoto(){
		// var_dump('en mantenimiento');exit();
		if ($_POST) {
			$id_foto_proyecto = $_POST['param_id'];
			$id = $this->Galeria_proyectos->getFotoById( $id_foto_proyecto );
			if(empty($id)){ 
				echo "no existe, ver lista"; exit();
			};

        	$resultado = $this->Galeria_proyectos->UpdateFotosProyecto($id_foto_proyecto,array('estado'=>_ELIMINADO));
			// var_dump($resultado);exit();

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
		
		$id_proyecto = (int) $this->uri->segment(4,0);
		// var_dump($id_proyecto);exit();
		if ($_POST) {

			$id = $_POST['param_id'];
			$estado = $_POST['param_estado'];
			$data = array('estado'=>$estado);

			if ($id_proyecto==1) {
				$resultado = $this->Galeria_proyectos->UpdateProyectos($id, $data);
			} elseif ($id_proyecto==2) {	
				$resultado = $this->Galeria_proyectos->UpdateGaleriaProyectos($id, $data);
			} else{
				$resultado = $this->Galeria_proyectos->UpdateFotosProyecto($id, $data);
			}
			//falta su  UpdateFotosProyecto
	
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

	public function actualizarTrabajo(){

		if ($_POST) {

			$id_proyecto = $_POST['proyecto_id'];
			#data
			$datapanel['trabajos'] 	= $this->Galeria_proyectos->getGaleriasProyecto($id_proyecto);
	        if($datapanel['trabajos']){

	        	$html='';
	        	foreach ($datapanel['trabajos'] as $key => $value) {
	        		$html.="<option value='".$value['id']."'>".$value['nombre']."</option>";
	        	}

	        	$result['datos']= $html;
				$result['msj'] = 'El trabajo se ha actualizado segun el proyecto';
			} else {

				$result['msj'] = 'Ha ocurrido un error, vuelve a intertarlo';
			}
	        echo json_encode($result);
		}
	
		
	}


}

