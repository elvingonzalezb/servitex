<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_clientes extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function clienteLogin($correo, $password) {
		$this->db->select('password');
		$this->db->from('clientes');
		$this->db->where('correo', $correo);
		$hash = $this->db->get()->row('password');
		return $this->verifyPasswordHash($password, $hash);
	}

	public function cambiarPassCliente($id, $password) {
		$this->db->select('password');
		$this->db->from('clientes');
		$this->db->where('id', $id);
		$hash = $this->db->get()->row('password');
		return $this->verifyPasswordHash($password, $hash);
	}
	#--------
	# GET
	#--------
	public function getClienteByKey($key, $valor, $estado) {
		$query = $this->db
				->select('*')
				->from('clientes')
				->where($key , $valor)
				->where('estado', $estado)
				->get()
				->row_array();
		return $query;
	}

	public function getEstadoById($id) {
		$query = $this->db
				->select('*')
				->from('estados')
				->where('id' , $id)
				->get()
				->row_array();
		return $query;
	}

	public function getPaisById($id) {
		$query = $this->db
			->select('*')
			->from('paises')
			->where('id' , $id)
			->get()
			->row_array();
		return $query;
	}
	public function getPedidos($limit, $offset ,$cliente_id){
		$query = $this->db
				->select('*')
				->from('carritos')
				->where('cliente_id' , $cliente_id)
				->limit($limit, $offset)
				->get()
				->result_array();
		return $query;
	}
	public function numPedidos($cliente_id){
		$query = $this->db
				->select('*')
				->from('carritos')
				->where('cliente_id' , $cliente_id)
				->get()
				->num_rows();
		return $query;
	}
	public function getDetallePedido($id, $cliente_id){
		$query =  $this->db
				->select([
					'c.*',
					"CONCAT('[',GROUP_CONCAT('{\"id\":\"',d.id,'\",\"nombre\":\"',d.nombre,'\",\"imagen\":\"',d.imagen,'\",\"cantidad\":\"',d.cantidad,'\",\"precio\":\"',d.precio,'\",\"subtotal\":\"',d.subtotal,'\",\"atributo\":\"',IF(d.atributo_id IS NULL OR d.atributo_id = '', '', (SELECT atributos_nombres FROM stock_atributos_multiples s 
	WHERE s.id=d.atributo_id)),'\"}'),']') AS detalles"
					])
				->from('carritos c')
				->join('carro_detalle d', 'c.id = d.carrito_id','left')
				->where('c.cliente_id',$cliente_id)
				->where('c.id', $id )
				->get()
				->row_array();
				//echo '<pre>';print_r($query);echo '</pre>';die;
			if( ! empty($query) ){  $query['detalles'] = json_decode($query['detalles'], TRUE); }

		return ( ! empty($query) && is_array($query) ? $query : []);
	}
	/*public function getClienteByCorreo($correo) {
		$query = $this->db
				->select('id,nombres,apellidos,correo')
				->from('clientes')
				->where('correo', $correo)
				->where('estado', _ACTIVO)
				->get()
				->row_array();
		return $query;
	}
	public function getClienteById($id) {
		$query = $this->db
				->select('*')
				->from('clientes')
				->where('id', $id)
				->where('estado', _ACTIVO)
				->get()
				->row_array();
		return $query;
	}*/
	#--------
	# UPDATE
	#--------
	public function updateCliente($id,$data) {
		$query = $this->db
			->where('id', $id)
			->update('clientes', $data);
		return $query;
	}
	#--------
	# INSERT
	#--------
	public function saveCliente($data) {
		$query = $this->db->insert('clientes', $data);
		return $query;
	}

	#--------
	# DELETE
	#--------

	public function hashPassword($password) {
		return password_hash($password, PASSWORD_BCRYPT);
	}

	public function verifyPasswordHash($password, $hash) {
		return password_verify($password, $hash);
	}
}