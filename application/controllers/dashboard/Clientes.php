<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
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
        $this->load->model('dashboard/model_clientes', 'Clientes');
        $this->load->library('My_upload');
        $this->load->library('My_aws');
        SessionUsuario();
    }

    public $names = array('nombres','apellidos','correo','telefono');

	public function index()
	{
		///$this->load->view('welcome_message');
	}
	
	public function lista() {
		$data = array();
		$datapanel['body'] 		= 'clientes/lista';
		$datapanel['dataset'] 	= $this->Clientes->getClientes();
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editar() {
		$id_clientes = (int) $this->uri->segment(4,0);
		if(! $id_clientes){ echo "no existe, ver lista"; exit();};

		if(!empty($_POST)){
			if (validacionForm($this->names,'controller') == FALSE){
				// var_dump('<pre>',$_POST);exit();
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
					$uploaded = uploadImg( $file , 'clientes', $this->sizes );
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

				$updated = $this->Clientes->UpdateClientes($id_clientes, $data);
				
				if($updated){		

				$this->session->set_flashdata('success', '<strong>RESULTADO:</strong> Los datos se actualizaron correctamente.');		
				}else{ echo "No se pudo subir archivo"; exit();};
				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
				# Fin Subida
				header('Location: '.'../editar/'.$id_clientes);
			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names,'view');
		#body
		$datapanel['body'] 		= 'clientes/editar';
		#data
		$datapanel['dataset'] 	= $this->Clientes->getClientesById( $id_clientes );
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$this->load->view("dashboard/includes/template", $datapanel);
	}
	
	public function delete(){

		if ($_POST) {
			$id_clientes = $_POST['param_id'];

			$id= $this->Clientes->getClientesById( $id_clientes );
			if(empty($id)){ echo "no existe, ver lista"; exit();};

			$resultado = $this->Clientes->UpdateClientes($id_clientes,array('estado'=>_ELIMINADO));
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
    public function ajaxEstado($cat = NULL){
    	
        if ($_POST) {
            $id = $_POST['param_id'];
            $estado = $_POST['param_estado'];
            $data = array('estado'=>$estado);        
                $updated = $this->Clientes->UpdateClientes($id, $data);
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

