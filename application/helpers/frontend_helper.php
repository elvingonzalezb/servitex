<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('getBanners'))
{
    function getBanners() {
        $ci =& get_instance();
        $sql = "select * from banners where estado='"._ACTIVO."' order by orden";
        $query = $ci->db->query($sql);
        $resultado = $query->result();
        $banners = array();
        foreach ($resultado as $value) {
            $temp = array();
            $temp['BANNER_ID'] = $value->id;
            $temp['BANNER_TITULO'] = $value->titulo;
            $temp['BANNER_SUMILLA'] = $value->subtitulo;
            $temp['BANNER_TEXTO'] = $value->resumen;
            $temp['BTN_TITULO'] = $value->btn_titulo;
            $temp['BANNER_LINK'] = $value->link;
            /*if(trim($value->boton) == ''){
                $temp['BANNER_HIDDEN'] = 'hidden';
            }else{
                $temp['BANNER_HIDDEN'] = '';
            }*/
            $temp['BANNER_ENLACE'] = $value->link;
            $temp['BANNER_IMAGEN'] = $value->imagen;
            $temp['BANNER_ORDEN'] = $value->orden;
            $temp['BANNER_ESTADO'] = $value->estado;

            $banners[] = $temp;
        }
        return $banners;
    }
}

if ( ! function_exists('dateFormatMA'))
{
    /**
     * Muestra los servicios del footer
     */
    function dateFormatMA($fecha){
        $dia = date('d', strtotime($fecha));
        $mes = date('n', strtotime($fecha));
        //$numeroDia = date('d', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));
        //$tiempo = date('H:i:s', strtotime($fecha));
        $meses = array('Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Novi','Dic');
        //$dias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        //return $dias[$dia-1]." ".$numeroDia." de ".$meses[$mes-1]." del ".$anio." - ".$tiempo;
        return $meses[$mes-1].' '.$dia.', '.$anio;
    }
}

// if ( ! function_exists('getFrontBreadProd'))
// {
//     /**
//      * Crea en breadcrumb de categorias y productos detalles
//      *
//      */
//     function getFrontBreadProd($params = array()){
//         $CI =& get_instance();
//         $url_category = $CI->uri->segment(2,0);
//         $id = substr(strrchr($url_category,'-'),1);
//         $url_prod = $CI->uri->segment(3,0);
//         $html = '';
//         if ($id == '') {
//             $html .= '<li class="active">Categorías</li>';
//         }else{
//             $html .= '<li><a href="productos">Categorías</a></li>';
//             $categorias = ($url_prod === 'detalle') ? getFrontCatProduct($params[1]) : getFrontCatProduct($id) ;
//             $count = count($categorias);
//             for ($i=0; $i < $count; $i++) { 
//                 if ($i+1 == $count) {
//                     $html .=  ($url_prod === 'detalle') ? '<li><a href="productos/'.$categorias[$i]['url'].'-'.$categorias[$i]['id'].'">'.$categorias[$i]['nombre'].'</a></li><li class="active">'.$params[0].'</li>' : '<li class="active">'.$categorias[$i]['nombre'].'</li>';
//                 } else {
//                     $html .= '<li><a href="productos/'.$categorias[$i]['url'].'-'.$categorias[$i]['id'].'">'.$categorias[$i]['nombre'].'</a></li>';
//                 }
//             }
//         }
//         return $html;
//     }
// }

if ( ! function_exists('getFrontBreadProd'))
{
    /**
     * Crea en breadcrumb de categorias y productos detalles
     *
     */
    function getFrontBreadProd($titulo = array()){
        $CI =& get_instance();
        $url_category = $CI->uri->segment(2,0);
        $id = substr(strrchr($url_category,'-'),1);
        $id_cat = $CI->uri->segment(3,0);
        // var_dump($id_cat);exit();
        // $getcategoriasMCategorias="";
        // $getcategoriasTCategorias="";
        $getcategoriasMCategorias=getcategoriasMT(2);
        $getcategoriasTCategorias=getcategoriasMT(3);
        // var_dump($getcategoriasMCategorias['nombre']);exit();
        $html = '';
        if ($id == '') {
            $html .= '<li class="active">Categorías</li>';
        }else{
              
            $html = '<li><a href="productos">Categorias</a></li>';
            if($id_cat=='0' || $id_cat===$getcategoriasMCategorias['nombre'] || $id_cat===$getcategoriasTCategorias['nombre']){
                // var_dump('entro');exit();
                $array = getCategoryProduct($id);
                $count = count($array);
                for ($i=0; $i < $count; $i++) { 
                    if ($i+1 == $count) {
                        //Entro a subcategoria
                        $html .= '<li class="active">'.$array[$i]['nombre'].'</li>';
                    } else {
                        // Entro a productos
                        // nombre de la subcategoria
                        $html .= '<li><a href="productos/'.$array[$i]['url'].'-'.$array[$i]['id'].'">'.$array[$i]['nombre'].'</a></li>';
                    }
                }
            } else {
                //Entra a detalle del producto
                $array1 = getProducto($id);
                $id=$array1[0]['categoria_id'];
                $array=getCategoryProduct($id);
                $count=count($array);
                // if($count>1){
                    //Detalle del producto
                    for ($i=0; $i < $count; $i++) {
                        if ($i+1 == $count) {
                            // nombra su categoria y el nombre del producto 
                            $html .= '<li><a href="productos/'.$array[$i]['url'].'-'.$array[$i]['id'].'">'.$array[$i]['nombre'].'</a></li>';
                            $html .= '<li class="active">'.$array1[0]['nombre'].'</li>';
                        } 
                        else {
                            //lista los nombres d las categorias padres
                            $html .= '<li><a href="productos/'.$array[$i]['url'].'-'.$array[$i]['id'].'">'.$array[$i]['nombre'].'</a></li>';
                        }
                    }

                // }else{
                //     var_dump('<pre>','entro5');exit();
                //     // Editar producto sin subcategoria
                //     for ($i=0; $i < $count; $i++) {
                //         $html .= '<li><a href="productos/'.$id_cat.'">'.$array[$i]['nombre'].'</a></li>';
                //         $html.= '<li class="active"><a>'.$array[$i]['nombre'].'</a></li>';//cambios de titulo
                //     }
                // }

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
                ->select(['id','nombre','padre_id','url'])
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

if ( ! function_exists('getProducto'))
{
    function getProducto($id){
        $CI =& get_instance();
        $query = $CI->db
                ->select(['id','nombre','url','categoria_id'])
                ->from('productos')
                ->where('estado !=', _ELIMINADO)
                ->where('id',$id)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);

    }
}

if ( ! function_exists('getCantidadItem'))
{
    function getCantidadItem(){
        $CI =& get_instance();
        $query = $CI->session->userdata('carrito_items');
            $item=count($query);
        return $item;
    }
}

    if ( ! function_exists('getCategoriaDestacadas'))
    {
        function getCategoriaDestacadas(){
            $CI =& get_instance();
            $query = $CI->db
                    ->select('*')
                    ->from('categorias')
                    ->where('estado',_ACTIVO)
                    ->where('destacado',1)
                    ->where('tipo_categoria_id',_CAT_PRODUCTO)
                    ->get()
                    ->result_array();
            // $path[] = $query;       
             return ( ! empty($query) && is_array($query) ? $query : []);
        }

    }

?>