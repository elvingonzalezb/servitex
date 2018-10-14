<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_cotizaciones extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function grabarCotizacion($data)	{
		$resultado = $this->db->insert('cotizaciones', $data);
		return $this->db->insert_id();
	}
	public function grabarDetalleCotizacion($data) {
		$resultado = $this->db->insert('detalle_cotizacion', $data);
		return $this->db->insert_id();
	}
	
}