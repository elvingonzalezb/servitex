<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pedidos extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
    #--------
    # GET
    #--------
    public function getPedido($id) {
        $this->db->where('id', $id);
        $query =  $this->db->get('carritos');
        return $query->row_array();
    }

    public function getListaPedido() {
        $this->db->order_by('fecha_venta','desc');
        $query =  $this->db->get('carritos');
        return $query->result_array();
    } 
    public function getCliente($id_cliente) {
        $return = $this->db
                ->select(['c.*','e.estado AS ciudad','p.pais'])
                ->from('clientes c')
                ->join('estados e', 'e.id = c.estado_id','left')
                ->join('paises p', 'p.id = e.pais_id','left')
                ->where('c.estado !=',_ELIMINADO)
                ->where('c.id', $id_cliente)
                ->get()
                ->row_array();
        return $return;
    }

    public function getDetallesPedido($carrito_id) {
        $this->db->where('carrito_id',$carrito_id);            
        $query =  $this->db->get('carro_detalle');
        return $query->result_array();
    }
    #--------
    # UPDATE
    #--------

    public function updateEstado($id,$data) {
        $this->db->where('id', $id);
        $this->db->update('carritos', $data);
    }
    #--------
    # INSERT
    #--------

    #--------
    # DELETE
    #--------
    public function borrar($id){
        $data = array('estado'=>_ELIMINADO);
        $this->db->where('id', $id);
        $this->db->update('carritos', $data);
    }
    
    public function listaProductosReserva($id) {
        $this->db->where('carrito_id', $id);
        $query =  $this->db->get('carro_detalle');
        return $query->result();
    }
   
}