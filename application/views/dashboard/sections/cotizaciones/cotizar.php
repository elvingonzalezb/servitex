<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Cotizar')); ?>
<div class="page-body">
	<div class="panel panel-default">
		<div class="panel-heading">Cotizar la Solicitud</div>
		<div style="position: relative;text-align: right;padding-bottom: 15px;">
	        <a class="btn" href="dashboard/cotizaciones/lista"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a Cotizaciones</u></a>
	        <div class="clearfix"></div>
	    </div>
		<div class="panel-body">
			<div class="row clearfix">
				<div class="col-sm-12">
					<h3><strong>Datos de la cotización</strong></h3>
					<form class="form-horizontal" action="dashboard/cotizaciones/enviar" method="post">
						<?php
						if(isset($resultado) && ($resultado=="success"))
						{
							echo '<div class="alert alert-success">';
							echo '<button type="button" class="close" data-dismiss="alert">×</button>';
							echo '<strong>RESULTADO:</strong> Precios Actualizados';
							echo '</div>';
						}
						?> 
						<table class="table table-bordered table-hover">
							<tbody>
								<tr>
									<td><strong>Nro de Cotización:</strong></td>
									<td><?php $nro = $orden['codigo']; echo $nro; ?></td>
								</tr>
								<tr>
									<td><strong>Fecha y hora de Compra:</strong></td>
									<td><?php echo date_format(date_create($orden['fecha']), 'd-m-Y H:i:s'); ?></td>
								</tr>
							</tbody>
						</table>
						<hr>
						<h3><strong>Datos del Cliente</strong></h3>
						<table class="table table-bordered table-hover">
							<tbody>
								<!--
                                <tr>
                                    <td><h4>Razón Social:</h4></td>
                                    <td>
                                        <?php echo $cliente['razon_social']; ?>
                                    </td>
                                </tr>
                                -->
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
								<!--<tr>
									<td><strong>Pais:</strong></td>
									<td><?php echo $pais; ?></td>
								</tr>
								<tr>
									<td><strong>Ciudad:</strong></td>
									<td><?php echo $ciudad; ?></td>
								</tr>
								<tr>
									<td><strong>Direccion:</strong></td>
									<td><?php echo $cliente['direccion']; ?></td>
								</tr>-->
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
								$i = 0;
								$total = 0;
								foreach($detalles as $detalle)
								{
									$id_detalle = $detalle['id'];
									$precio = $detalle['precio'];
									$st = $precio*($detalle['cantidad']);
									$subtotal = redondeado($st, 2);
									$subtotal = number_format($subtotal, 2, '.', '');
									echo '<tr>';
										echo '<td class="center"><a href="#" target="_blank"><img src="files/producto/thumbs/'.$detalle['imagen'].'" alt="'.$detalle['nombre'].'"></a></td>';
										echo '<td class="center">'.$detalle['nombre'].'</td>';                        
										echo '<td class="center">';
										echo '<input type="text" name="precio_'.$i.'" id="precio_'.$i.'" class="span6 typeahead" value="'.$precio.'" onkeyup="calSubtotal();" >';
										echo '<input type="hidden" name="id_detalle_'.$i.'" id="id_detalle_'.$i.'" value="'.$detalle['id'].'">';
										echo '<input type="hidden" name="cantidad_'.$i.'" id="cantidad_'.$i.'" value="'.$detalle['cantidad'].'">';
										echo '</td>';
										echo '<td class="center">'.$detalle['cantidad'].'</td>';
										echo '<td class="center" id="id_subtotal_'.$i.'">S./ '.$subtotal.'</td>';
									echo '</tr>';
									$total=$total + $subtotal;
									$i++;
								}
								?>
								<tr>
									<td colspan="3"></td>
									<td><strong>TOTAL</strong></td>
									<td id="celdaTotal"><strong><?php echo 'S./ '.$total; ?></strong></td>
								</tr>
							</tfoot>
						</table>
						<div class="form-actions">
							<input type="hidden" name="cliente_id" value="<?php echo $orden['cliente_id']; ?>">
							<input type="hidden" name="num_items" id="num_items" value="<?php echo $i; ?>">
							<input type="hidden" name="id" id="id" value="<?php echo $orden['id']; ?>">
							<input type="hidden" name="total" id="input_total" value="<?=$total?>">
							<input type="submit" class="btn btn-primary" value="ENVIAR COTIZACIÓN">
							&nbsp;&nbsp;
							<a class="btn btn-danger" href="dashboard/cotizaciones/lista">VOLVER AL LISTADO</a>
							<!--<a class="btn btn-warning" href="javascript:enviarCotizacion('<?=$orden['id']?>')" >ENVIAR COTIZACIÓN</a>-->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>