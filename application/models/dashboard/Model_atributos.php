<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_atributos extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	#--------
	# GET
	#--------
	public function getAtributoById($id){
		$query = $this->db
				->select('*')
				->from('atributos')
				->where('estado !=',_ELIMINADO)
				->where('id',$id)
				->get()
				->row_array();
		return $query;
	}
	public function getAtributos( ){
		$query = $this->db
				->select('*')
				->from('atributos')
				->where('estado',_ACTIVO)
				->get()
				->result_array();
		return $query;
	}

	public function getCategAtrib($id){
		$query = $this->db
				->select('atributos')
				->from('categorias')
				->where('estado',_ACTIVO)
				->where('id',$id)
				->get()
				->row_array();
		
		$atributos = explode('#',$query['atributos']);
		
		return $this->getAtributosAjax(array_unique($atributos));
	}

	public function getAtributosAjax($ids = array(1)){
		$query = $this->db
				->select('*')
				->from('atributos')
				->where('estado',_ACTIVO)
				->where_in('id',$ids)
				->get()
				->result_array();
		$atributo = array();
		for ($i=0; $i < count($query); $i++) { 
			$atributo[$i] = $query[$i];
			$atributo[$i]['detalle'] = $this->getDetalleAtributo($query[$i]['id']);
		}
		return $atributo;
	}

	public function getDetalleAtributo($id){
		$query = $this->db
				->select('id,nombre,descripcion,valor,atributo_id')
				->from('detalle_atributos')
				->where('estado',_ACTIVO)
				->where('atributo_id',$id)
				->get()
				->result_array();
		return $query;
	}

	public function getDetalleAtributoSoloColor($id_color,$id_solo_color){
		$query = $this->db
				->select('id,nombre,descripcion,valor,atributo_id')
				->from('detalle_atributos')
				->where('estado',_ACTIVO)
				->where('atributo_id',$id_color)
				->where('id',$id_solo_color)
				->get()
				->row_array();
		return $query;
	}

	public function getDetalleAtributoMultiple($id){
		$query = $this->db
				->select('id,atributos_nombres,cantidad,precio,precio_oferta,atributos')
				->from('stock_atributos_multiples')
				->where('estado',_ACTIVO)
				->where('producto_id',$id)
				->get()
				->result_array();
		$datos = array();
		for ($i=0; $i < count($query); $i++) { 
			$datos[$i] = $query[$i]['atributos_nombres']."│".str_replace("#",",",$query[$i]['atributos'])."│".$query[$i]['precio']."│".$query[$i]['precio_oferta']."│".$query[$i]['cantidad'];
		}
		$result['datos'] = implode("║", $datos);
		$result['query'] = $query;
		return $result;
	}
	public function getNumDetalleAtributo($id){
		$query = $this->db
				->from('detalle_atributos')
				->where('estado', _ACTIVO)
				->where('atributo_id',$id)
				->get();
		return $query->num_rows();
	}
	#--------
	# UPDATE
	#--------

	public function updateAtributo($id,$data){
		$query = $this->db
				->where('id', $id)
				->update('atributos', $data);
		return $query;
	}
	#funcion sujeta a updateAtributo() para el cambio de estado ajax.
	public function updateDetallesAtributo($id , $data)
	{
		$query = $this->db
				->where('atributo_id', $id)
				->update('detalle_atributos', $data);
		return $query;
	}

	public function updateDetalleAtributo($id , $data)
	{
		$query = $this->db
				->where('id', $id)
				->update('detalle_atributos', $data);
		return $query;
	}
	#--------
	# INSERT
	#--------

	public function saveMultipleAtributo($data){
		#grabacion de stock multiples de los productos
		if( empty($data) ){ return FALSE; }
		$query = $this->db->insert_batch('stock_atributos_multiples', $data);
		return $query;
	}

	public function saveAtributo($data){
		$this->db->insert('atributos', $data);
		return $this->db->insert_id();
	}

	public function saveDetalleAtributo($data)
	{
		$this->db->insert('detalle_atributos', $data);
		return $this->db->insert_id();
	}
	public function saveDetalleAtributoMultiple($data)
	{
		if( empty($data) ){ return FALSE; }
		$query = $this->db->insert_batch('detalle_atributos', $data);
		return $query;
	}

	public function saveDetalleAtributoColor($data)
	{	
		$this->db->insert('detalle_atributos', $data);
		return $this->db->insert_id();
	}
	#--------
	# DELETE
	#--------
	public function deleteMultipleAtributo($id){
		#eliminamos para volver agregar nuevos atributos
		$this->db->where('producto_id', $id);
		return $this->db->delete('stock_atributos_multiples');
	}
	#eliminado de uno por ajax
	public function deleteDetalleAtributo($id)
	{
		$query = $this->db
				->where('id', $id)
				->update('detalle_atributos', array('estado'=>_ELIMINADO));
		return $query;
	}

	public function deleteAtributo($id)
	{
		$query = $this->db
				->where('id', $id)
				->update('atributos', array('estado'=>_ELIMINADO));
		return $query;
	}
	#funcion sujeta a deleteAtributo()- para eliminar sus relaciones
	public function deleteDetallesAtributo($id)
	{
		$query = $this->db
				->where('atributo_id', $id)
				->update('detalle_atributos', array('estado'=>_ELIMINADO));
		return $query;
	}
}
