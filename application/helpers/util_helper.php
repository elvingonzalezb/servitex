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

if ( ! function_exists('validateForm'))
{
	/**
	 * Retorna un booleano si recibe el tipo 'controller' o 'view' un array de todos los atributos name
	 * it is not set.
	 *
	 * @param	array - los atributos name de los input
	 * @param	tipo - para validar por el controlador o view
	 * @return	array o booleano
	 */
    function validacionForm($inputs = array(),$tipo){
    	$CI =& get_instance();
		$CI->load->library('form_validation');
        $array = array();
        for ($i=0; $i < count($inputs); $i++) { 
			$rule = strstr($inputs[$i], '|');
			$name = strstr($inputs[$i], '|',true);
			$name = ($name)? $name : $inputs[$i];
			$txt = strrpos($name, "NOT");
			
			if ($txt === false) {
				if($name != 'imagen'){
					$CI->form_validation->set_rules($name, $name.' ', 'required'.$rule);
				}
				$array[$i] = $name;
				
			}/*else{
				//$name = substr($name, 3);
			}
			//$array[$i] = $name;*/
        }
        if($tipo=='controller'){
			if (($CI->form_validation->run() == FALSE) && count($array)>0){
				return false;
            }else{
				return true;
            }
        }else if($tipo=='view'){
            return $array;
        }
    }
}

//avance 1
// if ( ! function_exists('getBreadcrumbsProductos'))
// {
// 	/**
// 	 * Crea en breadcrumb solo de categorias
// 	 *
// 	 */
//     function getBreadcrumbsProductos(){
//     	// var_dump('entro productos');exit();
// 		$CI =& get_instance();
// 		$id = $CI->uri->segment(4,0);
// 		$id_cat = $CI->uri->segment(5,0);
// 		$html = '';
// 		if ($id == '0') {
// 			$html .= '<li class="active">Categorias</li>';
// 		} else {
// 			$array = getCategoryProduct($id);
// 			$count = count($array);
// 			$html = '<li><a href="dashboard/categorias/lista">Categorias</a></li>';
// 			for ($i=0; $i < $count; $i++) { 
// 				if ($i+1 == $count) {
// 					$html .= '<li class="active">'.$array[$i]['nombre'].'</li>';
// 				} else {
// 					$html .= '<li><a href="dashboard/categorias/lista/'.$array[$i]['id'].'">Productos</a></li>';
// 					$html .= '<li class="active">'.$titulo.'</li>';
// 				}
// 			}
// 		}
// 		return $html;
//  	}
// }

//avance 2
// if ( ! function_exists('getBreadcrumbsProductos'))
// {
// 	/**
// 	 * Crea en breadcrumb solo de categorias
// 	 *
// 	 */
//     function getBreadcrumbsProductos($titulo=array()){
//     	// var_dump('entro productos');exit();
// 		$CI =& get_instance();
// 		$id = $CI->uri->segment(4,0);
// 		$id_cat = $CI->uri->segment(5,0);
// 		$html = '';
// 		if ($id == '0') {
// 			$html .= '<li class="active">Categorias</li>';
// 		} else {
// 			$array = getCategoryProduct($id);
// 			$count = count($array);
// 			$html = '<li><a href="dashboard/categorias/lista">Categorias</a></li>';
// 			for ($i=0; $i < $count; $i++) { 
// 				if ($i+1 == $count) {
// 					$html .= '<li class="active">'.$array[$i]['nombre'].'</li>';
// 				} else {
// 					$html .= '<li><a href="dashboard/categorias/lista/'.$array[$i]['id'].'">'.$array[$i]['nombre'].'</a></li>';
// 				}
// 			}
// 		}
// 		return $html;
//  	}
// }

