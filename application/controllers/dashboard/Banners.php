<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Banners extends CI_Controller {
	public $sizes = [
				            'thumbs_x'      => 150,
				            'thumbs_y'      => 64,
				            'medium_x'      => 437,
				            'medium_y'      => 350,
				            'principal_x'   => 870,
				            'principal_y'   => 368
				        ];
	public $sizes2 = [
				            'thumbs_x'      => 150,
				            'thumbs_y'      => 64,
				            'medium_x'      => 437,
				            'medium_y'      => 350,
				            'principal_x'   => 300,
				            'principal_y'   => 100
				        ];
	public $watermark = [
				            'text_mark' => '',
				            'img_mark'  => '',
				            'backgroud' => '',
				            'text_color'=> ''
				        ];
 	public $names = array('NOTtitulo','NOTsubtitulo','NOTresumen','NOTlink','NOTorden');

	public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_banners', 'Banner');
        $this->load->library('My_upload');
        $this->load->library('My_aws');
        SessionUsuario();
    }

	public function index()
	{
		///$this->load->view('welcome_message');
	}
	
	public function lista() {
		$data = array();
		$datapanel['body'] 		= 'banners/lista';
		$datapanel['dataset'] 	= $this->Banner->getBannersByType();
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function nuevo() {
			
		$tamaño=array();
		if ( ! empty($_POST) ){

			if (validacionForm($this->names, 'controller') == FALSE){
					
				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{

				$data = $_POST; 
				if( ! empty($_FILES["imagen"]['name']) ){

					$tipoBanner=$data['tipo_banner_id'];
					$file = $_FILES["imagen"];
					
					# Subida de Imagenes
					if ($tipoBanner==1) {
						$tamaño = $this->sizes;
					}else if ($tipoBanner==2){
						$tamaño = $this->sizes2;
					}

					$uploaded = uploadImg( $file , 'banners', $tamaño );
					# Fin Subida
					
				    if( $uploaded['status'] == 200 ){

				    	$data['imagen_title'] = $uploaded['titulo'];
				    	$data['imagen'] = $uploaded['principal'];
				    	$data['tipo_banner_id'] = $tipoBanner;
				    	$data['creado']=date('Y-m-j H:i:s');

				    	#Grabacion de Datos
				    	$saved = $this->Banner->saveBanners($data);

					    if($saved){
					    	$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
							header('Location: '.'lista');exit();
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
			// header('Location: '.'nuevo');	
		}

		#validaciones
		$datapanel['required'] 	= validacionForm($this->names,'view');
		#body
		$datapanel['body'] 		= 'banners/nuevo';
		#data
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editar() {

		$id_banner = (int) $this->uri->segment(4,0);

		if(! $id_banner){ 
			echo "no existe, ver lista"; exit();
		};

		if ( ! empty($_POST) )
		{
			$data = $_POST;
			//$data['tipo_banner_id'] = 1;
			$imgant = $data['imgant'];
			unset($data['imgant']);

			if( ! empty($_FILES["imagen"]['name']) ){

				$tipoBanner=$data['tipo_banner_id'];
				$file = $_FILES["imagen"];
				# Subida de Imagenes
					if ($tipoBanner==1) {
						$tamaño = $this->sizes;
					}else if ($tipoBanner==2){
						$tamaño = $this->sizes2;
					}

				if (validacionForm($this->names, 'controller') == FALSE){

					$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
				}else{
					#-------------------				
					# Subida de Imagenes
					#-------------------	
					$uploaded = uploadImg( $file , 'banners', $tamaño );
					# Fin Subida

					if( $uploaded['status'] == 200 ){

						$data['imagen_title'] = $uploaded['titulo'];
						$data['imagen'] = $uploaded['principal'];
					}else{ 
						
						$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo subir la imagen, vuelva a intentarlo.</div>');
					}
				}
			}

			#Grabacion de Datos
			$updated = $this->Banner->UpdateBanners($id_banner, $data);

			if($updated){
				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos, vuelva a intentarlo.</div>');
			}
			header('Location: '.'../editar/'.$id_banner);
		}
		
		#validaciones
		$datapanel['required'] 	= validacionForm($this->names,'view');
		#body
		$datapanel['body'] 		= 'banners/editar';
		#data
		$datapanel['dataset'] 	= $this->Banner->getBannersById( $id_banner );
		// var_dump('<pre>',$datapanel['dataset']);exit();
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function delete(){

		if ($_POST) {

			$id = $_POST['param_id'];
			$id_banner = $this->Banner->getBannersById( $id );
			if(empty($id_banner)){ 
				echo "no existe, ver lista"; exit();
			};

			$data=array('estado'=>_ELIMINADO);
	        $resultado = $this->Banner->updateBanners($id,$data);

	        if($resultado) {
	            $result['titulo'] =  '¡Hecho!';
				$result['estado'] =  'success';
				$result['msj'] = 'Se elimino correctamente.';
	        } else {
	        	$result['titulo'] =  '¡Error!';
				$result['estado'] = 'error';
				$result['msj'] = 'Ha ocurridó un error, vuelve a intertarlo';
	        }
	        echo json_encode($result);

		}
	}

	#Ajax para el estado del Banner
	public function ajaxEstado(){

		if ($_POST) {

			$id = $_POST['param_id'];
			$estado = $_POST['param_estado'];
			$data = array('estado'=>$estado);
			$updated = $this->Banner->updateBanners($id, $data);

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

