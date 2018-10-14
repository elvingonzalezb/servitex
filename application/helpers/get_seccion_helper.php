<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter Array Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Victor Isaac Molina Asencios
 * @link		http://isaacmolina.com
 */

// ------------------------------------------------------------------------


if ( ! function_exists('getSeccion'))
{

	/**
	 * Retorna un booleano si recibe el tipo 'controller' o 'view' un array de todos los atributos name
	 * it is not set.
	 *
	 * @param	array - los atributos name de los input
	 * @param	tipo - para validar por el controlador o view
	 * @return	array o booleano
	 */

	function getSeccion($seccion){
		$CI =& get_instance();
        $query = $CI->db
                ->select([
                		'id',
						'titulo',
						'descripcion',
						'seccion',
						'imagen',
						'seo_title',
						'seo_description',
						'seo_keywords',
						'visible',
						'imagen_title'
                	])
                ->from('secciones')
                ->where('estado', _ACTIVO)
                ->where('seccion', $seccion)
                ->get()
                ->row_array();
        return ( ! empty($query) && is_array($query) ? $query : []);
    }
}
// ------------------------------------------------------------------------