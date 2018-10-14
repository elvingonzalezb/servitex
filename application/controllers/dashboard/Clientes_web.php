<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_web extends CI_Controller {
	public $sizes = [
				            'thumbs_x'      => 100,
				            'thumbs_y'      => 100,
				            'medium_x'      => 350,
				            'medium_y'      => 437,
				            'principal_x'   => 600,
				            'principal_y'   => 720
				        ];
	
	public $watermark = [
				            'text_mark' => '',
				            'img_mark'  => '',
				            'backgroud' => '',
				            'text_color'=> ''
				        ];

	public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_clientes_web', 'ClientesWeb');
        $this->load->library('My_upload');
        $this->load->library('My_aws');
        SessionUsuario();
    }

    public $names = array('razon_social','url');

	public function index()
	{
		///$this->load->view('welcome_message');
	}
	
	public function lista() {
		$data = array();
		$datapanel['body'] 		= 'clientes_web/lista';
		$datapanel['dataset'] 	= $this->ClientesWeb->getClientes();
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function nuevo() {

		if(!empty($_POST)){

			if (validacionForm($this->names, 'controller') == FALSE){
				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');

			}else{

				$data = $_POST;
				# Subida de Imagenes
				if ( ! empty($_FILES["logo"]['name']))
				{		
					$file = $_FILES["logo"];

					# Subida de Imagenes
					$uploaded = uploadImg( $file , 'partners', $this->sizes );
					# Fin Subida

					if( $uploaded['status'] == 200 ){

					   	$data['logo'] = $uploaded['principal'];
					   	$data['creado']=date('Y-m-j H:i:s');
					   	$saved = $this->ClientesWeb->saveClientesWeb($data);

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
		$datapanel['body'] 		= 'clientes_web/nuevo';
		$this->load->view("dashboard/includes/template", $datapanel);
	}


	public function editar() {

		$id_clientes_web = (int) $this->uri->segment(4,0);
		if(! $id_clientes_web){ echo "no existe, ver lista"; exit();};

		if(!empty($_POST)){
			if (validacionForm($this->names,'controller') == FALSE){
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
					$uploaded = uploadImg( $file , 'partners', $this->sizes );
					# Fin Subida

				    if( $uploaded['status'] == 200 ){	

						    $data['logo'] = $uploaded['principal'];

					}else{
							 $this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo subir la imagen, vuelva a intentarlo.</div>');
					}

				}else{
						$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong>  No existe la imagen.</div>');
				}

				$updated = $this->ClientesWeb->UpdateClientes($id_clientes_web, $data);
				
				if($updated){		
				$this->session->set_flashdata('success', '<strong>RESULTADO:</strong> Los datos se actualizaron correctamente.');		
				}else{ echo "No se pudo subir archivo"; exit();};
				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
				# Fin Subida
				header('Location: '.'../editar/'.$id_clientes_web);
			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names,'view');
		#body
		$datapanel['body'] 		= 'clientes_web/editar';
		#data
		$datapanel['dataset'] 	= $this->ClientesWeb->getClientesById( $id_clientes_web );
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$this->load->view("dashboard/includes/template", $datapanel);
	}
	
	public function delete(){

		if ($_POST) {
			$id_clientes_web = $_POST['param_id'];

			$id= $this->ClientesWeb->getClientesById( $id_clientes_web );
			if(empty($id)){ echo "no existe, ver lista"; exit();};

			$resultado = $this->ClientesWeb->UpdateClientes($id_clientes_web,array('estado'=>_ELIMINADO));
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
                $updated = $this->ClientesWeb->UpdateClientes($id, $data);

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

