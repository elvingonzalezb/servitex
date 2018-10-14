<?php
class Model_categorias extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	/*
	 * @Function que extrae la informacion de los cuadros que se muestran debajo del banner
	 */

    public function getCategorias($parent_id = _PARENT_ID) {
        $categories = array();
        $this->db->from('categorias');
        $this->db->where('padre_id', $parent_id);
        $this->db->where('estado', _ACTIVO);
        $this->db->where('tipo_categoria_id',_CAT_PRODUCTO);
        $result = $this->db->get()->result_array();
        for ($i=0; $i < count($result); $i++) { 
            $category = array();
            $category = $result[$i];
            $category['padre'] = (count($this->getCategorias($result[$i]['id']))>0)? '1':'0';
            $category['sub_categorias'] = $this->getCategorias($result[$i]['id']);
            $categories[$result[$i]['id']] = $category;

        }
        return $categories;
    }

	/*public function getCategorias($id_padre) {
        $this->db->where('estado', _ACTIVO);
        $this->db->where('padre_id', $id_padre);
        $this->db->where('tipo_categoria_id', _CAT_PRODUCTO);
        $this->db->order_by('orden','asc');
        $query =  $this->db->get('categorias');
        $resultado = $query->result_array();
        $categorias = array();
        foreach ($resultado as $value) {
        	$temp = array();
        	$temp['CATEGORIA_ID'] = $value['id'];
        	$temp['CATEGORIA_NOMBRE'] = $value['nombre'];
        	$temp['CATEGORIA_IMAGEN'] = $value['imagen'];
        	//$temp['CATEGORIA_BANNER'] = $value['banner'];
        	$temp['CATEGORIA_SUMILLA'] = $value['resumen'];
        	$temp['CATEGORIA_URL'] = $value['url'];
        	$temp['CATEGORIA_ORDEN'] = $value['orden'];
        	$temp['CATEGORIA_ESTADO'] = $value['estado'];
        	$temp['CATEGORIA_TITLE'] = $value['seo_title'];
        	$temp['CATEGORIA_DESCRIPTION'] = $value['seo_description'];
        	$temp['CATEGORIA_KEYWORDS'] = $value['seo_keywords'];

            $this->db->where('estado',_ACTIVO);
            $this->db->where('padre_id', $value['id']);
            $this->db->order_by('orden','asc');
            $this->db->where('tipo_categoria_id', _CAT_PRODUCTO);
            $qs = $this->db->get('categorias');
            $rs = $qs->result_array();
            $subcategorias = array();
            foreach ($rs as $vs) {
                $ts = array();
                $ts['SUBCATEGORIA_ID'] = $vs['id'];
                $ts['SUBCATEGORIA_NOMBRE'] = $vs['nombre'];
                $ts['SUBCATEGORIA_IMAGEN'] = $vs['imagen'];
                $ts['SUBCATEGORIA_URL'] = $vs['url'];
                $subcategorias[] = $ts;
            }

            $temp['CATEGORIA_SUBCATEGORIA'] = $subcategorias;

        	$categorias[] = $temp;
        }
        return $categorias;
    }*/

    public function getCategoria($url) {

        $url_absoluta = explode('/', $url);
        array_shift($url_absoluta);
        $url_categoria = implode('/', $url_absoluta);

        $this->db->where('estado', 'A');
        $this->db->where('url', $url_categoria);
        $this->db->order_by('orden', 'asc');
        $query = $this->db->get('categorias');
        $value = $query->row();
        $categoria = array();
        $categoria['CATEGORIA_ID'] = $value->id_categoria;
        $categoria['CATEGORIA_PADRE'] = $value->id_padre;
        $categoria['CATEGORIA_NOMBRE'] = $value->nombre_categoria;
        $categoria['CATEGORIA_IMAGEN'] = $value->imagen;
        $categoria['CATEGORIA_BANNER'] = $value->banner;
        $categoria['CATEGORIA_URL'] = $value->url;
        $categoria['CATEGORIA_ORDEN'] = $value->orden;
        $categoria['CATEGORIA_ESTADO'] = $value->estado;
        $categoria['CATEGORIA_TITLE'] = $value->title;
        $categoria['CATEGORIA_DESCRIPTION'] = $value->description;
        $categoria['CATEGORIA_KEYWORDS'] = $value->keywords;
        return $categoria;
    }

    public function getProductos($url) {
        $url_absoluta = explode('/', $url);
        array_shift($url_absoluta);
        $url_padre = implode('/', $url_absoluta);
        $data = array();

        $this->db->where('url', $url_padre);
        $q = $this->db->get('categorias');
        $r = $q->row();

        $this->db->where('id_padre', $r->id_categoria);
        $qc = $this->db->get('categorias');
        $rc = $qc->num_rows();

        if($rc == 0){
            $productos = array();
            $this->db->where('estado', 'A');
            $this->db->where('id_categoria', $r->id_categoria);
            $this->db->order_by('orden', 'asc');
            $query = $this->db->get('productos');
            $resultado = $query->result();
            foreach ($resultado as $value) {
                $temp = array();
                $temp['PRODUCTO_ID'] = $value->id_producto;
                $temp['PRODUCTO_NOMBRE'] = $value->nombre;
                $temp['PRODUCTO_CODIGO'] = $value->codigo;
                $temp['PRODUCTO_URL'] = $value->url;
                $temp['PRODUCTO_IMAGEN'] = $value->imagen;
                $productos[] = $temp;
            }
            $data['LISTA'] = $productos;
            $data['CUERPO'] = 'productos';
        }else{
            $categorias = array();
            $this->db->where('id_padre', $r->id_categoria);
            $this->db->where('estado', 'A');
            $this->db->order_by('orden', 'asc');
            $query = $this->db->get('categorias');
            $resultado = $query->result();
            foreach ($resultado as $value) {
                $temp = array();
                $temp['CATEGORIA_NOMBRE'] = $value->nombre_categoria;
                $temp['CATEGORIA_IMAGEN'] = $value->imagen;
                $temp['CATEGORIA_URL'] = $value->url;
                $categorias[] = $temp;
            }
            $data['LISTA'] = $categorias;
            $data['CUERPO'] = 'subcategorias';
        }
        return $data; 
    }

    public function _getProductosAll($per_page) {
        $productos = array();
        $this->db->where('estado', 'A');
        $this->db->order_by('orden', 'asc');
        $query = $this->db->get('productos', $per_page, $this->uri->segment(2));
        $resultado = $query->result();
        foreach ($resultado as $v) {
            $temp = array();
            $temp['PRODUCTO_ID'] = $v->id_producto;
            $temp['PRODUCTO_NOMBRE'] = $v->nombre;
            $temp['PRODUCTO_CODIGO'] = $v->codigo;
            $temp['PRODUCTO_URL'] = $v->url;
            $temp['PRODUCTO_IMAGEN'] = $v->imagen;
            $productos[] = $temp;
        }
        return $productos;
    }

    public function numProductos() {
        $query = $this->db->get("productos");
        return $query->num_rows();
    }

    public function getRelatedProducts($url, $limit) {
        $url_absoluta = explode('/', $url);
        array_shift($url_absoluta);
        array_pop($url_absoluta);
        $url_producto = implode('/', $url_absoluta);
        array_pop($url_absoluta);
        $url_padre = implode('/', $url_absoluta);
        $productos = array();
        $this->db->where('estado', 'A');
        $this->db->where('url !=', $url_producto);
        $this->db->like('url', $url_padre, 'after');
        $this->db->order_by('orden', 'asc');
        $this->db->limit($limit);
        $query = $this->db->get('productos');
        $resultado = $query->result();
        foreach ($resultado as $value) {
            $temp = array();
            $temp['RELATED_ID'] = $value->id_producto;
            $temp['RELATED_NOMBRE'] = $value->nombre;
            $temp['RELATED_CODIGO'] = $value->codigo;
            $temp['RELATED_URL'] = $value->url;
            $temp['RELATED_IMAGEN'] = $value->imagen;
            $productos[] = $temp;
        }
        return $productos; 
    }

    public function getProducts($limit) {
        $productos = array();
        $this->db->where('id_padre', 0);
        $qc = $this->db->get('categorias');
        $rc = $qc->result();
        foreach ($rc as $value) {
            $this->db->where('estado', 'A');
            $this->db->where('oferta', 'Si');
            $this->db->like('url', $value->url, 'after');
            $this->db->order_by('orden', 'asc');
            $this->db->limit($limit);
            $query = $this->db->get('productos');
            $resultado = $query->result();
            foreach ($resultado as $v) {
                $temp = array();
                $temp['PRODUCTO_ID'] = $v->id_producto;
                $temp['URL_CATEGORIA'] = $value->url;
                $temp['PRODUCTO_NOMBRE'] = $v->nombre;
                $temp['PRODUCTO_CODIGO'] = $v->codigo;
                $temp['PRODUCTO_URL'] = $v->url;
                $temp['PRODUCTO_IMAGEN'] = $v->imagen;
                $temp['PRODUCTO_PRECIO'] = $v->precio;
                $temp['PRODUCTO_PRECIO_OFERTA'] = $v->precio_oferta;

                if($v->oferta == 'Si'){
                    $temp['HIDDEN_SPECIAL_PRICE'] = '';
                    $temp['OLD_PRICE'] = 'old-price';
                    $temp['SPECIAL_PRICE'] = 'special-price';
                } else {
                    $temp['HIDDEN_SPECIAL_PRICE'] = 'hidden';
                    $temp['OLD_PRICE'] = 'special-price';
                    $temp['SPECIAL_PRICE'] = 'old-price';
                }

                $productos[] = $temp;
            }
        }
        return $productos;
    }

    public function getProductsOfert() {
        $productos = array();
        $this->db->where('id_padre', 0);
        $qc = $this->db->get('categorias');
        $rc = $qc->result();
        foreach ($rc as $value) {
            $this->db->where('estado', 'A');
            $this->db->where('oferta', 'Si');
            $this->db->like('url', $value->url, 'after');
            $this->db->order_by('orden', 'asc');
            $query = $this->db->get('productos');
            $resultado = $query->result();
            foreach ($resultado as $v) {
                $temp = array();
                $temp['PRODUCTO_ID'] = $v->id_producto;
                $temp['URL_CATEGORIA'] = $value->url;
                $temp['PRODUCTO_NOMBRE'] = $v->nombre;
                $temp['PRODUCTO_CODIGO'] = $v->codigo;
                $temp['PRODUCTO_URL'] = $v->url;
                $temp['PRODUCTO_IMAGEN'] = $v->imagen;
                $temp['PRODUCTO_PRECIO'] = $v->precio;
                $temp['PRODUCTO_PRECIO_OFERTA'] = $v->precio_oferta;

                if($v->oferta == 'Si'){
                    $temp['HIDDEN_SPECIAL_PRICE'] = '';
                    $temp['OLD_PRICE'] = 'old-price';
                    $temp['SPECIAL_PRICE'] = 'special-price';
                } else {
                    $temp['HIDDEN_SPECIAL_PRICE'] = 'hidden';
                    $temp['OLD_PRICE'] = 'special-price';
                    $temp['SPECIAL_PRICE'] = 'old-price';
                }
                $productos[] = $temp;
            }
        }
        return $productos;
    }

    public function getProductosNuevos($limit) {
        $query =  $this->db
                ->select(['p.*','g.imagen','g.imagen_title'])
                ->from('productos p')
                ->join('galeria_productos g', 'g.producto_id = p.id','inner')
                ->order_by('p.creado','desc')
                ->where('p.estado', _ACTIVO)
                ->group_by('p.id')
                ->limit($limit)
                ->get()
                ->result_array();
        return $query;
       /* $productos = array();
        $this->db->where('estado', _ACTIVO);
        //$this->db->where('novedad', 'Si');
        $this->db->limit($limit);
        $this->db->order_by('fecha_ingreso', 'asc');
        $query = $this->db->get('productos');
        $resultado = $query->result();
        foreach ($resultado as $value) {
            $temp = array();
            $temp['NEW_ID'] = $value->id_producto;
            $temp['NEW_NOMBRE'] = $value->nombre;
            $temp['NEW_CODIGO'] = $value->codigo;
            $temp['NEW_URL'] = $value->url;
            $temp['NEW_IMAGEN'] = $value->imagen;
            $productos[] = $temp;
        }
        return $productos;*/
    }

    public function getProductsRecent(){
        $productos = array();
        $this->db->where('estado', 'A');
        $this->db->order_by('orden', 'asc');
        $this->db->group_by('id_categoria, nombre, codigo, url, imagen');        
        $query = $this->db->get('productos');
        $resultado = $query->result();
        foreach ($resultado as $value) {
            $temp = array();
            $temp['RECENT_ID'] = $value->id_producto;
            $temp['RECENT_NOMBRE'] = $value->nombre;
            $temp['RECENT_CODIGO'] = $value->codigo;
            $temp['RECENT_PRECIO_MOSTRAR'] = $value->precio;
            $temp['RECENT_PRECIO_OFERTA_MOSTRAR'] = $value->precio_oferta;
            if(trim($value->precio_oferta) != 0){
                $temp['RECENT_OFERTA'] = 'precio-old';
                $temp['RECENT_PRECIO_OFERTA_HIDDEN'] = '';
                $temp['RECENT_PRECIO'] = $value->precio_oferta;
            }else{
                $temp['RECENT_OFERTA'] = '';
                $temp['RECENT_PRECIO_OFERTA_HIDDEN'] = 'hidden-precio';
                $temp['RECENT_PRECIO'] = $value->precio;
            }
            $temp['RECENT_URL'] = $value->url;
            $temp['RECENT_IMAGEN'] = $value->imagen;
            $temp['RECENT_PESO'] = $value->peso;
            $temp['RECENT_STOCK'] = $value->stock;
            $productos[] = $temp;
        }
        return $productos;
    }

    public function getProductosDestacados($limit){
        $query =  $this->db
                ->select(['p.*','g.imagen','g.imagen_title'])
                ->from('productos p')
                ->join('galeria_productos g', 'g.producto_id = p.id','inner')
                ->order_by('p.orden','asc')
                ->where('p.estado', _ACTIVO)
                ->where('p.destacado', _ACTIVO)
                ->group_by('p.id')
                ->limit($limit)
                ->get()
                ->result_array();


        $productos = array();
       /* $this->db->where('estado', _ACTIVO);
        $this->db->where('destacado', _ACTIVO);
        $this->db->limit($limit);
        $this->db->order_by('orden', 'asc');
        $query = $this->db->get('productos');
        $resultado = $query->result_array();*/
        /*foreach ($resultado as $value) {
            $temp = array();
            $temp['TOP_ID'] = $value['id'];
            $temp['TOP_NOMBRE'] = $value['nombre'];
            $temp['TOP_CODIGO'] = $value['codigo'];
            $temp['TOP_URL'] = $value['url'];
            $temp['TOP_IMAGEN'] = $value['imagen'];*/
            /*
            $temp['TOP_PRECIO_MOSTRAR'] = $value->precio;
            $temp['TOP_PRECIO_OFERTA_MOSTRAR'] = $value->precio_oferta;
            if(trim($value->precio_oferta) != 0){
                $temp['TOP_OFERTA'] = 'precio-old';
                $temp['TOP_PRECIO_OFERTA_HIDDEN'] = '';
                $temp['TOP_PRECIO'] = $value->precio_oferta;
            }else{
                $temp['TOP_OFERTA'] = '';
                $temp['TOP_PRECIO_OFERTA_HIDDEN'] = 'hidden-precio';
                $temp['TOP_PRECIO'] = $value->precio;
            }
            $temp['TOP_PESO'] = $value->peso;
            $temp['TOP_STOCK'] = $value->stock;
            */
            //$productos[] = $temp;
        //}
        return $query;
    }

    public function getProductosOfertas(){
        $query =  $this->db
                ->select(['p.*','g.imagen','g.imagen_title'])
                ->from('productos p')
                ->join('galeria_productos g', 'g.producto_id = p.id','inner')
                ->order_by('p.orden','asc')
                ->where('p.estado', _ACTIVO)
                ->where('p.oferta', 1)
                ->group_by('p.id')
                ->get()
                ->result_array();
        $productos = array();
        return $query;
    }

    public function getProducto($url){
        $temp = explode('/', $url);
        array_shift($temp);
        array_pop($temp);
        $url_producto = implode('/', $temp);

        $this->db->where('url', $url_producto);
        $query = $this->db->get("productos");
        $value = $query->row();

        $this->db->where('id_producto', $value->id_producto);
        $this->db->order_by('orden', 'asc');
        $query = $this->db->get('foto_prod');
        $resultado = $query->result();
        $fotos = array();
        foreach ($resultado as $foto) {
            $temp = array();
            $temp['FOTO_IMAGEN'] = $foto->foto;
            $fotos[] = $temp;
        }

        $this->db->where('id_categoria', $value->id_categoria);
        $qc = $this->db->get('categorias');
        $vc = $qc->row();

        $lista_id = array();
        $this->db->where('id_producto', $value->id_producto);
        $this->db->where('orden', 1);
        $query = $this->db->get('foto_prod');
        $foto_principal = $query->row();

        if($value->oferta == 'Si'){
            $hidden_special_price = '';
            $old_price = 'old-price';
            $special_price = 'special-price';
        } else {
            $hidden_special_price = 'hidden';
            $old_price = 'special-price';
            $special_price = 'old-price';
        }

        $tags = array();
        $this->db->where('id_producto' , $value->id_producto);
        $qp = $this->db->get('productos_x_tags');
        $rp = $qp->result();
        foreach ($rp as $vp) {
            $temp = array();
            $temp['TAG_ID'] = $vp->id_tag;
            $this->db->where('id_tag', $vp->id_tag);
            $qt = $this->db->get('tags');
            $rt = $qt->row();
            $temp['TAG_NOMBRE'] = $rt->titulo;
            $temp['TAG_URL'] = $rt->url;
            $temp['TAG_TITLE'] = $rt->title;
            $temp['TAG_KEYWORDS'] = $rt->keywords;
            $temp['TAG_DESCRIPTION'] = $rt->description;
            $tags[] = $temp;
        }

        $producto = array(
            'PRODUCTO_ID' => $value->id_producto,
            'PRODUCTO_NOMBRE' => $value->nombre,
            'PRODUCTO_DESCRIPCION' => $value->descripcion,
            'PRODUCTO_IMAGEN' => $value->imagen,
            'PRODUCTO_PRECIO' => $value->precio,
            'PRODUCTO_PRECIO_OFERTA' => $value->precio_oferta,
            'PRODUCTO_OLD_PRICE' => $old_price,
            'PRODUCTO_SPECIAL_PRICE' => $special_price,
            'PRODUCTO_HIDDEN_PRICE' => $hidden_special_price,
            'PRODUCTO_TALLA' => $value->talla,
            'PRODUCTO_HIDDEN_TALLA' => $hidden_talla,
            'PRODUCTO_CODIGO' => $value->codigo,
            'PRODUCTO_URL' => $value->url,
            'PRODUCTO_PESO' => $value->peso,
            'PRODUCTO_STOCK' => $value->stock,
            'PRODUCTO_FECHA' => $value->fecha_ingreso,
            'PRODUCTO_TITLE' => $value->title,
            'PRODUCTO_DESCRIPTION' => $value->description,
            'PRODUCTO_KEYWORDS' => $value->keywords,
            'PRODUCTO_FOTO_PRINCIPAL' => $foto_principal->foto,
            'PRODUCTO_TITULO_PRINCIPAL' => $foto_principal->titulo,
            'PRODUCTO_THUMBS' => $fotos,
            'LISTA_ID' => implode('#', $lista_id),
            'NOMBRE_CATEGORIA' => $vc->nombre_categoria,
            'PRODUCTO_TAGS' => $tags
        );
        return $producto;
    }

    public function getMenu($id_padre) {
        $menu = '';
        $this->db->where('estado','A');
        $this->db->where('id_padre', $id_padre);
        $this->db->order_by('orden','asc');
        $query =  $this->db->get('categorias');
        $resultado = $query->result();
        $nums = $query->num_rows();
        if($nums > 0) {$menu .= '<ul class="list-block">';}
        foreach ($resultado as $value) {
            @$menu .= '<li><a href="productos/'.$value->url.'">'.$value->nombre_categoria.'</a>';
            @$menu .= $this->getMenu($value->id_categoria).'</li>';
        }
        if($nums > 0) {$menu .= '</ul>';}
        return $menu;
    }

    public function getMigajas($url){
        $migajas = array();
        $temp = explode('/', $url);
        for($i=(count($temp)-1); $i>0; $i--){
            $aux = $this->getCategoria($url);
            $url_migaja = 'productos/'.$aux['CATEGORIA_URL'];
            $migajas[$i] = ['MIGAJA_CATEGORIA' => $aux['CATEGORIA_NOMBRE'], 'MIGAJA_URL' => $url_migaja];
            $url_absoluta = explode('/', $url);
            array_pop($url_absoluta);
            $url = implode('/', $url_absoluta);
        }
        array_shift($migajas);
        $reversed = array_reverse($migajas);
        return $reversed;
    }

    public function _getMigajas($url){
        $migajas = array();
        $temp = explode('/', $url);
        array_pop($temp);
        array_pop($temp);
        $url_aux = implode('/', $temp);
        for($i=(count($temp)-1); $i>0; $i--){
            $aux = $this->getCategoria($url_aux);
            $url_migaja = 'productos/'.$aux['CATEGORIA_URL'];
            $migajas[$i] = ['MIGAJA_CATEGORIA' => $aux['CATEGORIA_NOMBRE'], 'MIGAJA_URL' => $url_migaja];
            $url_absoluta = explode('/', $url_aux);
            array_pop($url_absoluta);
            $url_aux = implode('/', $url_absoluta);
        }
        $reversed = array_reverse($migajas);
        return $reversed;
    }    

    public function getProductoID($id_producto){
        $this->db->where('estado', 'A');
        $this->db->where('id_producto', $id_producto);
        $query = $this->db->get("productos");
        $resultado = $query->row();
        return $resultado;
    }

    public function getListaTags(){
        $tags = array();
        $qt = $this->db->get('tags');
        $rt = $qt->result();
        foreach ($rt as $vt) {
            $temp = array();
            $temp['TAG_ID'] = $vt->id_tag;
            $temp['TAG_NOMBRE'] = $vt->titulo;
            $temp['TAG_URL'] = $vt->url;
            $temp['TAG_TITLE'] = $vt->title;
            $temp['TAG_KEYWORDS'] = $vt->keywords;
            $temp['TAG_DESCRIPTION'] = $vt->description;
            $tags[] = $temp;
        }
        return $tags;
    }

    public function getTag($url){
        $this->db->where('url', $url);
        $query =  $this->db->get('tags');
        return $query->row();        
    }

    public function getProductsTag($id_tag){
        $productos = array();
        $this->db->where('id_tag', $id_tag);
        $q = $this->db->get('productos_x_tags');
        $r = $q->result();
        foreach ($r as $value) {
            $temp = array();
            $producto = $this->getProductoID($value->id_producto);
            if($producto){
                $temp['PRODUCTO_ID'] = $producto->id_producto;
                $temp['PRODUCTO_NOMBRE'] = $producto->nombre;
                $temp['PRODUCTO_CODIGO'] = $producto->codigo;
                $temp['PRODUCTO_URL'] = $producto->url;
                $temp['PRODUCTO_IMAGEN'] = $producto->imagen;
                $temp['PRODUCTO_PRECIO'] = $producto->precio;
                $temp['PRODUCTO_PRECIO_OFERTA'] = $producto->precio_oferta;
                if($producto->oferta == 'Si'){
                    $temp['HIDDEN_SPECIAL_PRICE'] = '';
                    $temp['OLD_PRICE'] = 'old-price';
                    $temp['SPECIAL_PRICE'] = 'special-price';
                } else {
                    $temp['HIDDEN_SPECIAL_PRICE'] = 'hidden';
                    $temp['OLD_PRICE'] = 'special-price';
                    $temp['SPECIAL_PRICE'] = 'old-price';
                }
                $productos[] = $temp;    
            }
        }
        return $productos;
    }

    /*
    public function getListaFiltros(){
        $atributos = array();
        $qa = $this->db->get('atributos');
        $ra = $qa->result();
        foreach ($ra as $va) {
            $tempa = array();
            $tempa['ATRIBUTO_NOMBRE'] = $va->nombre_atributo;
            $this->db->where('id_atributo', $va->id_atributo);
            $qf = $this->db->get('filtros');
            $rf = $qf->result();
            $filtros = array();
            foreach ($rf as $vf) {
                $tempf = array();
                $tempf['FILTRO_ID'] = $vf->id_filtro;
                $tempf['FILTRO_NOMBRE'] = $vf->nombre_filtro;
                $tempf['FILTRO_URL'] = $vf->url_filtro;
                $filtros[] = $tempf;
            }
            $tempa['ATRIBUTO_FILTROS'] = $filtros;
            $atributos[] = $tempa;
        }
        return $atributos;
    }

    public function _getFiltro($id_filtro){
        $this->db->where('id_filtro', $id_filtro);
        $query =  $this->db->get('filtros');
        return $query->row();        
    }

    public function getFiltro($url){
        $this->db->where('url_filtro', $url);
        $query =  $this->db->get('filtros');
        return $query->row();        
    }

    public function _getListaFiltros($id_producto){
        $filtros = array();
        $this->db->where('id_producto', $id_producto);
        $query = $this->db->get('filtros_x_productos');
        $resultado = $query->result();
        foreach ($resultado as $v) {
            $temp = array();
            $filtro = $this->_getFiltro($v->id_filtro);
            $temp['FILTRO_ID'] = $filtro->id_filtro;
            $temp['FILTRO_NOMBRE'] = $filtro->nombre_filtro;
            $temp['FILTRO_URL'] = $filtro->url_filtro;
            $filtros[] = $temp;
        }
        return $filtros;
    }

    public function getProductsFilters($id_filtro){
        $productos = array();
        $this->db->where('id_filtro', $id_filtro);
        $q = $this->db->get('filtros_x_productos');
        $r = $q->result();
        foreach ($r as $value) {
            $temp = array();
            $producto = $this->getProductoID($value->id_producto);
            if($producto){
                $temp['PRODUCTO_ID'] = $producto->id_producto;
                $temp['PRODUCTO_NOMBRE'] = $producto->nombre;
                $temp['PRODUCTO_CODIGO'] = $producto->codigo;
                $temp['PRODUCTO_PRECIO_MOSTRAR'] = $producto->precio;
                $temp['PRODUCTO_PRECIO_OFERTA_MOSTRAR'] = $producto->precio_oferta;
                if(trim($producto->precio_oferta) != 0){
                    $temp['PRODUCTO_OFERTA'] = 'precio-old';
                    $temp['PRODUCTO_PRECIO_OFERTA_HIDDEN'] = '';
                    $temp['PRODUCTO_PRECIO'] = $producto->precio_oferta;
                }else{
                    $temp['PRODUCTO_OFERTA'] = '';
                    $temp['PRODUCTO_PRECIO_OFERTA_HIDDEN'] = 'hidden-precio';
                    $temp['PRODUCTO_PRECIO'] = $producto->precio;
                }
                $temp['PRODUCTO_URL'] = $producto->url;
                $temp['PRODUCTO_IMAGEN'] = $producto->imagen;
                $temp['PRODUCTO_PESO'] = $producto->peso;
                $temp['PRODUCTO_STOCK'] = $producto->stock;
                $productos[] = $temp;    
            }
        }
        return $productos;
    }
    */
    public function getResult($search) {
        $productos = array();
        $this->db->where('estado', 'A');
        $this->db->like('nombre', $search);
        $this->db->group_by('id_categoria, nombre, codigo, url, imagen');
        $this->db->order_by('orden', 'asc');
        $query = $this->db->get('productos');
        $resultado = $query->result();
        foreach ($resultado as $v) {
            $temp = array();
            $temp['PRODUCTO_ID'] = $v->id_producto;
            $temp['PRODUCTO_NOMBRE'] = $v->nombre;
            $temp['PRODUCTO_CODIGO'] = $v->codigo;
            $temp['PRODUCTO_URL'] = $v->url;
            $temp['PRODUCTO_IMAGEN'] = $v->imagen;
            $productos[] = $temp;
        }
        return $productos;
    }

    /*
    public function getListaTallas($id_producto){
        $tallas = array();
        $this->db->where('id_producto', $id_producto);
        $q = $this->db->get('productos');
        $r = $q->row();
        $this->db->where('url', $r->url);
        $qp = $this->db->get('productos');
        $rp = $qp->result();
        foreach ($rp as $value) {
            $temp = array();
            $temp['ID_PRODUCTO'] = $value->id_producto;
            $temp['STOCK'] = $value->stock;
            $temp['TALLA'] = $value->talla;
            $tallas[] = $temp; 
        }
        return $tallas;
    }

    public function updateStock($id_producto, $cantidad){

        $this->db->where('id_producto', $id_producto);
        $query = $this->db->get('productos');
        $resultado = $query->row();

        $stock = $resultado->stock;

        $stock_actual = $stock-$cantidad;

        $data = array('stock' => $stock_actual);
        $this->db->where('id_producto', $id_producto);
        $this->db->update('productos', $data);
    }

    public function restoreStock($id_producto, $cantidad){
        $this->db->where('id_producto', $id_producto);
        $query = $this->db->get('productos');
        $resultado = $query->row();

        $stock_actual = $resultado->stock;
        $restore_stock = $stock_actual+$cantidad;

        $data = array('stock' => $restore_stock);
        $this->db->where('id_producto', $id_producto);
        $this->db->update('productos', $data);
    }
    */
    
    public function sendSolicitud($datos){
        $resultado = $this->db->insert('solicitud_informacion', $datos);
        return $resultado;
    }

    public function getCategoriaDestacadas(){
        $query =  $this->db
                ->select('*')
                ->from('categorias')
                ->where('estado',_ACTIVO)
                ->where('destacado',1)
                ->where('tipo_categoria_id',_CAT_PRODUCTO)
                ->get()
                ->row_array();

        return ( ! empty($query) && is_array($query) ? $query : []);
    }

}
?>