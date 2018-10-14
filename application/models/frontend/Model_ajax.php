<?php
class Model_ajax extends CI_Model {
    public function __construct(){
        parent::__construct();
    }



    public function getUbigeo($ubigeo) {
        $query = $this->db
                ->select([
                    'e.estado',
                    'e.ubigeo',
                    'p.pais',
                    'p.codigo as codigo_pais'
                    ])
                ->from('estados e')
                ->join('paises p','e.pais_id=p.id','left')
                ->where('e.ubigeo',$ubigeo)
                ->get()
                ->row_array();
        return ( ! empty($query) && is_array($query) ? $query : []);
    }


    #
    #   OLD
    #

    public function updateStock($id_producto, $cantidad){
        $SQL = 'UPDATE productos SET cantidad = cantidad - '.$cantidad.' WHERE id = '.$id_producto;
        $query = $this->db->query($SQL);
        return $query;
    }
    public function updateStockAtributo($id_atributo, $cantidad){
        $SQL = 'UPDATE stock_atributos_multiples SET cantidad = cantidad - '.$cantidad.' WHERE id = '.$id_atributo;
        $query = $this->db->query($SQL);
        return $query;
    }

    public function grabarPedido($data) {
        $resultado = $this->db->insert('carritos', $data);
        return $this->db->insert_id();
    }
   
    public function grabarDetallePedido($data) {
        $resultado = $this->db->insert('carro_detalle', $data);
        return $this->db->insert_id();
    }

    public function getListaCiudades($id_pais) {
        $this->db->where('pais_id', $id_pais);
        $query =  $this->db->get('estado');
        return $query->result();
    }

    public function getDatosCliente($id_cliente){
        $this->db->where('id', $id_cliente);
        $query = $this->db->get('clientes');
        return $query->row();
    }

    public function getCodigoPais($id_cliente){
        $this->db->where('id', $id_cliente);
        $qc = $this->db->get('clientes');
        $rc = $qc->row();
        $id_estado = $rc->id_estado;

        $this->db->where('id', $id_estado);
        $qe = $this->db->get('estado');
        $re = $qe->row();
        $id_pais = $re->id_pais;

        $this->db->where('id', $id_pais);
        $qp = $this->db->get('pais');
        $rp = $qp->row();

        $codigoPais = $rp->codigo;

        return $codigoPais;
    }

    public function getCiudad($id_cliente){
        $this->db->where('id', $id_cliente);
        $qc = $this->db->get('clientes');
        $rc = $qc->row();
        $id_estado = $rc->id_estado;

        $this->db->where('id', $id_estado);
        $qe = $this->db->get('estado');
        $re = $qe->row();

        $ciudad = $re->estado;

        return $ciudad;
    }

    public function getPais($id_cliente){
        $this->db->where('id', $id_cliente);
        $qc = $this->db->get('clientes');
        $rc = $qc->row();
        $id_estado = $rc->id_estado;

        $this->db->where('id', $id_estado);
        $qe = $this->db->get('estado');
        $re = $qe->row();
        $id_pais = $re->id_pais;

        $this->db->where('id', $id_pais);
        $qp = $this->db->get('pais');
        $rp = $qp->row();

        $pais = $rp->pais;

        return $pais;
    }

    public function getPrecioTalla($id_producto){
        $this->db->where('id', $id_producto);
        $qc = $this->db->get('productos');
        $rc = $qc->row();
        return $rc;
    }
/*
    public function getCupon($codigo){
        $this->db->where('codigo', $codigo);
        $qc = $this->db->get('cupones');
        $rc = $qc->row();
        if($rc){
            $descuento = (($rc->descuento)*100).'%';
        }else{
            $descuento = '';
        }
        return $descuento;
    }
*/
}
?>