<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter Array Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/helpers/array_helper.html
 */

// ------------------------------------------------------------------------

if ( ! function_exists('mostrarTitulo'))
{
	/**
	 * retorna el titulo de la seccion
	 *
	 * @param	String - recibi el id de la tabla secciones 
	 * @return	retorna nombre de la seccion
	 */
    function mostrarTitulo($data){
    	switch ($data) {
    		case '1':
    			$result='Inicio';
    			break;
			case '2':
    			$result='Nosotros';
    			break;
    		case '3':
    			$result='Servicios';
    			break;
    		case '4':
    			$result='Articulos';
    			break;
			case '5':
    			$result='Productos';
    			break;
    		case '6':
    			$result='Preguntas Frecuentes';
    			break;
    		case '7':
    			$result='Contáctenos';
    			break;
            case '8':
                $result='Testimonios';
                break;
            case '9':
                $result='Banners';
                break;
			case '11':
    			$result='Regalos Personalizados';
    			break;
    		case '12':
    			$result='Galeria Videos';
    			break;
    		case '13':
    			$result='Clientes';
    			break;
            case '14':
                $result='Proyectos';
                break;

    		default: 
    			$result='';
    			break;
    	}
    	return $result;

    }
}

// ------------------------------------------------------------------------