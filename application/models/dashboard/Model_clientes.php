<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_clientes extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function getClientes( ){
        $query = $this->db
                ->select("c.id,
                    CONCAT(c.nombres ,' ',c.apellidos) as nombre_completo,
                    c.nombres,c.apellidos,c.correo,c.telefono,c.ruc,c.razon_social,c.dni,
                    c.codigo,c.imagen,c.logo,c.estado,c.descripcion,
                    c.creado")
                ->from('clientes c')
                ->where('c.estado!=',_ELIMINADO)
                ->get()
                ->result_array();

            return ( ! empty($query) && is_array($query) ? $query : []);
    }

    public function getClientesById( $id ){

        $query = $this->db
                ->select('c.id,c.nombres,c.apellidos,c.correo,c.telefono,c.ruc,c.razon_social,
                    c.dni,c.codigo,c.imagen,c.imagen_title,c.logo,c.estado,c.descripcion')
                ->from('clientes c')
                ->where('c.estado!=',_ELIMINADO)
                ->where('c.id', $id)
                ->get()
                ->row_array();

            return ( ! empty($query) && is_array($query) ? $query : []);  

    }
    #--------
    # UPDATE
    #--------
    public function UpdateClientes( $id , $data ){
        $query = $this->db
                ->where('id', $id)
                ->update('clientes', $data);
            return $query;
    }
 
}