if ( ! function_exists('getBreadcrumbsProductos'))
{
	/**
	 * Crea en breadcrumb solo de categorias
	 *
	 */
    function getBreadcrumbsProductos($titulo=array()){

		$CI =& get_instance();
		$id = $CI->uri->segment(4,0);
		//si el 4to elemento es 0 solo cumple para listado categoria
		
		//si el 4to elemento tiene valor cumplem editar categoria, listado producto
		//ademas cumple listado subcategorias y editado subcategoria
		$id_cat = $CI->uri->segment(5,0);
		//si el 5to elemento es 0 cumplen listado producto y listado subcategoria y editado subcategoria 

		//si el 5to elemento tiene valor cumplem editar producto
		// $nombre = $CI->uri->segment(2,0);
		$html = '';
		// var_dump($id_cat);exit();
		if ($id == '0') {
			$html .= '<li class="active">Categorias</li>';
		} else {
			//Entra a editar categoria, lista producto , editar producto
			$html = '<li><a href="dashboard/categorias/lista">Categorias</a></li>';
			if($id_cat=='0'){
				$array = getCategoryProduct($id);
				$count = count($array);
				for ($i=0; $i < $count; $i++) { 
					if ($i+1 == $count) {
						// Editar categoria, listado producto, listado subcategoria y editado subcategoria 
						$html .= '<li class="active">'.$array[$i]['nombre'].'</li>';
					} else {
						// nombre de la subcategoria
						$html .= '<li><a href="dashboard/categorias/lista/'.$array[$i]['id'].'">'.$array[$i]['nombre'].'</a></li>';
					}
				}
			} else {
				// Entra Editar Producto
				$array = getCategoryProduct($id_cat);
				// var_dump($array);exit();
				$count=count($array);
				if($count>1){
					//Editado de producto con subcategoria
					for ($i=0; $i < $count; $i++) {
						if ($i+1 == $count) {
							// nombre del listado producto o subcategoria 
							$html .= '<li><a href="dashboard/productos/lista/'.$array[$i]['id'].'">'.$array[$i]['nombre'].'</a></li>';
							$html .= '<li class="active">'.$titulo.'</li>';
						} 
						else {
							// nombre de la subcategoria
							$html .= '<li><a href="dashboard/categorias/lista/'.$array[$i]['id'].'">'.$array[$i]['nombre'].'</a></li>';
						}
					}

				}else{
					// Editar producto sin subcategoria
					for ($i=0; $i < $count; $i++) {
						$html .= '<li><a href="dashboard/productos/lista/'.$id_cat.'">'.$array[$i]['nombre'].'</a></li>';
						$html.= '<li class="active"><a>'.$titulo.'</a></li>';
					}
				}

			}

		}
		return $html;
 	}
}

if ( ! function_exists('getCategoryProduct'))
{
	function getCategoryProduct($id){
		$CI =& get_instance();
        $query = $CI->db
                ->select(['id','nombre','padre_id'])
                ->from('categorias')
                ->where('estado !=', _ELIMINADO)
                ->where('id',$id)
                ->get()
                ->row_array();

        if ($query['padre_id'] != _PARENT_ID) {
            $path[] = $query;
            $path = array_merge(getCategoryProduct($query['padre_id']), $path);
        }else{
            $path[] = $query;
        }
        return $path;
    }
}

if ( ! function_exists('getBreadcrumbsServicios'))
{
	/**
	 * Crea en breadcrumb solo de categorias de servicios
	 *
	 */
    function getBreadcrumbsServicios($titulo = array()){
		$CI =& get_instance();
		$id = $CI->uri->segment(4,0);
		$id_cat = $CI->uri->segment(5,0);

		$html = '';
		if ($id == '0') {
			$html .= '<li class="active">Categorias</li>';
		} else {
			$array = getCategoryService($id);
			$count = count($array);
			$html = '<li><a href="dashboard/servicios/listaCategoria">Categorias</a></li>';
			for ($i=0; $i < $count; $i++) { 
					if ($id_cat == '0') {
						$html .= '<li class="active">'.$array[$i]['nombre'].'</li>';
					} else {
						$array = getCategoryService($id_cat);
						$html .= '<li><a href="dashboard/servicios/listaServicio/'.$id_cat.'">'.$array[$i]['nombre'].'</a></li>';
						$html.= '<li class="active"><a>'.$titulo.'</a></li>';
					}
			}
		}
		return $html;
 	}
}

