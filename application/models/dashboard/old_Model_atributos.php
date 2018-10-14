<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_atributos extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	#--------
	# GET
	#--------
	public function getAtributos( ){
		$query = $this->db
				->select('*')
				->from('atributos')
				->where('estado',_ACTIVO)
				->get()
				->result_array();
		$options=array();
		for ($i=0; $i < count($query); $i++) { 
			$options[$query[$i]['id']] = $query[$i]['nombre'];
		}
		return $options;
	}

	public function getCategAtrib($ids = 1){
		$query = $this->db
				->select('atributos')
				->from('categorias')
				->where('estado',_ACTIVO)
				->where_in('id',$ids)
				->get()
				->result_array();
		$atributos = array();
		$x=array();
		for ($i=0; $i < count($query); $i++) { 
			if(!empty($query[$i]['atributos'])){
				$id = explode('#',$query[$i]['atributos']);
				if ($i>0) {
					$merge = array_merge($id,$x);
					$x = $merge;
				}else{
					$x = $id;
					$merge = $id;
				}
				$atributos = $merge;
			}
		}
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
				->select('id,nombre,valor')
				->from('detalle_atributos')
				->where('estado',_ACTIVO)
				->where('atributo_id',$id)
				->get()
				->result_array();
		return $query;
	}

	#--------
	# UPDATE
	#--------


	#--------
	# INSERT
	#--------

	#--------
	# DELETE
	#--------

}
