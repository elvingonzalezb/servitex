<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prg_frecuentes extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_prg_frecuentes', 'Prg_frecuente');
        $this->load->helper(array('form'));
        SessionUsuario();
    }
    public $names = array('pregunta','respuesta','autor','orden','NOTmail_autor');
    
	public function index()
	{
		///$this->load->view('welcome_message');
	}
	
	public function lista() {
		$datapanel['body'] 		= 'prg_frecuentes/lista';
		$datapanel['dataset'] 	= $this->Prg_frecuente->getPrgfrecuentes();
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function nuevo() {

		if(!empty($_POST)){

			if (validacionForm($this->names, 'controller') == FALSE){
				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{
				$data = $_POST;
				$data['creado']=date('Y-m-j H:i:s');
				$saved = $this->Prg_frecuente->savePrgFrecuentes($data);
				if($saved){
					$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
					header('Location: '.'lista', TRUE);
				}else{ echo "Se guardo los datos del articulo pero no la foto";};				
			}
		}	
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names,'view');
		#body
		$datapanel['body'] 		= 'prg_frecuentes/nuevo';
		#data
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function editar() {

		$id_prg_frecuentes = (int) $this->uri->segment(4,0);		
		if(! $id_prg_frecuentes){ echo "no existe, ver lista"; exit();};	

		if(!empty($_POST)){

			if (validacionForm($this->names,'controller') == FALSE){

				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{

				$data = $_POST;

				$updated = $this->Prg_frecuente->UpdatePregFrecuentes($id_prg_frecuentes, $data);
				if($updated){					
						$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
				}else{ echo "No se pudo subir archivo"; exit();};

				header('Location: '.'../editar/'.$id_prg_frecuentes);
			}
		}
		#validaciones
		$datapanel['requerid'] 	= validacionForm($this->names,'view');
		$datapanel['body'] 		= 'prg_frecuentes/editar';
		$datapanel['dataset'] 	= $this->Prg_frecuente->getPrgfrecuentesById( $id_prg_frecuentes );
		if( empty($datapanel['dataset'])){ echo "este item no existe"; exit();}
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function delete(){

		if ($_POST) {

			$id_prg_frecuentes = $_POST['param_id'];

			$id=$this->Prg_frecuente->getPrgfrecuentesById($id_prg_frecuentes);
			if(empty($id)){ echo "no existe, ver lista"; exit();};

	        $resultado = $this->Prg_frecuente->UpdatePregFrecuentes($id_prg_frecuentes,array('estado'=>_ELIMINADO));
	        
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

	#Ajax para el estado
	public function ajaxEstado(){

		if ($_POST) {

			$id = $_POST['param_id'];
			$estado = $_POST['param_estado'];
			$data = array('estado'=>$estado);
			$updated = $this->Prg_frecuente->UpdatePregFrecuentes($id, $data);

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