if ( ! function_exists('getCategoryService'))
{
	function getCategoryService($id){
		$CI =& get_instance();
        $query = $CI->db
                ->select(['id','nombre'])
                ->from('categorias')
                ->where('estado !=', _ELIMINADO)
                ->where('id',$id)
                ->get()
                ->row_array();
            $path[] = $query;
        return $path;
    }
}

if ( ! function_exists('getBreadcrumbsProyectos'))
{
	/**
	 * Crea en breadcrumb solo en albumes de fotos
	 *
	 */
    function getBreadcrumbsProyectos( $titulo = array(),$id_trabajo=array(),$id_proyecto2=array() ){
		$CI =& get_instance();
		$id = $CI->uri->segment(4,0);
		$id_proyecto_o_trabajo = $CI->uri->segment(5,0);
		$nombre = $CI->uri->segment(3,0);
		$html = '';
		if ($id == '0') { 
			//segment 4 igual a 0
			// lista proyecto
			$html .= '<li class="active">Proyectos</li>';
		} else { 
			//entran los segment 4 q tienen valor menos editar categoria x condicion en el breadcrumbs
			$html = '<li><a href="dashboard/proyectos/listaProyecto">Proyectos</a></li>';	
			$array = getProyecto($id);
			// var_dump('<pre>',$array);exit();
			$count = count($array);
			// $id_trabajo = $CI->uri->segment(5,0);

			if ($id_proyecto_o_trabajo == '0') { //segment 5 igual a 0	
					// Entro  a listado ya sea a trabajo o foto
				if($nombre=='listaTrabajo'){
					// listado trabajo
					for ($i=0; $i < $count; $i++) { 
						$html .= '<li class="active">'.$array[$id_proyecto_o_trabajo]['nombre'].'</li>';
					}
				}else{
						// Listado foto
						$array2 = getTrabajo($id);
						$array = getProyecto($array2[0]['proyecto_id']);
						$count = count($id_proyecto_o_trabajo);
						$html.= '<li><a href="dashboard/proyectos/listaTrabajo/'.$array2[0]['proyecto_id'].'">'.$array[0]['nombre'].'</a></li>';
					for ($j=0; $j < $count; $j++) { 
						// solo lista foto
						$html .= '<li class="active">'.$array2[$j]['nombre'].'</li>';
					}
				}
			}else{  //entran los segment 5 q tienen valor ya sea trabajo o fotos
					// Entro  a editar ya sea a trabajo o foto
				$array2 = getProyecto($id_proyecto_o_trabajo);
				$array = getProyecto($id);
				$array3 = getTrabajo($id);
				$array4 = getTrabajo($array3[0]['proyecto_id']);
				$array5 = getProyecto($array4[0]['proyecto_id']);

				if($nombre=='editarTrabajo'){
					// Editar Trabajo
					$html .= '<li><a href="dashboard/proyectos/listaTrabajo/'.$array3[0]['proyecto_id'].'">'.$array2[0]['nombre'].'</a></li>';
					$html.= '<li class="active"><a>'.$titulo.'</a></li>';
				} else if ($nombre=='editarFoto'){

					// Editar Foto
					$html.= '<li><a href="dashboard/proyectos/listaTrabajo/'.$array4[0]['proyecto_id'].'">'.$array5[0]['nombre'].'</a></li>';
					for ($j=0; $j < $count; $j++) { 
								
						$html .= '<li><a href="dashboard/proyectos/listaFoto/'.$id_trabajo.'">'.$array4[0]['nombre'].'</a></li>';
						$html.= '<li class="active"><a>'.$titulo.'</a></li>';
					}

				}
			}
		}
		return $html;
 	}
}

