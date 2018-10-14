<script src="assets/dashboard/adminbsb/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
<link href="assets/dashboard/adminbsb/plugins/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css" rel="stylesheet" />

<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Atributo Color')); ?>
<div class="page-body">
	<div class="panel panel-default">
		<div class="panel-heading">ATRIBUTOS</div>

		<div class="panel-body">

			<?=$this->session->flashdata('message')?>
			<div class="form-group" style="position: relative;text-align: right;">
				<div class="col-sm-12">
					<a href="javascript:loadNuevoModalColor()" class="btn btn-primary"> Agregar Nuevo Color</a>
				</div>
			</div>

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
		$('.modal-body').load('dashboard/atributos/editarModal/'+color_id ,function(){
			$('#colorModal').modal({show:true});
		});
	}

	function loadNuevoModalColor(){
		$('.modal-body').load('dashboard/atributos/nuevoModal' ,function(){
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

	#colorModal{
	z-index: 999999 !important;
	}
	.modal-backdrop{
	z-index: 99999 !important;
	}
	.colorpicker.colorpicker-visible{
		z-index: 999999 !important;
	}
	button.btn-success{
		font-size: 13px;
		padding: 6px 12px;
		text-transform: capitalize;
	}

</style>