<?php
defined('BASEPATH') OR exit('No direct script access allowed');
					
class Productos extends CI_Controller {

	public $sizes = [
				            'thumbs_x'      => 100,
				            'thumbs_y'      => 100,
				            'medium_x'      => 350,
				            'medium_y'      => 437,
				            'principal_x'   => 600,
				            'principal_y'   => 720
				        ];
	public $watermark = [
				            'text_mark' => 'http://www.graffixperu.com',
				            'img_mark'  => 'assets/frontend/img/agua.png',
				            'backgroud' => '#7FB401',
				            'text_color'=> '#000000'
				        ];
	public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_productos', 'Producto');
        $this->load->model('dashboard/model_categorias', 'Categoria');
        $this->load->model('dashboard/model_galeria_productos', 'Galeria');
        //$this->load->library('my_fileuploader.php');
        $this->load->library('My_aws.php');
        $this->load->library('My_upload.php');
        $this->load->library('session'); 
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function lista() {
		
		$id = (int) $this->uri->segment(4,0);

		//body
		$datapanel['body'] 		= 'productos/lista';

		//data
		$datapanel['dataset'] 	= $this->Producto->getProductByCategory($id);
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editar() {


		$data = array();
		$id = (int) $this->uri->segment(4,0);
		$validaciones = array('categoria_id[]','nombre','url','orden','seo_title','seo_description','seo_keywords');

		if(!empty($_POST)){
			if(! $id){ echo "no existe, ver lista"; exit();};
			
			if (validacionForm($validaciones,'controller') == FALSE){
				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
				
			}else{

				#--------------------
				# Subida de Imagenes
				if( ! empty($_FILES['files']['name']) &&  (count($_FILES['files']['name']))>0){
					$files = $_FILES['files'];					
				    #-- Se enivia el array de archivos multiples  //desarrollado solo para el plugin multiple--#
					$imagenes  = ( ! empty($files['name']) ? uploadImgMultiple( $files, 'productos', $this->sizes, $this->watermark ) : '');
				}else{
					echo "implementar validacion no existe archivo"; exit();
				}

				// if uploaded and success
				if(isset($imagenes['status']) && $imagenes['status'] == '200' && count($imagenes['data']) > 0) {
					// get uploaded files
					$uploadedFiles = $imagenes['data'];
				}
				if(isset($imagenes['status']) && $imagenes['status'] == '400'){
					//echo '<pre>';print_r($warnings);echo '</pre>';exit;
					$this->session->set_flashdata('
						', '<div class="alert alert-warning"><strong>RESULTADO:</strong>'.$imagenes['error'].'</div>');
					header('Location: '.'editar/'.$id, TRUE);
				}

				// if warnings
				/*if($imagenes['hasWarnings']) {
					// get warnings
					$warnings = $imagenes['warnings'];
					//echo '<pre>';print_r($warnings);echo '</pre>';exit;
					$this->session->set_flashdata('success', '<div class="alert alert-warning"><strong>RESULTADO:</strong>'.$warnings.'</div>');
					header('Location: '.'editar/'.$id, TRUE);
				}*/

				# Fin Subida
				#--------------------
				$data = $_POST;
				if (count($data['categoria_id'])<1) {
					$this->session->set_flashdata('success', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos del producto</div>');
					header('Location: '.'editar/'.$id, TRUE);
				} 
				
				$categorias_id = $data['categoria_id'];
				
				unset($data['categoria_id']);
				unset($data['fileuploader-list-files']);
				$updated = $this->Producto->updateProduct($id, $data);
				if($updated){
					if (isset($uploadedFiles)) {
						$array_imagenes = array();
						for ($i=0; $i < count($uploadedFiles); $i++) {
							$array_imagenes[$i]['imagen_title'] = $uploadedFiles[$i]['titulo'];
							$array_imagenes[$i]['imagen'] = $uploadedFiles[$i]['principal'];
							$array_imagenes[$i]['ruta_amazon'] = ($uploadedFiles[$i]['amazon_path']['principal']['file'])? $uploadedFiles[$i]['amazon_path']['principal']['file']:'';
							$array_imagenes[$i]['producto_id'] = $id;
						}
						$updImg = $this->Producto->saveImagenProduct($array_imagenes);
						if(!$updImg){
							$this->session->set_flashdata('success', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar las fotos del producto</div>');
						}
					} 
					$categorias = array();
					for ($i=0; $i < count($categorias_id); $i++) { 
						$categorias[$i]['categoria_id'] = $categorias_id[$i];
						$categorias[$i]['producto_id'] = $id;
					}
					$deleted = $this->Producto->deleteCategoryProduct($id);
					$saved3 = $this->Producto->saveCategoryProduct($categorias);
					if(!$saved3){
							$this->session->set_flashdata('success', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar las categorias</div>');
						header('Location: '.'../editar/'.$id, TRUE);
					}
					$this->session->set_flashdata('success', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
				}else{ 
					$this->session->set_flashdata('success', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos del producto</div>');
					//echo "No se pudo guardar los datos del producto";
				};
				//redirect('dashboards/product/edit/'.$id);
				header('Location: '.'../editar/'.$id, TRUE);
			}
			
		}
		#validaciones
		$datapanel['requerid'] 		= validacionForm($validaciones,'view');
		#body
		$datapanel['body'] 		= 'productos/editar';
		#data
		$productos = $this->Producto->getProductById( $id );
		//$datapanel['dataset']['productos'] 	= $productos; 
		//$datapanel['dataset']['atributos'] 	= $this->Producto->getAtributosById( $id ); 
		$datapanel['dataset'] 	= $productos; 

		//print_r($datapanel['dataset']['atributos']); exit();


		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		
		$datapanel['galerias'] 	= $this->Galeria->getGaleryByProduct($id);
		$datapanel['categorias'] 	= $this->Categoria->getCategoryTreeForParentId();
		$this->load->view("dashboard/includes/template", $datapanel);
		
	}

	public function nuevo() {
		$validaciones = array('categoria_id[]','nombre','url','NOTfiles[]','orden','seo_title|max_length[150]','seo_description|max_length[150]','seo_keywords');
		if(!empty($_POST)){
			if (validacionForm($validaciones,'controller') == FALSE){
				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{
				#--------------------
				# Subida de Imagenes
				if( ! empty($_FILES['files']['name']) &&  (count($_FILES['files']['name']))>0){
					$files = $_FILES['files'];					
				    #-- Se enivia el array de archivos multiples  //desarrollado solo para el plugin multiple--#
					$imagenes  = ( ! empty($files['name']) ? uploadImgMultiple( $files, 'productos', $this->sizes, $this->watermark ) : '');
				}else{
					echo "implementar validacion no existe archivo"; exit();
				}

				// if uploaded and success
				if(isset($imagenes['status']) && $imagenes['status'] == '200' && count($imagenes['data']) > 0) {
					// get uploaded files
					$uploadedFiles = $imagenes['data'];
				}
				if(isset($imagenes['status']) && $imagenes['status'] == '400'){
					//echo '<pre>';print_r($warnings);echo '</pre>';exit;
					$this->session->set_flashdata('
						', '<div class="alert alert-warning"><strong>RESULTADO:</strong>'.$imagenes['error'].'</div>');
					header('Location: '.'editar/'.$id, TRUE);
				}
				
				$data = $_POST;
				if (count($data['categoria_id'])<1) {
					$this->session->set_flashdata('success', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos del producto</div>');
					header('Location: '.'nuevo', TRUE);
				} 
				
				$categorias_id = $data['categoria_id'];
				
				unset($data['categoria_id']);
				
				unset($data['fileuploader-list-files']);
				$saved = $this->Producto->saveProduct($data);
				$categorias = array();
				if($saved){
					for ($i=0; $i < count($categorias_id); $i++) { 
						$categorias[$i]['categoria_id'] = $categorias_id[$i];
						$categorias[$i]['producto_id'] = $saved;
					}
					$saved3 = $this->Producto->saveCategoryProduct($categorias);

					$array_imagenes = array();
					for ($i=0; $i < count($uploadedFiles); $i++) { 
						$array_imagenes[$i]['imagen_title'] = $uploadedFiles[$i]['titulo'];
						$array_imagenes[$i]['imagen'] = $uploadedFiles[$i]['principal'];
						$array_imagenes[$i]['ruta_amazon'] = ($uploadedFiles[$i]['amazon_path']['principal']['file'])? $uploadedFiles[$i]['amazon_path']['principal']['file']:'';
						$array_imagenes[$i]['producto_id'] = $saved;
					}
					$saved2 = $this->Producto->saveImagenProduct($array_imagenes);
					if($saved2){
						$this->session->set_flashdata('success', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
					}else{ 
						$this->session->set_flashdata('success', '<div class="alert alert-info"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente, pero no la foto.</div>');
					};
				}else{ 
					$this->session->set_flashdata('success', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos del producto</div>');
					header('Location: '.'nuevo', TRUE);
				};
			header('Location: '.'lista/'.$categorias['0']['categoria_id'], TRUE);
			# Fin Subida
			#--------------------
			}
		}
		#validaciones
		$datapanel['requerid'] 		= validacionForm($validaciones,'view');
		#body
		$datapanel['body'] 		= 'productos/nuevo';
		#data
		$datapanel['dataset'] 	= $this->Categoria->getCategoryTreeForParentId();
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function delete(){
		if ($_POST) {
			$id = $_POST['param_id'];
			if(! $id){ echo "no existe, ver lista"; exit();};

			$product = $this->Producto->getProductById($id);

	        #elimanos las categorias relacionadas
	        $deleted = $this->Producto->deleteCategoryProduct($product['id']);
	        if(! $deleted) {
	        	$result['titulo'] =  '¡Error!';
	        	$result['estado'] = 'error';
	            $result['msj'] = 'Ha ocurridó un error, vuelve a intertarlo';
	            echo json_encode($result);
	            exit();
	        }
	        $resultado = $this->Producto->deleteImageProduct($product['id']);
	        if($resultado){
	        	$eliminado = $this->Producto->deleteProduct($product['id']);
	        }
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
		} else {
			header('Location: '.'../lista/', TRUE);
		}
        //redirect('mainpanel/product/listado');
        //header('Location: '.'../lista/'.$product['categorias_id'], TRUE);

	}

	#Ajax para el estado del producto
	public function ajaxEstado(){
		if ($_POST) {
			$id = $_POST['param_id'];
			$estado = $_POST['param_estado'];
			$data = array('estado'=>$estado);
			$updated = $this->Producto->updateProduct($id, $data);
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

	public function eliminarGaleriaImg(){
		if ($_POST) {
			$id = $_POST['id_imagen'];
			$eliminado = $this->Galeria->deleteImageGalery($id);
			if($eliminado){
				$result['mensaje'] = "Ha sido eliminado correctamente";
			}else{
				$result['mensaje'] = "Ocurrió un error, intente de nuevo";
			}
			echo json_encode($result);
		}
	}
	
}