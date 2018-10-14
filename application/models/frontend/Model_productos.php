<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_productos extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	#--------
	# GET
	#--------
	public function getCategoriaById($id){
		$query =  $this->db
				->select('*')
				->from('categorias')
				->where('estado',_ACTIVO)
				->where('id',$id)
				->where('tipo_categoria_id',_CAT_PRODUCTO)
				->get()
				->row_array();

		return ( ! empty($query) && is_array($query) ? $query : []);
    }
    
	#TRAE lAS  CATEGORIAS  POR EL ID DE SU PADRE CON LA URL CONCATENADA A SU ID
	public function getVariosCategory($id){
		$query = $this->db
			->select('*,imagen,imagen_title, CONCAT_WS(\'-\',url,id) as url')
			->from('categorias')
			->order_by('orden','asc')
			->where('estado',_ACTIVO)
			->where('tipo_categoria_id',_CAT_PRODUCTO)
			->where('padre_id',$id)
			->get()
			->result_array();

		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	#TRAE lAS  CATEGORIAS  POR EL ID DE SU PADRE CON LA URL CONCATENADA A SU ID
	public function getCategoryByParent($limit,$offset,$id){
		$query = $this->db
			->select('*,imagen,imagen_title, CONCAT_WS(\'-\',url,id) as url')
			->from('categorias')
			->order_by('orden','asc')
			->where('estado',_ACTIVO)
			->where('tipo_categoria_id',_CAT_PRODUCTO)
			->where('padre_id',$id)
			->limit($limit, $offset)
			->get()
			->result_array();

		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	// public function getProductById($id){
	// 	$query =  $this->db
	// 			->select([
	// 				'p.*',
	// 				'g.imagen',
	// 				'g.imagen_title',
	// 				"CONCAT('[',GROUP_CONCAT(CONCAT('{\"imagen\":\"', imagen,'\",','\"imagen_title\":\"', imagen_title,'\"', '}')),']') as imagenes",'p.categoria_id as categoria_id','s.precio as precio_atributo','s.precio_oferta as oferta_atributo'
	// 				])
	// 			->from('productos p')
	// 			->join('stock_atributos_multiples s','s.producto_id = p.id','left')
	// 			->join('galeria_productos g', 'g.producto_id = p.id','left')
	// 			->order_by('orden','desc')
	// 			->where('p.estado',_ACTIVO)
	// 			->where('p.id', $id )
	// 			->get()
	// 			->row_array();
	// 			// echo '<pre>';print_r($query);echo '</pre>';die;
	// 			if( ! empty($query) ){  $query['imagenes'] = json_decode($query['imagenes'], TRUE); }
			   	
	// 		   	if( ! empty($query['categoria_id'])){ 
 //                    $query['atributos'] = $this->Producto->atributo($query['categoria_id']); 
 //                    // $query['atributos_multiples'] = $this->Producto->atributoMultiple($query['categoria_id']); 
 //                }

	// 	return ( ! empty($query) && is_array($query) ? $query : []);
 //    }

	#TRAE EL EL PRODUCTO POR SU ID CON TODAS SUS IMAGENES
	public function getProductById($id){
		$query =  $this->db
				->select([
					'p.*',
					'g.imagen',
					'g.imagen_title',
					"CONCAT('[',GROUP_CONCAT(CONCAT('{\"imagen\":\"', imagen,'\",','\"imagen_title\":\"', imagen_title,'\"', '}')),']') as imagenes",'p.categoria_id as categoria_id'
					])
				->from('productos p')
				// ->join('stock_atributos_multiples s','s.producto_id = p.id','left')
				->join('galeria_productos g', 'g.producto_id = p.id','left')
				->order_by('orden','desc')
				->where('p.estado',_ACTIVO)
				->where('g.estado',_ACTIVO)
				->where('p.id', $id )
				->get()
				->row_array();
				// echo '<pre>';print_r($query);echo '</pre>';die;
				if( ! empty($query) ){  $query['imagenes'] = json_decode($query['imagenes'], TRUE); }
			   	
			   	if( ! empty($query['id'])){ 
                    $query['atributos'] = $this->Producto->atributo($query['id']); 
                    // $query['atributos_multiples'] = $this->Producto->atributoMultiple($query['categoria_id']); 
                }

		return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function atributo($id){
    	$query = $this->db
    			->select('precio, precio_oferta')
    			->from('stock_atributos_multiples')
    			->where('producto_id',$id)
    			->where('estado',_ACTIVO)
    			->get()
    			->result_array();

    	return ( ! empty($query) && is_array($query) ? $query : []);
    }



    //revisar
 //    public function getProductosByCategory( $id ){
 //        $query =  $this->db
	// 			->select(['p.*','p.nombre','p.id','g.imagen','g.imagen_title','CONCAT(CONCAT_WS(\'-\',p.url,p.id),\'/detalle\') as url'])
	// 			->from('productos p')
	// 			->join('galeria_productos g', 'g.producto_id = p.id','inner')
	// 			->order_by('orden','desc')
	// 			->where('p.estado !=',_ELIMINADO)
	// 			->where('p.categoria_id ', $id )
	// 			->group_by('p.id' )
	// 			->get()
	// 			->result_array();
	// 	return ( ! empty($query) && is_array($query) ? $query : []);
	// }

	 //revisar
    public function getProductosByCategory( $limit,$offset,$id ){
        $query =  $this->db
				->select(['p.*','p.nombre','p.id','g.imagen','g.imagen_title','CONCAT(CONCAT_WS(\'-\',p.url,p.id),\'/detalle\') as url','c.nombre as nombre_categoria'])
				->from('productos p')
				->join('galeria_productos g', 'g.producto_id = p.id','inner')
				->join('categorias c', 'p.categoria_id = c.id','left')
				->order_by('orden','desc')
				->where('p.estado',_ACTIVO)
				->where('g.estado',_ACTIVO)
				->where('p.categoria_id ', $id )
				->limit($limit, $offset)
				->group_by('p.id' )
				->get()
				->result_array();
		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	#old
	public function getCategoriaPorTipo($id){
		$query = $this->db
				->select('*')
				->from('categorias')
				->order_by('orden','asc')
				->where('estado',_ACTIVO)
				->where('tipo_categoria_id',_CAT_PRODUCTO)
				->where('padre_id',$id)
				->get()
				->result_array();
		for ($i=0; $i < count($query); $i++) { 
			$query[$i]['numero_categorias'] = $this->getNumCategory($query[$i]['id']);
			$query[$i]['sub_categoria'] = $this->getCategoryTreeForParentId($query[$i]['id']);
		}

		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	public function getCategoriaMerchandising($id){
		$query = $this->db
				->select('*')
				->from('categorias')
				->order_by('orden','asc')
				->where('estado',_ACTIVO)
				->where('tipo_categoria_id',_CAT_PRODUCTO)
				->where('padre_id',$id)
				->get()
				->result_array();
		for ($i=0; $i < count($query); $i++) { 
			$query[$i]['numero_categorias'] = $this->getNumCategory($query[$i]['id']);
			$query[$i]['sub_categoria'] = $this->getCategoryTreeForParentId($query[$i]['id']);
		}

		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	public function getNumCategory($id){
		$query = $this->db
				->select('*')
				->from('categorias')
				->where('estado',_ACTIVO)
				->where('padre_id',$id)
				->where('tipo_categoria_id', _CAT_PRODUCTO)
				->get();
		return $query->num_rows();
	}

	public function getCategoryTreeForParentId($parent_id = 1) {
		$categories = array();
		$this->db->from('categorias');
		$this->db->where('padre_id', $parent_id);
		$this->db->where('estado', _ACTIVO);
		$this->db->where('tipo_categoria_id',_CAT_PRODUCTO);
		$result = $this->db->get()->result();
		foreach ($result as $mainCategory) {
			$category = array();
			$category['id'] = $mainCategory->id;
			$category['url'] = $mainCategory->url;
			$category['nombre'] = $mainCategory->nombre;
			$category['padre_id'] = $mainCategory->padre_id;
			$category['padre'] = (count($this->getCategoryTreeForParentId($category['id']))>0)? '1':'0';
			$category['sub_categorias'] = $this->getCategoryTreeForParentId($category['id']);
			$categories[$mainCategory->id] = $category;
		}
		return $categories;
	}

	public function getProductos(){
		$query =  $this->db
				->select(['p.*','p.nombre','p.id','g.imagen','g.imagen_title','CONCAT(CONCAT_WS(\'-\',p.url,p.id),\'/detalle\') as url'])
				//->distinct('p.id')
				->from('productos p')
				->join('galeria_productos g', 'g.producto_id = p.id','inner')
				->order_by('orden','desc')
				->where('p.estado',_ACTIVO)
				->group_by('p.id' )
				//->limit(1)
				->get()
				->result_array();

		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	public function getProductByCategory($limit,$offset,$id){

		$query =  $this->db
				->select(['p.*','c.categoria_id','g.imagen','g.imagen_title'])
				//->distinct('p.id')
				->from('productos p')
				->join('galeria_productos g', 'g.producto_id = p.id','inner')
				->order_by('orden','desc')
				->where('p.estado',_ACTIVO)
				->where('p.categoria_id', $id )
				->limit($limit, $offset)
				->group_by('p.id' )
				// ->limit(1)
				->get()
				->result_array();
		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	public function numProductos($id){
		$query = $this->db
				->select('id')
				->from('productos')
				->where('estado',_ACTIVO)
				->where('categoria_id', $id )
				->get();
		return $query->num_rows();
	}

	public function getProductosPorCategoria($id){
		$query =  $this->db
			->select(['p.*','p.nombre','p.id','g.imagen','g.imagen_title'])
			//->distinct('p.id')
			->from('productos p')
			->join('galeria_productos g', 'g.producto_id = p.id','inner')
			->order_by('orden','desc')
			->where('p.estado',_ACTIVO)
			->where('p.categoria_id', $id )
			->group_by('p.id' )
			//->limit(1)
			->get()
			->result_array();

		return ( ! empty($query) && is_array($query) ? $query : []);
	}


	public function getProductoPorCategoria($id){
		$query = $this->db
				->select('*')
				->from('categorias')
				->order_by('orden','asc')
				->where('estado',_ACTIVO)
				->where('tipo_categoria_id',_CAT_PRODUCTO)
				->where('padre_id',$id)
				->get()
				->result_array();
		for ($i=0; $i < count($query); $i++) { 
			$query[$i]['sub_categoria'] = $this->getCategoryTreeForParentId($query[$i]['id']);
		}
		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	public function getAtributos($id) {
		$query =  $this->db
				->select([
					's.id',
					's.producto_id',
					's.cantidad',
					's.precio',
					's.precio_oferta as precio_oferta', 
					"CONCAT('[' ,GROUP_CONCAT('{\"id\":\"',d.id,'\",\"nombre\":\"',d.nombre,'\",\"valor\":\"',d.valor,'\",\"atributo\":\"',(SELECT nombre FROM atributos WHERE id=d.atributo_id AND estado=1),'\"}'),']') AS atributos"
					])
				->from('stock_atributos_multiples s')
				->join('detalle_atributos d', 'FIND_IN_SET(d.id, REPLACE(s.atributos,"#",","))','left')
				->where('s.estado',_ACTIVO)
				->where('s.producto_id', $id )
				->group_by('s.id' )
				->get()
				->result_array();
				for ($i=0; $i < count($query); $i++) { 
					$query[$i]['atributos'] = json_decode($query[$i]['atributos'], TRUE);
			}
		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	public function getStockAtributo($atributo_id, $producto_id) {
		$query = $this->db
				->select('id,precio,precio_oferta,cantidad,atributos_nombres')
				->from('stock_atributos_multiples')
				->where('estado', _ACTIVO)
				->where('id',$atributo_id)
				->where('producto_id',$producto_id)
				->get()
				->row_array();
		return $query;
	}

	public function saveSolicitudProductos( $data ){

		$this->db->insert('solicitud_productos', $data);
		return $this->db->insert_id();
	}

	public function buscarPorTexto($busqueda)
	{
	 	#SELECT REFERENCIA, TITULO 
	 	#FROM ARTICULOS 
	 	#WHERE VISIBLE =1 AND DESARROLLO LIKE '%$busqueda%' OR TITULO LIKE '%$busqueda%' LIMIT 50
		$query =  $this->db
				->select('p.id,p.nombre,p.resumen,g.imagen,CONCAT(CONCAT_WS(\'-\',p.url,p.id),\'/detalle\') as url')
				//->select('id,nombre,resumen,url')
				->from('productos p')
				->join('galeria_productos g', 'g.producto_id = p.id','left')
				->where('p.estado',_ACTIVO)
				->where('g.estado',_ACTIVO)
				->where("p.nombre LIKE '%".$busqueda."%' OR p.resumen LIKE '%".$busqueda."%'")
				->limit(50)
				->group_by('p.id' )
				->get()
				->result_array();
		return $query;
	}

	public function buscarVariasPalabras($busqueda)
	{
		#SELECT REFERENCIA, TITULO , MATCH ( TITULO, DESARROLLO ) AGAINST ( '$busqueda' ) AS Score 
		#FROM ARTICULOS WHERE MATCH ( TITULO, DESARROLLO ) AGAINST ( '$busqueda' ) ORDER BY Score DESC LIMIT 50
		$query =  $this->db
				->select("p.id,p.nombre,p.resumen,g.imagen,CONCAT(CONCAT_WS('-',p.url,p.id),'/detalle') as url,MATCH ( p.nombre, p.resumen ) AGAINST ( '%".$busqueda."%' ) AS Score")
				->from('productos p')
				->join('galeria_productos g', 'g.producto_id = p.id','left')
				->where("MATCH ( p.nombre, p.resumen ) AGAINST ( '%".$busqueda."% IN BOOLEAN MODE' )")
				->where('p.estado',_ACTIVO)
				->where('g.estado',_ACTIVO)
				->order_by('Score','DESC')
				->limit(50)
				->group_by('p.id' )
				->get()
				->result_array();
		return $query;

	}

    public function getMigajas($id, $tipo){
        
    	$migaja = '';

        if($tipo=='subcategorias'){

        	$categoria = $this->db->where('id', $id)->get('categorias')->row_array();

        	if($categoria['padre_id'] != 1) {

				$migaja .= '<li><a href="productos/'.$categoria['url'].'-'.$categoria['id'].'">'.$categoria['nombre'].'</a></li>';
        		$padre_id = $categoria['padre_id'];
        		$migaja .= $this->getMigajas($padre_id, 'subcategorias');

        	} else {

        		$migaja .= '<li class="active">'.$categoria['nombre'].'</li>';

        	}

        }elseif($tipo=='productos'){

        	$producto = $this->db->where('id', $id)->get('productos')->row_array();
        	$id_categoria = $producto['categoria_id'];

        	$categoria = $this->db->where('id', $id_categoria)->get('categorias')->row_array();

        	if($categoria['padre_id'] != 1) {

				$migaja .= '<li><a href="productos/'.$categoria['url'].'-'.$categoria['id'].'">'.$categoria['nombre'].'</a></li>';
        		$padre_id = $categoria['padre_id'];
        		$migaja .= $this->getMigajas($padre_id, 'subcategorias');

        	} else {
        		$migaja .= '<li><a href="productos/'.$categoria['url'].'-'.$categoria['id'].'">'.$categoria['nombre'].'</a></li>';
        	}

        	$migaja .= '<li class="active">'.$producto['nombre'].'</li>';

        }

        return $migaja;

        //array_shift($migajas);
        //$reversed = array_reverse($migajas);
        //return $reversed;
    }

     public function getProductosOferta( $limit,$offset ){
        $query =  $this->db
				->select(['p.*','p.nombre','p.id','g.imagen','g.imagen_title','CONCAT(CONCAT_WS(\'-\',p.url,p.id),\'/detalle\') as url'])
				->from('productos p')
				->join('galeria_productos g', 'g.producto_id = p.id','inner')
				->order_by('orden','desc')
				->where('p.estado',_ACTIVO)
				->where('g.estado',_ACTIVO)
				->where('p.oferta', 1)
				->limit($limit, $offset)
				->group_by('p.id' )
				->get()
				->result_array();
		return ( ! empty($query) && is_array($query) ? $query : []);
	}

	public function numProductosOfertas(){
		$query = $this->db
				->select('id')
				->from('productos')
				->where('estado',_ACTIVO)
				->where('oferta', 1)
				->get();
		return $query->num_rows();
	}


}