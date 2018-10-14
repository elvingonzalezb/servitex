<form class="form-horizontal" action="dashboard/atributos/nuevoModal" method="post" enctype="multipart/form-data" id="frmColor">
	<div class="form-group">
		<label class="col-sm-2 control-label">Nombre</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="" name="nombre" placeholder="" required/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Descripción</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="" name="descripcion" placeholder="">
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Color</label>
		<div class="col-sm-10">
			<div class="input-group colorpicker-component">
				<input type="text" name="valor" class="form-control" value="#000000"  autocomplete="off"  required/>
				<span class="input-group-addon"><i></i></span>
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 p-l-15">
			<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Grabar</button>
			<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
		</div>
	</div>
</form>

<script type="text/javascript">
	$(function () {
		$('.colorpicker-component').colorpicker();	
	});
</script>