if ( ! function_exists('getProyecto'))
{
	function getProyecto($id){
		$CI =& get_instance();
        $query = $CI->db
                ->select(['p.id','p.nombre'])
                ->from('proyectos p')
                ->join('galerias_proyecto g','galerias_proyecto g ON g.proyecto_id = p.id','left')
                ->where('p.estado !=', _ELIMINADO)
                ->where('p.id',$id)
                ->get()
                ->row_array();
            $path[] = $query;
        return $path;
    }
}

if ( ! function_exists('getTrabajo'))
{
	function getTrabajo($id){
		$CI =& get_instance();
        $query = $CI->db
                ->select(['g.*',
                    'g.proyecto_id as proyecto_id','f.nombre as nombre_foto'])
                ->from('galerias_proyecto g')
                ->join('fotos_proyecto f', 'f.galeria_proyecto_id = g.id','left')
                ->where('g.estado!=',_ELIMINADO)
                ->where('g.id', $id)
                ->order_by('g.orden','asc')
                ->get()
                ->row_array();
 $path[] = $query;
        return $path;
    }
}

if ( ! function_exists('getBreadcrumbsFotos'))
{
	/**
	 * Crea en breadcrumb solo en albumes de fotos
	 *
	 */
    function getBreadcrumbsFotos($titulo = array()){

		$CI =& get_instance();
		$id = $CI->uri->segment(4,0);
		$id_album = $CI->uri->segment(5,0);
		$html = '';
		if ($id == '0') {
			$html .= '<li class="active">Álbumes de Fotos</li>';
		} else {
			$array = getAlbumFoto($id);
			$count = count($array);
			$html = '<li><a href="dashboard/galeria_fotos/lista_album">Álbumes de Fotos</a></li>';
			for ($i=0; $i < $count; $i++) { 
					if ($id_album == '0') {
						$html .= '<li class="active">'.$array[$i]['nombre'].'</li>';
					} else {
						$array = getAlbumFoto($id_album);
						$html .= '<li><a href="dashboard/galeria_fotos/lista_foto/'.$id_album.'">'.$array[$i]['nombre'].'</a></li>';
						$html .= '<li class="active"><a>'.$titulo.'</a></li>';
					}
			}
		}
		return $html;
 	}
}

if ( ! function_exists('getAlbumFoto'))
{
	function getAlbumFoto($id){
		$CI =& get_instance();
        $query = $CI->db
                ->select(['id','nombre'])
                ->from('albumes_fotos')
                ->where('estado !=', _ELIMINADO)
                ->where('id',$id)
                ->get()
                ->row_array();
            $path[] = $query;
        return $path;
    }
}

if ( ! function_exists('getBreadcrumbsVideos'))
{
	/**
	 * Crea en breadcrumb solo en albumes de Videos
	 *
	 */
    function getBreadcrumbsVideos($titulo = array()){
		$CI =& get_instance();
		$id = $CI->uri->segment(4,0);
		$id_album = $CI->uri->segment(5,0);
		$html = '';
		if ($id == '0') {
			$html .= '<li class="active">Álbumes de Videos</li>';
		} else {
			$array = getAlbumVideo($id);
			$count = count($array);
			$html = '<li><a href="dashboard/galeria_videos/lista_album">Álbumes de Videos</a></li>';
			for ($i=0; $i < $count; $i++) { 
					if ($id_album == '0') {
						$html .= '<li class="active">'.$array[$i]['nombre'].'</li>';
					} else {
						$array = getAlbumVideo($id_album);
						$html .= '<li><a href="dashboard/galeria_videos/lista_video/'.$id_album.'">'.$array[$i]['nombre'].'</a></li>';
						$html.= '<li class="active"><a>'.$titulo.'</a></li>';
					}
			}
		}
		return $html;
 	}
}

