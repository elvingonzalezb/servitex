<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonios extends CI_Controller {
	public $sizes = [
				          	 'thumbs_x'      => 80,
				            'thumbs_y'      => 100,
				            'medium_x'      => 400,
				            'medium_y'      => 500,
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
        $this->load->model('dashboard/model_testimonios', 'Testimonios');
        $this->load->library('My_upload');
        $this->load->library('My_aws');
        SessionUsuario();
    }

    public $names = array('nombre','testimonio');

	public function index()
	{
		///$this->load->view('welcome_message');
	}
	
	public function lista() {
		$data = array();
		$datapanel['body'] 		= 'testimonios/lista';
		$datapanel['dataset'] 	= $this->Testimonios->getTestimonios();
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function nuevo() {

		if(!empty($_POST)){

			if (validacionForm($this->names, 'controller') == FALSE){
				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');

			}else{

				$data = $_POST;

				# Subida de Imagenes
				if ( ! empty($_FILES["imagen"]['name']))
				{		
					$file = $_FILES["imagen"];

					# Subida de Imagenes
					$uploaded = uploadImg( $file , 'testimonios', $this->sizes );
					# Fin Subida

					if( $uploaded['status'] == 200 ){

						$data['nombre'] = $uploaded['titulo'];
					   	$data['imagen'] = $uploaded['principal'];
					   	$saved = $this->Testimonios->saveTestimonios($data);

						if($saved){
								$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se grabaron correctamente.</div>');
							header('Location: '.'lista', TRUE);
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
		$datapanel['requerid'] 	= validacionForm($this->names,'view');
		#body
		$datapanel['body'] 		= 'testimonios/nuevo';
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editar() {

		$id_testimonio = (int) $this->uri->segment(4,0);

		if(! $id_testimonio){ echo "no existe, ver lista"; exit();};

		if(!empty($_POST)){

			if (validacionForm($this->names, 'controller') == FALSE){

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
					$uploaded = uploadImg( $file , 'testimonios', $this->sizes );
					# Fin Subida

				    if( $uploaded['status'] == 200 ){	

						 	$data['nombre'] = $uploaded['titulo'];
						    $data['imagen'] = $uploaded['principal'];

					}else{
							 $this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo subir la imagen, vuelva a intentarlo.</div>');
					}

				}else{
						$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong>  No existe la imagen.</div>');
				}
				
				$updated = $this->Testimonios->UpdateTestimonio($id_testimonio, $data);	
				
				if($updated){
							$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
				}else{ 
						echo "Se guardo los datos de la galeria pero no la foto";
				};

				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
				# Fin Subida
				header('Location: '.'../editar/'.$id_testimonio);
			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names,'view');
		#body
		$datapanel['body'] 		= 'testimonios/editar';
		#data
		$datapanel['dataset'] 	= $this->Testimonios->getTestimonioById( $id_testimonio );
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$this->load->view("dashboard/includes/template", $datapanel);
	
	}
	
	public function delete(){

		if ($_POST) {
			
			$id_testimonio = $_POST['param_id'];

			$id = $this->Testimonios->getTestimonioById( $id_testimonio );
			if(empty($id)){ 
				echo "no existe, ver lista"; exit();
			};

			$resultado = $this->Testimonios->UpdateTestimonio($id_testimonio,array('estado'=>_ELIMINADO));
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

	#Ajax para el estado de la categoria
    public function ajaxEstado(){
    	
        if ($_POST) {
            $id = $_POST['param_id'];
            $estado = $_POST['param_estado'];
            $data = array('estado'=>$estado);        
                $updated = $this->Testimonios->UpdateTestimonio($id, $data);
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

