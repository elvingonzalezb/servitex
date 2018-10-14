<?php $this->load->view("dashboard/includes/breadcrumbs", array()); ?>
<div class="page-body">
	<div class="panel panel-default">
		<div class="panel-heading">CONFIGURACIONES</div>
		<div class="panel-body">
			<table class="table table-striped table-hover js-exportable dataTable" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>N°</th>
						<th>LLAVE</th>
						<th>VALOR</th>
						<th>DESCRIPCIÓN</th>
						<th class="noExport">ACCIONES</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($dataset as $key => $value): ?>
					<tr id="fila-<?=$value['id']?>">
						<td><?=$key+1?></td>
						<td><?=$value['llave']?></td>
						<?php if ($value['tipo'] == 3) {
							$json = json_decode($value['descripcion'],true);
							echo '<td>'.$json['valores'][$value['valor']].'</td>';
							echo '<td>'.$json['descripcion'].'</td>';
						}else{
							echo '<td>'.$value['valor'].'</td>';
							echo '<td>'.$value['descripcion'].'</td>';
						} ?>
						
						<td class="center">
							<a class="btn btn-info" href="dashboard/configuraciones/editar/<?=$value['id']?>">
							<i class="glyphicon glyphicon-edit icon-white"></i>
							Editar
							</a>
						</td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>