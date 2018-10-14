<script src="assets/dashboard/adminbsb/js/jquery.tabledit.min.js"></script>
<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Nuevo Atributo')); ?>
<div class="page-body clearfix">
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">ATRIBUTO</div>
				<div style="position: relative;text-align: right;padding-bottom: 15px;">
                    <a class="btn" href="dashboard/atributos/lista"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a Atributos</u></a>
                    <div class="clearfix"></div>
                </div>
				<div class="panel-body p-b-25">
					<div><?=$this->session->flashdata('success');?></div>
					<form class="form-horizontal" action="dashboard/atributos/nuevo" method="post" enctype="multipart/form-data" id="formAtributo">
						<div class="form-group">
							<label class="col-sm-2 control-label">Nombre</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" autocomplete="off" name="nombre" <?php echo in_array('nombre', $required)? 'required':''; ?>>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-2">
								<input type="radio" id="" name="estado" value="<?= _ACTIVO ?>" checked data-icheck-theme="square" data-icheck-color="aero" <?php echo in_array('estado', $required)? 'required':''; ?>>
								<label for="estado">Activo</label>
							</div>
							<div class="col-sm-2">
								<input type="radio" id="" name="estado" value="<?= _INACTIVO ?>" data-icheck-theme="square" data-icheck-color="blue" <?php echo in_array('estado', $required)? 'required':''; ?>>
								<label for="estado">Inactivo</label>
							</div>
						</div>
						<legend>Detalle del atributo</legend>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<a title="Agregar nuevo item" href="javascript:void(0);" id="addRow" class="btn btn-primary"> Agregar nuevo detalle</a>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<div class="clearfix">
									<table id="editTable" class="table table-striped">
										<thead>
											<tr>
												<th></th>
												<th>Nombre</th>
												<th>Descripción</th>
												<th>valor</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<tr id="1">
												<td>1</td>
												<td><input type="text" class="nombre" name="atributos[1][nombre]"></td>
												<td><input type="text" class="descripcion" name="atributos[1][descripcion]"></td>
												<td><input type="text" class="valor" name="atributos[1][valor]"></td>
												<td><a data-id="1" onclick="deleteRow('1')" class="tabledit-delete-button btn btn-sm btn-default" style="float: none;"><span class="glyphicon glyphicon-trash"></span></a></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 p-l-15">
								<button type="submit" class="btn btn-sm btn-success">Grabar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
function deleteRow(idRow) {
	$('#'+idRow).remove();
}
$("#formAtributo").submit(function() {
	var input1 = $("#editTable tr:last input.nombre").val();
	var input2 = $("#editTable tr:last input.valor").val();
	if(input1 == '' || input2 == ''){
		swal("No esta permitido valor vacios."); return false;
	}
});
$("#addRow").click(function() {
	var input1 = $("#editTable tr:last input.nombre").val();
	var input2 = $("#editTable tr:last input.valor").val();
	if(input1 == '' || input2 == ''){
		swal("Completar el valor, para seguir añadiendo."); return false;
	}
	var lastID = $("#editTable tr:last").attr("id");
	if (lastID == undefined) {lastID = 0}
	lastID = parseInt(lastID)+1;
	str = '<tr id="'+lastID+'">';
	str += '<td>'+lastID+'</td>';
	str += '<td><input type="text" class="nombre" name="atributos['+lastID+'][nombre]"></td>';
	str += '<td><input type="text" class="descripcion" name="atributos['+lastID+'][descripcion]"></td>';
	str += '<td><input type="text" class="valor" name="atributos['+lastID+'][valor]"></td>';
	str += '<td><a data-id="'+lastID+'" onclick="deleteRow('+lastID+')" class="tabledit-delete-button btn btn-sm btn-default" style="float: none;"><span class="glyphicon glyphicon-trash"></span></a></td>';
	str += '</tr>';
	$("table#editTable tbody").append(str);
});
</script>