if ( ! function_exists('getAlbumVideo'))
{
	function getAlbumVideo($id){
		$CI =& get_instance();
        $query = $CI->db
                ->select(['id','nombre'])
                ->from('albumes_videos')
                ->where('estado !=', _ELIMINADO)
                ->where('id',$id)
                ->get()
                ->row_array();
            $path[] = $query;
        return $path;
    }
}

if ( ! function_exists('getBreadcrumbsArticulos'))
{
	/**
	 * Crea en breadcrumb solo en albumes de Videos
	 *
	 */
    function getBreadcrumbsArticulos($titulo = array()){
		$CI =& get_instance();
		$id = $CI->uri->segment(4,0);
		$id_articulo = $CI->uri->segment(5,0);
		$html = '';
		if ($id == '0') {
			$html .= '<li class="active">Articulos</li>';
		} else {
			$array = getArticulos($id);
			$count = count($array);
			$html = '<li><a href="dashboard/articulos/lista">Articulos</a></li>';
			for ($i=0; $i < $count; $i++) { 
					if ($id_articulo == '0') {
						$html .= '<li class="active">'.$array[$i]['nombre'].'</li>';
					} else {
						$array = getArticulos($id_articulo);
						$html .= '<li><a href="dashboard/articulos/listaComentarios/'.$id_articulo.'">'.$array[0]['nombre'].'</a></li>';
						$html.= '<li class="active"><a>'.$titulo.'</a></li>';
					}
			}
		}
		return $html;
 	}
}

if ( ! function_exists('getArticulos'))
{
	function getArticulos($id){
		$CI =& get_instance();
        $query = $CI->db
                ->select(['id','nombre'])
                ->from('articulos')
                ->where('estado !=', _ELIMINADO)
                ->where('id',$id)
                ->get()
                ->row_array();
            $path[] = $query;
        return $path;
    }
}

#calcula cuantos dias a pasado entre fechas $inicio y final
if ( ! function_exists('getCalcularFechas'))
{
	function getCalcularFechas($inicio,$final){
		$date1 = new DateTime($inicio);
		$date2 = new DateTime($final);
		$diff = $date1->diff($date2);                           
		return $diff->days;
	}
}

