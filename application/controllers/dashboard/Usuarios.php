<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public $names = array('usuario|alpha_numeric','password');

	public function __construct() {
        parent::__construct();
        $this->load->model('dashboard/model_usuarios', 'Usuario');
        $this->load->helper('captcha');
        SessionUsuario(array('login','logout'));
    }
    
    public function inicio()
	{
		$datapanel['body'] 		= 'usuarios/inicio';
		$this->load->view("dashboard/includes/template", $datapanel);
	}

    public function login() {
    	if (! empty($_POST)) {
    		if (validacionForm($this->names, 'controller') == FALSE){
				$this->form_validation->set_error_delimiters('<label class="error">', '</label>');
			}else{
				$username = $_POST['usuario'];
				$password = $_POST['password'];
				$recaptcha = $this->input->post('g-recaptcha-response');
        		$response = $this->recaptcha->verifyResponse($recaptcha);

        		if($response['success']){
					if ($this->Usuario->usuarioLogin($username, $password)) {
						$user = $this->Usuario->getUsuarioByName($username);
						$this->session->set_userdata('User',$user);
						// user login ok
						redirect(base_url().'dashboard');
					}else{
						$this->session->set_flashdata('message', '<div class="form-group has-feedback"><div class="alert alert-danger">Nombre de usuario o contraseña incorrecto.</div></div>');
					}
				}else{
            		header('Location: '.'../');
        		}
			}
    	}
    		#captcha
    		$datapanel['recaptcha'] = $this->recaptcha->render();
    		#validaciones
			$datapanel['required'] 	= validacionForm($this->names,'view');
			#data
			$this->load->view("dashboard/sections/usuarios/login", $datapanel);
    }

    public function logout() {
    	$this->session->set_flashdata('message', '<div class="form-group has-feedback"><div class="alert alert-info">Sesión finalizada.</div></div>');
    	$this->session->unset_userdata('User');
        header('Location: '.BASE_URL.'admin');exit();
    }
	
	public function datos() {

		$datapanel['body'] 		= 'usuarios/datos';
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function nuevo() {

		if ( ! empty($_POST) )
		{
			$data = $_POST;
			#Grabacion de Datos
			$saved = $this->Banner->saveUsuarios($data);

			if($saved){
				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> Los datos se actualizaron correctamente.</div>');
				header('Location: '.'lista');exit();
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo guardar los datos, vuelva a intentarlo.</div>');
			}
			header('Location: '.'nuevo');	
		}
		#body
		$datapanel['body'] 		= 'usuarios/nuevo';
		#data
		$this->load->view("dashboard/includes/template", $datapanel);
	}

	public function cambiar_clave() {

		if ( ! empty($_POST) )
		{
			$usuario = getDataSession('usuario');
			$id = getDataSession('id');
			$password = $_POST['password'];
			$nuevoPassword = $_POST['nuevaClave'];
			#Grabacion de Datos
			if ($this->Usuario->usuarioLogin($usuario , $password)) {
				if($this->Usuario->updateClave($id , $nuevoPassword)){
					$this->session->set_flashdata('message', '<div class="alert alert-success"><strong>RESULTADO:</strong> La clave se actualizo correctamente.</div>');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> No se pudo actualizar los datos, vuelva a intentarlo.</div>');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-warning"><strong>RESULTADO:</strong> Clave incorrecta.</div>');
			}
			redirect(base_url().'dashboard/usuarios/cambiar_clave');	
		}
		#body
		$datapanel['body'] 		= 'usuarios/cambiar-clave';
		#data
		$this->load->view("dashboard/includes/template", $datapanel);
	}

}

