<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter Array Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Erick Rene Huaracha Mamani
 * @link		er.ick9015@gmail.com
 */

// ------------------------------------------------------------------------


if ( ! function_exists('SessionUsuario'))
{

	/**
	 * Valida la sesion de usuario y restringe el acceso a los que no tiene sesion
	 *
	 * @param	array - trae todos las funciones que no quiere que sea restrigido por la sesion || array('*') => todas las funciones. 
	 * @return	booleano
	 */

	function SessionUsuario($param = array()){

		if (isset($param[0]) && $param[0] == '*') {

		}else{
			$CI =& get_instance();
			$controller = $CI->uri->rsegments[1];
			$function = $CI->uri->rsegments[2];
			$result = array_search($function,$param);
			if ($result === false) {
				#NO existe la funcion
				if (!$CI->session->userdata('User')) {
					header('Location: '.BASE_URL.'admin');
				}
			}
		}
    }
}
if ( ! function_exists('getDataSession'))
{

	/**
	 * trae los datos que se necesita de la session Usuario
	 *
	 * @param	el campo a llamar
	 * @return	los datos de la session
	 */

	function getDataSession($valor){
		$data = array();
		$CI =& get_instance();
		if ($CI->session->userdata('User')) {
			$data = $CI->session->userdata('User');
			return $data[$valor];
		}else{
			return NULL;
		}
    }
}

########## FRONTEND ############

if ( ! function_exists('SessionCliente'))
{

	/**
	 * Valida la sesion de cliete y restringe el acceso a los que no tiene sesion
	 *
	 * @param	array - trae todos las funciones que no quiere que sea restrigido por la sesion || array('*') => todas las funciones. 
	 * @return	booleano
	 */

	function SessionCliente($param = array()){

		if (isset($param[0]) && $param[0] == '*') {

		}else{
			$CI =& get_instance();
			$controller = $CI->uri->rsegments[1];
			$function = $CI->uri->rsegments[2];
			$result = array_search($function,$param);
			if ($result === false) {
				#NO existe la funcion
				if (!$CI->session->userdata('Cliente')) {
					header('Location: '.BASE_URL);
				}
			}
		}
    }
}


if ( ! function_exists('getDataSesionCliente'))
{

	/**
	 * trae los datos que se necesita de la session Usuario
	 *
	 * @param	el campo a llamar
	 * @return	los datos de la session
	 */

	function getDataSesionCliente($valor){
		$data = array();
		$CI =& get_instance();
		if ($CI->session->userdata('Cliente')) {
			$data = $CI->session->userdata('Cliente');
			return $data[$valor];
		}else{
			return NULL;
		}
    }
}

if ( ! function_exists('getLogueado'))
{

	function getLogueado(){
		$CI =& get_instance();
        if($CI->session->userdata('Cliente')){
            $dataSesion = $CI->session->userdata('Cliente');
            $resultado = '<li><a href="clientes/mi-cuenta"><i class="icon fa fa-user"></i>'.$dataSesion['nombres'].' '.$dataSesion['apellidos'].'</a></li>';
            $resultado .= '<li><a href="clientes/logout"><i class="icon fa fa-sign-out"></i>Salir</a></li>';
            /*$resultado = array(
                ['ID' => 'welcome', 'LINK' => "<a href='mi-cuenta'><i class='icon fa fa-user'></i>".$dataSesion['nombres']." ".$dataSesion['apellidos']."</a>"],
                ['ID' => 'cerrar', 'LINK' => '<a href="salir"><i class="icon fa fa-sign-out"></i>Salir</a>']
            );*/
        }
        else{
        	$resultado = '<li><a href="clientes/login"><i class="icon fa fa-sign-in"></i>Ingresar</a></li>';
        	$resultado .= '<li><a href="clientes/registrate"><i class="icon fa fa-pencil-square-o"></i>Regístrese</a></li>';
           /* $resultado = array(
                ['ID' => 'welcome', 'LINK' => '<a href="ingresar"><i class="icon fa fa-sign-in"></i>Ingresar</a>'],
                ['ID' => 'login', 'LINK' => '<a href="registrate"><i class="icon fa fa-pencil-square-o"></i>Regístrese</a>'],
            );*/
        }
        return $resultado;
    }
}
// ------------------------------------------------------------------------