#llamar los datos de la tabla configuracion a traves de un parametro
if ( ! function_exists('dataConfig'))
{
	function dataConfig($value){
		$ci =& get_instance();
        $ci->load->driver('cache');
        if ( ! $cache = $ci->cache->get('dataConfig')) {
            $ci->db->select('llave,valor');
            $query = $ci->db->get('configuraciones');
            if ($query->num_rows() > 0){
                $data = $query->result_array();
                $cache = array();
                for ($i=0; $i < count($data) ; $i++) { 
                    $cache[$data[$i]['llave']] = $data[$i]['valor'];
                }
            }
            $resultado = array();
            if(isset($cache["enlace_facebook"]) && !empty($cache["enlace_facebook"])):$value_fb = $cache['enlace_facebook']; array_push($resultado, ['RS' => $value_fb, 'RS_TITLE' => 'Facebook', 'RS_CLASS' => 'facebook']);endif;

	        if(isset($cache["enlace_twitter"]) && !empty($cache["enlace_twitter"])): $value_tw = $cache['enlace_twitter']; array_push($resultado, ['RS' => $value_tw, 'RS_TITLE' => 'Twitter', 'RS_CLASS' => 'twitter']);endif;

	        if(isset($cache["enlace_google_plus"]) && !empty($cache["enlace_google_plus"])): $value_gp = $cache['enlace_google_plus']; array_push($resultado, ['RS' => $value_gp, 'RS_TITLE' => 'Google+', 'RS_CLASS' => 'google-plus']);endif;

	        if(isset($cache["enlace_youtube"]) && !empty($cache["enlace_youtube"])): $value_yt = $cache['enlace_youtube']; array_push($resultado, ['RS' => $value_yt, 'RS_TITLE' => 'Youtube', 'RS_CLASS' => 'youtube']);endif;

	        if(isset($cache["enlace_instagram"]) && !empty($cache["enlace_instagram"])): $value_ig = $cache['enlace_instagram']; array_push($resultado, ['RS' => $value_ig, 'RS_TITLE' => 'Instagram', 'RS_CLASS' => 'instagram']); endif;
	        
	        if(isset($cache["enlace_pinterest"]) && !empty($cache["enlace_pinterest"])): $value_pr = $cache['enlace_pinterest']; array_push($resultado, ['RS' => $value_pr, 'RS_TITLE' => 'Pinterest', 'RS_CLASS' => 'pinterest']); endif;

	        if(isset($cache["enlace_linkedin"]) && !empty($cache["enlace_linkedin"])): $value_pr = $cache['enlace_linkedin']; array_push($resultado, ['RS' => $value_pr, 'RS_TITLE' => 'Linkedin', 'RS_CLASS' => 'linkedin']); endif;
	        
            $ci->cache->save('dataConfig', $cache, 604800);
        }
        if(isset($cache[$value])){
			return $cache[$value];
		}else{
			return '';
		}
	}
}

	function CompartirRedes($redsocial, $url, $article = ''){
		switch ($redsocial) {
			case 'facebook':
				$link_share = 'https://www.facebook.com/sharer/sharer.php?u='.BASE_URL.'blog/'.$url;
				break;
			case 'twitter':
				$link_share = 'https://twitter.com/intent/tweet?url='.BASE_URL.'blog/'.$url.'&text='.$article;
				break;
			case 'google+':
				$link_share = 'https://plusone.google.com/_/+1/confirm?hl=en&url='.BASE_URL.'blog/'.$url;
				break;
			default:
				$link_share = '#';
				break;
		}
        return $link_share;
    }

    function CompartirVideo($url, $article){
        $value_fb = 'https://www.facebook.com/sharer/sharer.php?u='.$url;
        $value_tw = 'https://twitter.com/intent/tweet?url='.$url.'&text='.$article;
        $value_gp = 'https://plusone.google.com/_/+1/confirm?hl=en&url='.$url;

        $resultado = array(
            0 => ['RS' => $value_fb, 'RS_TITLE' => 'Facebook', 'RS_CLASS' => 'facebook'],
            1 => ['RS' => $value_tw, 'RS_TITLE' => 'Twitter', 'RS_CLASS' => 'twitter'],
            2 => ['RS' => $value_gp, 'RS_TITLE' => 'Google+', 'RS_CLASS' => 'google-plus'],
        );
        return $resultado;
    }

if ( ! function_exists('getFechaTexto'))
{
	function getFechaTexto($fecha){
		$dia = date('w', strtotime($fecha));
		$mes = date('n', strtotime($fecha));
		$numeroDia = date('d', strtotime($fecha));
		$anio = date('Y', strtotime($fecha));
		$tiempo = date('H:i:s', strtotime($fecha));
		$meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
		$dias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
		return $dias[$dia-1]." ".$numeroDia." de ".$meses[$mes-1]." del ".$anio." - ".$tiempo;
	}
}

if ( ! function_exists('getMensajes'))
{	
	function getMensajes(){
		
		$CI =& get_instance();
		$query = $CI->db
                ->select('id,nombre,creado')
                ->from('mensajes')
                ->order_by('creado')
                ->where('estado',2)
                ->limit(10)
                ->get()
                ->result_array();

                return $query;
	}
}

if ( ! function_exists('getNumMensajes'))
{	
	function getNumMensajes(){
		
		$CI =& get_instance();
        $query = $CI->db
                ->select('id,nombre')
                ->from('mensajes')
                ->where('estado',2)
                ->get()
                ->num_rows();
      
        return $query;
	}
}

