<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {
	public $sizes = [
				            'thumbs_x'      => 100,
				            'thumbs_y'      => 100,
				            'medium_x'      => 350,
				            'medium_y'      => 437,
				            'principal_x'   => 600,
				            'principal_y'   => 720
				        ];
				        
	public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_categorias', 'Categoria');
        $this->load->model('dashboard/model_atributos', 'Atributo');

        $this->load->helper(array('form'));
        $this->load->library('form_validation');
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function lista($id_category = NULL) {
		//body
		$datapanel['body'] 		= 'categorias/lista';
		//data
		$id_category = (int) $this->uri->segment(4,0);
		if ($id_category == '0') {
			$id_category = 1;
		}
		$datapanel['dataset'] 	= $this->Categoria->getCategoryByType($id_category);
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editar() {
		$names = array('nombre','url','orden','seo_title|max_length[150]','seo_description|max_length[150]','seo_keywords|max_length[150]');
		$data = array();
		$id_category = (int) $this->uri->segment(4,0);
		if(! $id_category){ echo "no existe, ver lista"; exit();};

		if(!empty($_POST)){
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
				    $nombre = $file["name"];
				    $tipo = $file["type"];
				    $ruta_provisional = $file["tmp_name"];
				    $size = $file["size"];
				    $dimensiones = getimagesize($ruta_provisional);
				    $width = $dimensiones[0];
				    $height = $dimensiones[1];
				    $carpeta = "files/categoria/";
				    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
					    {
					      echo "Error, el archivo no es una imagen"; 
					    }else{
					    	$src = $carpeta.$nombre;
				    		$uploaded = move_uploaded_file($ruta_provisional, $src);
					    }
					if($uploaded){
						$data['imagen'] = $nombre;
						@unlink('./files/categoria/'.$imgant);
						};
				}
				# Fin Subida
				#--------------------
				$updated = $this->Categoria->Updatecategory($id_category, $data);
				if($updated){
					$this->session->set_flashdata('success', '<strong>RESULTADO:</strong> Los datos se actualizaron correctamente.');
				}
				//redirect('dashboards/category/edit/'.$id_category);
				header('Location: '.'../editar/'.$id_category);
			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($names,'view');
		#body
		$datapanel['body'] 		= 'categorias/editar';
		#data
		$dataCategoria = $this->Categoria->getCategoryById( $id_category );
		$dataCategoria['atributos'] = explode('#', $dataCategoria['atributos']);
		$datapanel['dataset'] 	= $dataCategoria;
		$datapanel['atributos'] = $this->Atributo->getAtributos();
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function nuevo() {
		$names = array('nombre','url','orden','NOTimagen','seo_title|max_length[150]','seo_description|max_length[150]','seo_keywords|max_length[150]');
		if(!empty($_POST)){
			if (validacionForm($names, 'controller') == FALSE){
				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{
				
				$data = $_POST;
				$data['atributos'] = implode('#',$data['atributos']);
				//echo '<pre>';print_r($data);echo '</pre>';die;
				unset($data['main']);
				#--------------------
				# Subida de Imagenes
				#
				if ( ! empty($_FILES["imagen"]['name']))
					{
				    $file = $_FILES["imagen"];
				    $nombre = $file["name"];
				    $tipo = $file["type"];
				    $ruta_provisional = $file["tmp_name"];
				    $size = $file["size"];
				    $dimensiones = getimagesize($ruta_provisional);
				    $width = $dimensiones[0];
				    $height = $dimensiones[1];
				    $carpeta = "files/categoria/";
				    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
					    {
					      echo "Error, el archivo no es una imagen"; 
					    }else{
					    	$src = $carpeta.$nombre;
				    		$uploaded = move_uploaded_file($ruta_provisional, $src);
					    }
					    if($uploaded){
					    	$data['imagen'] = $nombre;
					    	$data['tipo_categoria_id'] = _CAT_PRODUCTO;
					    	$saved = $this->Categoria->savecategory($data);
					    }else{ $this->session->set_flashdata('success', 'No se pudo subir la imagen');header('Location: '.'categorias/nuevo');}
					    if($saved){
							$this->session->set_flashdata('success', '<div class="alert alert-success">Los datos han sido grabados correctamente</div>');
						}
						//redirect('dashboards/category/edit/'.$id_category);
						header('Location: '.'lista');
				}
				# Fin Subida
				#--------------------
			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($names,'view');
		#body
		$datapanel['body'] 		= 'categorias/nuevo';
		#data
		$datapanel['dataset'] 	= $this->Categoria->getCategoryTreeForParentId();
		$datapanel['atributos'] = $this->Atributo->getAtributos();
		$this->load->view("dashboard/includes/template", $datapanel);

	}

	public function delete(){

		if ($_POST) {
			$id_category = $_POST['param_id'];
			if(! $id_category){ echo "no existe, ver lista"; exit();};
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
	        $eliminado = $this->Categoria->deletecategory($id_category);
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

