<?php
class Ajax extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('frontend/model_ajax','Ajax');
        $this->load->model('frontend/model_productos','Producto');
        $this->load->library('My_PHPMailer');
    }

    public function actualizaCarro() {
        if ($_POST) {
            $datos = $_POST;
            $indice = $datos['carro_id'];
            $json = array();
            $carrito = $this->session->userdata('carrito_items');
            #verificar Stock  del producto
            //var_dump($datos['atributo_id']);exit();
            if (!empty($datos['atributo_id'])) {
                $stock = $this->Producto->getStockAtributo($datos['atributo_id'],$datos['producto_id']);
            }else{
                $stock = $this->Producto->getProductById($datos['producto_id']);
            }
            if ($stock['cantidad'] < 1) {
                $json['mensaje'] = 'No contamos con stock disponible.';
                $json['estado'] = 2;
            }else if ($stock['cantidad'] < $datos['cantidad']) {
                $json['mensaje'] = 'No contamos con la cantidad solicitada.';
                $json['estado'] = 2;
            }else{
                if($carrito){
                    if(isset($carrito[$indice])){
                        $carrito[$indice]['item_cantidad'] = $datos['cantidad'];
                        $carrito[$indice]['item_subtotal'] = $datos['cantidad'] * $carrito[$indice]['item_precio'];
                        //$carrito[$indice]['subtotalpeso'] = $carrito[$indice]['peso']*$datos['cantidad'];
                        $subtotal = $carrito[$indice]['item_subtotal'];
                        //$subtotalpeso = $carrito[$indice]['subtotalpeso'];
                    }
                    $total = 0;
                    $totalpeso = 0;
                    foreach ($carrito as $value){
                        $total = $total + ($value['item_cantidad'] * $value['item_precio']);
                        //$totalpeso = $totalpeso + ($value['cantidad']*$value['peso']);
                    }
                    $this->session->set_userdata('carrito_items', $carrito);
                    $json=array();
                    $json['dato'] = 'ok';
                    $json['new_cantidad'] = $datos['cantidad'];
                    $json['new_subtotal'] = $subtotal;
                    $json['new_total'] = $total;
                }
            }
            echo json_encode($json);
        }
    }
    
    public function seguirAgregando() {
        $ok=array();
        $ok['dato']='ok';
        echo json_encode($ok);
    }
    
    public function eliminaItemCarro() {
        $id = $_POST['id'];
        //echo '<pre>';print_r($this->session->userdata('carrito_items'));echo '</pre>';die;
        if($this->session->userdata('carrito_items'))
        {
            $carrito = $this->session->userdata('carrito_items');
            foreach ($carrito as $key => $value) {
                if ($value['item_carroID']==$id) {
                    unset($carrito[$key]);
                }
            }
            /*if(isset($carrito[$id])) {
                //$this->Categoria_model->restoreStock($carrito[$id]['id_producto'], $carrito[$id]['cantidad']);
                unset($carrito[$id]);
            }*/
            $numItem=count($carrito);
            if($numItem == 0){
                $this->session->unset_userdata('carrito_items');
                /*$this->session->unset_userdata('adicional');
                $this->session->unset_userdata('usado');
                $this->session->unset_userdata('bloquear');*/
            }else{
                $this->session->set_userdata('carrito_items', $carrito);                           
            }

            $ok=array();
            $ok['dato'] = 'ok';
            $ok['num'] = $numItem;  
            echo json_encode($ok);                
        }
    }

    public function eliminaCarro() {
        $carrito = $this->session->userdata('carrito');
        foreach ($carrito as $value) {
            $id_producto = $value['id_producto'];
            $cantidad = $value['cantidad'];
            //$this->Categoria_model->restoreStock($id_producto, $cantidad);
        }
        $this->session->unset_userdata('carrito');
        $this->session->unset_userdata('adicional');
        $this->session->unset_userdata('usado');
        $this->session->unset_userdata('bloquear');

        $ok=array();
        $ok['dato']='ok';
        $ok['num'] = 0;
        echo json_encode($ok);
    }

    public function aplicarDescuento(){
        $cupon = $_POST['cupon'];
        $now = date('Y-m-d');
        $sum_descuento = 0;

        $usado = $this->session->userdata('usado');

        $this->db->where('codigo', $cupon);
        $this->db->where('fecha_inicio <=', $now);
        $this->db->where('fecha_fin >=', $now);
        $query = $this->db->get('cupones');
        $resultado = $query->row();

        if($resultado){

            if($usado == 'no'){

                $carrito = $this->session->userdata('carrito');
                
                if($resultado->tipo == 'todo'){
                    foreach ($carrito as $value) {
                        $indice = $value['id_producto'];
                        $precio_original = $value['precio'];
                        $descuento = $resultado->descuento;
                        $precio_final = $precio_original - ($precio_original*$descuento);
                        $subtotal_final = $precio_final*$value['cantidad'];
                        $carrito[$indice]['precio'] = $precio_final;
                        $carrito[$indice]['subtotal'] = $subtotal_final;
                        $sum_descuento = $sum_descuento + ($precio_original*$descuento);
                    }

                    $this->session->set_userdata('bloquear', 'pagar-disabled');

                    $this->session->set_userdata('carrito', $carrito);
                    
                    /*$data = array('usado' => 'Si');
                    $this->db->where('codigo', $cupon);
                    $this->db->update('cupones', $data);*/

                    $this->session->set_userdata('usado', 'si');

                    $this->db->where('codigo', $cupon);
                    $q = $this->db->get('cupones');
                    $r = $q->row();

                    $porcentaje_descuento = ($r->descuento)*100;

                    $data['msg'] = 'ok';
                    $adicional = array(
                        'sum_descuento' => $sum_descuento,
                        'cod_cupon' => $cupon,
                        'porcentaje_descuento' => $porcentaje_descuento.'%'
                    );
                    $this->session->set_userdata('adicional', $adicional);
                }else if($resultado->tipo == 'producto'){
                    $indice = $resultado->id_tipo;
                    if(isset($carrito[$indice])){
                        $link_producto = $carrito[$indice]['link_producto'];
                        foreach ($carrito as $value) {
                            if($value['link_producto']==$link_producto){
                                $indice_1 = $value['id_producto'];
                                $precio_original = $value['precio'];
                                $descuento = $resultado->descuento;
                                $precio_final = $precio_original- ($precio_original*$descuento);
                                $subtotal_final = $precio_final*$value['cantidad'];
                                $carrito[$indice_1]['precio'] = $precio_final;
                                $carrito[$indice_1]['subtotal'] = $subtotal_final;
                                $sum_descuento = $sum_descuento + ($precio_original*$descuento);
                            }
                        }
                        $this->session->set_userdata('bloquear', 'pagar-disabled');
                        $this->session->set_userdata('carrito', $carrito);
                        /*$data = array('usado' => 'Si');
                        $this->db->where('codigo', $cupon);
                        $this->db->update('cupones', $data);*/

                        $this->session->set_userdata('usado', 'si');

                        $this->db->where('codigo', $cupon);
                        $q = $this->db->get('cupones');
                        $r = $q->row();

                        $porcentaje_descuento = ($r->descuento)*100;

                        $data['msg'] = 'ok';
                        $adicional = array(
                            'sum_descuento' => $sum_descuento,
                            'cod_cupon' => $cupon,
                            'porcentaje_descuento' => $porcentaje_descuento.'%'
                        );
                        $this->session->set_userdata('adicional', $adicional);
                    }else{
                        $data['msg'] = 'no-prod';
                        $adicional = array(
                            'sum_descuento' => 0,
                            'cod_cupon' => '',
                            'porcentaje_descuento' => ''
                        );
                        $this->session->set_userdata('adicional', $adicional);
                    }
                }else if($resultado->tipo == 'categoria'){
                    $id_categoria = $resultado->id_tipo;
                    $this->db->where('id_categoria', $id_categoria);
                    $qc = $this->db->get('categorias');
                    $rc = $qc->row();
                    $url_categoria = $rc->url;
                    $cont = 0;
                    foreach ($carrito as $value) {
                        $indice = $value['id_producto'];
                        $link_producto = $carrito[$indice]['link_producto'];
                        if(preg_match("/\b".$url_categoria."\b/i", $link_producto)){
                            $precio_original = $carrito[$indice]['precio'];
                            $descuento = $resultado->descuento;
                            $precio_final = $precio_original - ($precio_original*$descuento);
                            $subtotal_final = $precio_final*$carrito[$indice]['cantidad'];
                            $carrito[$indice]['precio'] = $precio_final;
                            $carrito[$indice]['subtotal'] = $subtotal_final;
                            $sum_descuento = $sum_descuento + ($precio_original*$descuento);
                            $cont++;
                        }
                    }
                    if($cont > 0){
                        $this->session->set_userdata('bloquear', 'pagar-disabled');
                        $this->session->set_userdata('carrito', $carrito);
                        /*$data = array('usado' => 'Si');
                        $this->db->where('codigo', $cupon);
                        $this->db->update('cupones', $data);*/

                        $this->session->set_userdata('usado', 'si');

                        $this->db->where('codigo', $cupon);
                        $q = $this->db->get('cupones');
                        $r = $q->row();
                        
                        $porcentaje_descuento = ($r->descuento)*100;

                        $data['msg'] = 'ok';
                        $adicional = array(
                            'sum_descuento' => $sum_descuento,
                            'cod_cupon' => $cupon,
                            'porcentaje_descuento' => $porcentaje_descuento.'%'
                        );
                        $this->session->set_userdata('adicional', $adicional);
                    }else{
                        $data['msg'] = 'no-cat';
                        $adicional = array(
                            'sum_descuento' => 0,
                            'cod_cupon' => '',
                            'porcentaje_descuento' => ''
                        );
                        $this->session->set_userdata('adicional', $adicional);
                    }
                }
            }else{
                $data['msg'] = 'rep';
                $adicional = array(
                    'sum_descuento' => 0,
                    'cod_cupon' => '',
                    'porcentaje_descuento' => ''
                );
                $this->session->set_userdata('adicional', $adicional);
            }

        }else{
            $data['msg'] = 'not';
            $adicional = array(
                'sum_descuento' => 0,
                'cod_cupon' => '',
                'porcentaje_descuento' => ''
            );
            $this->session->set_userdata('adicional', $adicional);
        }

        echo json_encode($data);

    }


    public function selectCiudades() {
        $id_pais = $_POST['id_pais'];
        $aux= $this->Ajax->getListaCiudades($id_pais);
        $dato=array();
        $cont=0;
        foreach ($aux as $value){
            $id_estado = $value->id_estado;
            $estado = $value->estado;
            $dato[] = $id_estado.'$$'.$estado;
            $cont +=1;
        }
        $envio=$cont.'@@'.implode("@@",$dato);
        $json['dato'] = $envio;
        echo json_encode($json);
    }

    public function cargaPrecioTalla() {
        $id_producto = $_POST['id_producto'];
        $aux= $this->Ajax->getPrecioTalla($id_producto);
        $dato=array();
        $dato['precio'] = $aux->precio;
        $dato['precio_oferta'] = $aux->precio_oferta;
        $dato['talla'] = $aux->talla;
        $dato['stock'] = $aux->stock;
        echo json_encode($dato);
    }

    public function updateCupon($cupon){
        $data = array('usado' => 'No');
        $this->db->where('codigo', $cupon);
        $this->db->update('cupones', $data);
    }


}
?>
