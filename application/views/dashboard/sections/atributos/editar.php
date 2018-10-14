<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Atributo Color')); ?>
<div class="page-body">
	<div class="panel panel-default">
		<div class="panel-heading">ATRIBUTOS</div>
		<div class="panel-body">
			<?=$this->session->flashdata('message')?>
			<table class="table table-striped table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th width="5%">N°</th>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Valor</th>
						<th width="18%">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($detalle as $key => $value): ?>
					<tr id="fila-<?=$value['id']?>">
						<td class="center"><?=$key+1?></td>
						<td><?=$value['nombre']?></td>
						<td><?=$value['descripcion']?></td>
						<td><div class="td-color"><span class="valor-color" style="background-color: <?=$value['valor']?>"></span><?=$value['valor']?></div></td>
						<td class="center">
							<a href="javascript:loadModalColor(<?=$value['id']?>);" class="btn btn-info"><i class="glyphicon glyphicon-edit icon-white"></i>Editar</a>
							<a class="btn btn-danger" href="javascript:void(0)" onclick="eliminarItem(<?=$value['id']?>,'atributos/delete');return false;">
							<i class="glyphicon glyphicon-trash icon-white"></i>
							Borrar
							</a>
						</td>
					</tr>
					<?php endforeach;?>                              
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="colorModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="defaultModalLabel">Edición Color</h4>
			</div>
			<div class="modal-body">
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	  	function loadModalColor(color_id){
		    $('.modal-body').load('dashboard/atributos/editModal/'+color_id ,function(){
		        $('#colorModal').modal({show:true});
		    });
		}
</script>
<style type="text/css">
	.valor-color{
		width: 20px;
		height: 20px;
		margin-right: 10px;
	}
	.td-color{
		display: flex;
		align-items: center;
		font-size: 13px;
		font-weight: 600;
	}
</style>