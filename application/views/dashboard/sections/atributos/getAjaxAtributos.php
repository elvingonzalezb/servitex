<!-- <legend>Atributos</legend> -->
<?php foreach ($atributos as $key => $atributo): ?>
<div class="form-group">
	<label class="col-sm-2 control-label"><?php echo $atributo['nombre']; ?></label>
	<div class="col-sm-10">
		<select class="form-control chosen-select select<?php echo $atributo['id'] ?>">
			<option value="">Seleccione</option>
			<?php foreach ($atributo['detalle'] as $key => $option): ?>
			<option data-id="<?php echo $option['id'] ?>" value="<?php echo $option['valor']; ?>"><?php echo $option['nombre']; ?></option>
			<?php endforeach ?>
		</select>
	</div>
</div>
<?php endforeach ?>
<div class="form-group">
	<label class="col-sm-2 control-label">Stock</label>
	<div class="col-sm-10">
		<input type="number" class="form-control" name="cantidad" id="cantidad" min="0" step="1" value="<?=( isset($producto['cantidad']) ? $producto['cantidad'] : '')?>">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Precio</label>
	<div class="col-sm-10">
		<input type="number" class="form-control" name="precio" id="precio" min="0" step="0.01" value="<?=( isset($producto['precio']) ? $producto['precio'] : '')?>">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Precio oferta</label>
	<div class="col-sm-10">
		<input type="number" class="form-control" name="precio_oferta" id="precio_oferta" min="0" step="0.01" value="<?=( isset($producto['precio_oferta']) ? $producto['precio_oferta'] : '')?>">
	</div>
</div>
<?php if (count($atributos)>0): ?>
<div class="form-group">
    <label class="col-sm-2 "></label>
    <div class="col-sm-10">
        <input type="button" onclick="agregaPrecioLista()" value="AGREGAR PRECIO">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
        <div id="contenedor_elegidos" class="clearfix">
            <table width="100%" cellpadding="0" border="1" cellspacing="0" id="tablaPrecios">
                <thead>
                    <th width="20%">ATRIBUTOS</th>
                    <th width="20%">STOCK</th>
                    <th width="20%">PRECIO</th>
                    <th width="20%">PRECIO OFERTA</th>
                    <th width="20%">ACCION</th>
                </thead>
                <tbody>
                <?php 
                if (isset($detalle)) {
                    foreach ($detalle['query'] as $key => $value) {
                ?>
                    <tr id="fila_<?=str_replace("#", "-", $value['atributos'])?>">
                        <td height="25" align="center" valign="middle"><?php echo $value['atributos_nombres'] ?></td>
                        <td height="25" align="center" valign="middle"><?php echo $value['cantidad'] ?></td>
                        <td align="center" valign="middle">S./ <?php echo $value['precio'] ?></td>
                        <td align="center" valign="middle">S./ <?php echo $value['precio_oferta'] ?></td>
                        <td align="center" valign="middle"><a href="javascript:quitarPrecioLista('<?=str_replace("#", "-", $value['atributos'])?>')" style="color:red">ELIMINAR</a></td>
                    </tr>
                <?php
                    }
                } 
                 ?>
                </tbody>
            </table>
        </div>
        <input type="hidden" id="datos_atributos" name="datos_atributos" value="<?=( isset($detalle) && !empty($detalle['datos']) ? $detalle['datos'] : '')?>" required>
    </div>
</div>
<script>
function agregaPrecioLista() {
    stock = $('#cantidad').val();
    precio = $('#precio').val();
    precio_oferta = $('#precio_oferta').val();
    atributos = [
        <?php foreach ($atributos as $key => $atributo): ?>
        $('.select<?php echo $atributo['id']; ?>').val(),
        <?php endforeach ?>
    ];
    atributos_id = [
        <?php foreach ($atributos as $key => $atributo): ?>
        $('.select<?php echo $atributo['id']; ?>').find(':selected').data('id'),
        <?php endforeach ?>
    ];
    datos_atributos = $('#datos_atributos').val();
    //console.log(atributos);
    //alert(atributos);
    /* talla = $('#talla').val();
    stock = $('#stock_talla').val();
    precio_talla = $('#precio_talla').val();
    precio_oferta = $('#precio_oferta').val();
    precios_tallas = $('#precios_tallas').val();
    if(talla.trim() == ""){
        alert('Ingrese la talla');
    }else if(precio_talla.trim() == ""){
        alert('Ingrese el precio de la talla');
    }else{*/
        $.ajax({
            type: 'POST',
            url: 'dashboard/atributos/agrega_precio_lista',
            data: {
                atributos: atributos,
                atributos_id: atributos_id,
                stock: stock, 
                precio: precio, 
                precio_oferta:precio_oferta, 
                datos: datos_atributos
            },
            dataType : 'json',
            success: function(json) {

                envio = json.dato;
                cad = envio.split("|");
                atributos = cad[0];
                atributos_id = cad[1];
                precio_talla = cad[2];
                precio_oferta = cad[3];
                se_agrego = cad[4];
                stock = cad[5];
                datos = cad[6];
                //alert(se_agrego);
                if(se_agrego=="1")
                {
                    str = '<tr id="fila_'+atributos_id.replace(/,/g, "-")+'">';
                    str += '<td height="25" align="center" valign="middle">'+atributos+'</td>';
                    str += '<td height="25" align="center" valign="middle">'+stock+'</td>';
                    str += '<td align="center" valign="middle">S./ '+precio_talla+'</td>';
                    str += '<td align="center" valign="middle">S./ '+precio_oferta+'</td>';
                    str += '<td align="center" valign="middle"><a href="javascript:quitarPrecioLista(\''+atributos_id.replace(/,/g, "-")+'\')" style="color:red">ELIMINAR</a></td>';
                    str += '</tr>';
                    $("table#tablaPrecios tbody").append(str);
                }
               // console.log(cad);
               // console.log(envio);
                $("#datos_atributos").val(datos);
                $("#talla").val('');
                $("#cantidad").val('');
                $("#precio").val('');
                $("#precio_oferta").val('');
                <?php foreach ($atributos as $key => $atributo): ?>
                $('.select<?=$atributo['id']?>').val(['']).trigger('chosen:updated');
                //$(".select<?php //echo $atributo['id']; ?> option[value='']").val("");
                <?php endforeach ?>

            }
        });
   /* }*/
}
function quitarPrecioLista(atributos_id) {
    atributos = $('#datos_atributos').val();
    $.ajax({
        type: 'POST',
        url: 'dashboard/atributos/quitar_precio_lista',
        data: {atributos_id: atributos_id, atributos: atributos},
        dataType : 'json',
        success: function(json) {
            envio = json.dato;
            cad = envio.split("|");
            
            atributos_id = cad[0].replace(/,/g, "-");
            //console.log(atributos_id);
            atributos = cad[1];
            $("#fila_"+atributos_id).remove();
            $("#datos_atributos").val(atributos);
        }
    });
}
</script>   
<?php endif ?>
<hr>