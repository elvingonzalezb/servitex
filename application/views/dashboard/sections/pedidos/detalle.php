<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Detalle Venta')); ?>
<div class="page-body">
	<div class="panel panel-default">
		<div class="panel-heading">DETALLES DE VENTA</div>
		<div style="position: relative;text-align: right;padding-bottom: 15px;">
	        <a class="btn" href="dashboard/pedidos/lista"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a Pedidos</u></a>
	        <div class="clearfix"></div>
	    </div>
		<div class="panel-body">
			<div class="row clearfix">
				<div class="col-sm-12">
					<h3><strong>Datos de la venta</strong></h3>
					<table class="table table-bordered table-hover">
						<tbody>
							<tr>
								<td><strong>Nro de Cotización:</strong></td>
								<td><?php $nro = $orden['codigo_pedido']; echo $nro; ?></td>
							</tr>
							<tr>
								<td><strong>Fecha y hora de Compra:</strong></td>
								<td>
								<?php
                                    $aux_f = explode(" ", $orden['fecha_venta']);
                                    $aux_f2 = explode("-", $aux_f[0]);
                                    $fecha_1 = $aux_f2[2]."-".$aux_f2[1]."-".$aux_f2[0];
                                    $fecha_orden = $fecha_1." ".$aux_f[1];
                                    echo $fecha_orden; 
                                ?>
                                </td>
							</tr>
						</tbody>
					</table>
					<hr>
					<h3><strong>Datos del Cliente</strong></h3>
					<table class="table table-bordered table-hover">
						<tbody>
							<tr>
								<td><strong>Nombre y apellidos:</strong></td>
								<td><?php echo $cliente['nombres']." ".$cliente['apellidos']; ?></td>
							</tr>
							<tr>
								<td><strong>Teléfono:</strong></td>
								<td><?php echo $cliente['telefono']; ?></td>
							</tr>
							<tr>
								<td><strong>Email:</strong></td>
								<td><?php echo $cliente['correo']; ?></td>
							</tr>
							<tr>
								<td><strong>Pais:</strong></td>
								<td><?php echo $cliente['pais']; ?></td>
							</tr>
							<tr>
								<td><strong>Ciudad:</strong></td>
								<td><?php echo $cliente['ciudad']; ?></td>
							</tr>
							<tr>
								<td><strong>Direccion:</strong></td>
								<td><?php echo $cliente['direccion']; ?></td>
							</tr>
						</tbody>
					</table>
					<hr>
					<h3><strong>Contenido</strong></h3>
					<table class="table table-striped table-hover js-exportable dataTable">
						<thead>
							<tr>
								<th>Imagen</th>
								<th>Producto</th>
								<th>Precio</th>
								<th>Cantidad</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$total = 0;
							foreach($detalles as $detalle)
							{
								$precio = $detalle['precio'];
								$subtotal = $detalle['subtotal'];
								echo '<tr>';
								echo '<td class="center"><a href="#" target="_blank"><img src="files/productos/thumbs/'.$detalle['imagen'].'" alt="'.$detalle['nombre'].'"></a></td>';
								echo '<td class="center">'.$detalle['nombre'].'</td>';                        
								echo '<td class="center">'.dataConfig('moneda').$precio.'</td>';
								echo '<td class="center">'.$detalle['cantidad'].'</td>';
								echo '<td class="center">'.dataConfig('moneda').$subtotal.'</td>';
								echo '</tr>';
								$total = $total + $subtotal;
							}
							?>
							<!--<tr>
								<td colspan="3"></td>
								<td><strong>COSTO DE ENVIO</strong></td>
								<td><strong><?php //echo 'S./ '.$carro['costo_envio']; ?></strong></td>
							</tr>
							<?php
							//if(trim($carro['codigo_descuento']) == ''){}
							//else{
							?>
							<tr>
								<td colspan="3"></td>
								<td><strong>CUPÓN DE DESCUENTO: </strong> <br> <?php //echo $carro['codigo_descuento']?> (<?php //echo $carro['porcentaje_descuento']?>) </td>
								<td><strong><?php //echo '-S./ '.$carro['monto_descuento']; ?></strong></td>
							</tr>
							<?php //} ?>-->
							<tr>
								<td colspan="3"></td>
								<td><strong>TOTAL</strong></td>
								<td><strong><?php echo dataConfig('moneda').number_format($total,2); ?></strong></td>
							</tr>
						</tfoot>
					</table>
					<a class="btn btn-danger" href="dashboard/pedidos/lista">VOLVER</a>
				</div>
			</div>
		</div>
	</div>
</div>