if ( ! function_exists('diasTranscurridos'))
{	
	function diasTranscurridos($fecha,$fecha_f){
		
		$fecha_i = date_format(date_create($fecha), 'Y-m-d');
        $dias   = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
        $dias   = abs($dias); $dias = floor($dias);     
        return $dias;
	}
}

if ( ! function_exists('getSecciones'))
{	
	function getSecciones($id){
		
		$CI =& get_instance();
        $query = $CI->db
                    ->select('*')
                    ->from('secciones')
                    ->where('estado',_ACTIVO)
                    ->where('id', $id)
                    ->get()
                    ->row_array();
      
        return $query;
	}
}

if ( ! function_exists('getConfiguraciones'))
{	
	function getConfiguraciones($id){
		
		$CI =& get_instance();
        $query = $CI->db
                    ->select('*')
                    ->from('configuraciones')
                    ->where('estado',_ACTIVO)
                    ->where('id', $id)
                    ->get()
                    ->row_array();
      
        return $query;
	}
}

if ( ! function_exists('getcategoriasMT'))
{	
	function getcategoriasMT($id){
		
		$CI =& get_instance();
        $query = $CI->db
                    ->select('*')
                    ->from('categorias')
                    ->where('estado',_ACTIVO)
                    ->where('id', $id)
                    ->get()
                    ->row_array();
      
        return $query;
	}
}



if ( ! function_exists('redondeado'))
{
    function redondeado($numero, $decimales) {
        $factor = pow(10, $decimales);
        $aux = (round($numero*$factor)/$factor);
        return $aux;
    }
}


if ( ! function_exists('codigosProductosReserva'))
{
	function codigosProductosReserva($id_carro) {
            $ci =& get_instance();
            $sql = "SELECT distinct codigo FROM carro_detalle WHERE id='$id_carro'";
            $query = $ci->db->query($sql);
            $regs = $query->result();
            $lista = array();
            foreach($regs as $reg)
            {
                $lista[] = $reg->codigo;
            }
            return implode("<br>", $lista);
	}
}

if ( ! function_exists('formatoFechaHora'))
{
	function formatoFechaHora($fecha) {
            $aux_0 = explode(" ", $fecha);
            $aux = explode("-", $aux_0[0]);
            $agno = $aux[2];
            $mes = $aux[1];
            $dia = $aux[0];
            $fechaFormat = $agno."-".$mes."-".$dia;
            
            $aux2 = explode(":", $aux_0[1]);
            if($aux2[0]>12)
            {
                $hora = $aux2[0] - 12;
                $horaFormat = $hora.":".$aux2[1]." p.m.";
            }
            else
            {
                $horaFormat = $aux2[0].":".$aux2[1]." a.m.";
            }
            $formateada = $fechaFormat." ".$horaFormat;
            return $formateada;
	}
}

if ( ! function_exists('getConfig'))
{
	function getConfig() {
        $ci =& get_instance();
        $ci->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

        if ( ! $cache = $ci->cache->get('data'))
        {
            $ci->db->select('llave,valor');
            $query = $ci->db->get('configuraciones');
            if ($query->num_rows() > 0){
                $data = $query->result_array();
                $cache = array();
                for ($i=0; $i < count($data) ; $i++) { 
                    $cache[$data[$i]['llave']] = $data[$i]['valor'];
                }
            }
            //Save into the cache for 5 minutes
            $ci->cache->save('data', $cache, 300);
        }
        return $cache;
        //$ci->cache->delete('data');
	}
}


// ------------------------------------------------------------------------

/* Reducir codigo de fecha */
if ( ! function_exists('Ymd_2_dmY'))
{
	function Ymd_2_dmY($fecha) {
		$aux = explode("-", $fecha);
		$agno = $aux[0];
		$mes = $aux[1];
		$dia = $aux[2];
		$formateada = $dia."-".$mes."-".$agno;
		return $formateada;
	}
}