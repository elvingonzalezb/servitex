<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public $sizes = [
						'thumbs_x'      => 85,
						'thumbs_y'      => 100,
						'medium_x'      => 270,
						'medium_y'      => 347,
						'principal_x'   => 370,
						'principal_y'   => 450
					];

	public $watermark = [
				            'text_mark' => '',
				            'img_mark'  => '',
				            'backgroud' => '',
				            'text_color'=> ''
				        ];

    public $names = array('nombre','url','orden','seo_title|max_length[150]','seo_description|max_length[150]','seo_keywords|max_length[150]');

	public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_categorias', 'Categoria');
        $this->load->model('dashboard/model_atributos', 'Atributo');
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->library('My_upload');
        $this->load->library('My_aws');
        SessionUsuario();
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function lista() {
		//body
		$datapanel['body'] 		= 'categorias/lista';
		
		$id_category = $this->uri->segment(4,0);

		if ($id_category == '0') {
			$id_category = 1;
		}
		
		//data
		$datapanel['dataset'] 	= $this->Categoria->getCategoryByType($id_category);
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editar() {

		$data = array();

		$id_category = (int) $this->uri->segment(4,0);

		if(! $id_category){ echo "no existe, ver lista"; exit();};

		if(!empty($_POST)){
			//print_r($_POST);die;
			if (validacionForm($names,'controller') == FALSE){

				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');

			}else{

				$data = $_POST;
				$data['atributos'] = implode('#',$data['atributos']);
				$imgant = $data['imgant'];
				unset($data['imgant']);

				#--------------------
				# Subida de Imagenes
				#

				if ( ! empty($_FILES["imagen"]['name']))
				{

					$file = $_FILES["imagen"];

					# Subida de Imagenes
					#-------------------	
					$uploaded = uploadImg( $file , 'categorias', $this->sizes );
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

				# Fin Subida
				#--------------------
				$updated = $this->Categoria->Updatecategory($id_category, $data);

				if($updated){

					$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
					
				}else{
					 	echo "Se guardo los datos de la categoria pero no la foto";
				};
				//redirect('dashboards/category/edit/'.$id_category);
				header('Location: '.'../editar/'.$id_category);
			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names,'view');
		#body
		$datapanel['body'] 		= 'categorias/editar';
		#data
		$dataCategoria = $this->Categoria->getCategoryById( $id_category );
		$dataCategoria['atributos'] = explode('#', $dataCategoria['atributos']);
		$datapanel['dataset'] 	= $dataCategoria;
		$atributos = $this->Atributo->getAtributos();
		$options=array();
		for ($i=0; $i < count($atributos); $i++) { 
			$options[$atributos[$i]['id']] = $atributos[$i]['nombre'];
		}
		$datapanel['atributos'] = $options;
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function nuevo() {

		if(!empty($_POST)){

			if (validacionForm($this->names, 'controller') == FALSE){

				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');

			}else{
				
				$data = $_POST;
				$data['atributos'] = implode('#',$data['atributos']);
				unset($data['main']);
				#--------------------
				# Subida de Imagenes
				#
				if ( ! empty($_FILES["imagen"]['name']))
				{
					 $file = $_FILES["imagen"];

					# Subida de Imagenes
					$uploaded = uploadImg( $file , 'categorias', $this->sizes );
					# Fin Subida

					if( $uploaded['status'] == 200 ){

							$data['imagen_title'] = $uploaded['titulo'];
						   	$data['imagen'] = $uploaded['principal'];
					    	$data['tipo_categoria_id'] = _CAT_PRODUCTO;
					    	$saved = $this->Categoria->savecategory($data);

					    	if($saved){

									$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
									header('Location: '.'lista');

							}else{
						    		$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos, vuelva a intentarlo.</div>');
							}

					}else{ 
						    $this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo subir la imagen, vuelva a intentarlo.</div>');
					}
				 
				}else{
					   	$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No existe la imagen.</div>');
				}
				# Fin Subida
				#--------------------
			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names,'view');
		#body
		$datapanel['body'] 		= 'categorias/nuevo';
		#data
		$datapanel['dataset'] 	= $this->Categoria->getCategoryTreeForParentId();
		$atributos = $this->Atributo->getAtributos();
		$options=array();
		for ($i=0; $i < count($atributos); $i++) { 
			$options[$atributos[$i]['id']] = $atributos[$i]['nombre'];
		}
		$datapanel['atributos'] = $options;
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function delete(){

		if ($_POST) {
			$id_category = $_POST['param_id'];

			$id = $this->Categoria->getcategoryById( $id_category );
			if(empty($id)){ 
				echo "no existe, ver lista"; exit();
			};

			/*$id_productos = $this->Categoria->getProductos($id_category);
			$data = array();
			for ($i=0; $i < count($id_productos); $i++) { 
				$data[$i]['id'] = $id_productos[$i]['id'];
				$data[$i]['estado'] = _ELIMINADO;
			}
			$result = $this->Categoria->deleteProductos($data);

			foreach ($id_productos as $value) {
				$this->Producto->deleteImageProduct($value['id']);
			}*/

	        $banner = $this->Categoria->getcategoryById($id_category);
	        
	        $imagen= $banner['imagen'];
	        @unlink('files/categoria/'.$imagen);

	        $eliminado = $this->Categoria->deleteCategory($id_category);

	        if($eliminado){
		       	$result['titulo'] =  '¡Hecho!';
				$result['estado'] =  'success';
				$result['msj'] = 'Se elimino correctamente.';
			}else{
				$result['titulo'] =  '¡Error!';
				$result['estado'] = 'error';
				$result['msj'] = 'Ha ocurridó un error, vuelve a intertarlo';
			}
			echo json_encode($result);
		}else{
			header('Location: '.'lista');
		}
		
	}

	#Ajax para el estado de la categoria
	public function ajaxEstado(){
		if ($_POST) {
			$id = $_POST['param_id'];
			$estado = $_POST['param_estado'];
			$data = array('estado'=>$estado);
			$updated = $this->Categoria->UpdateCategory($id, $data);

			if($updated){
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

