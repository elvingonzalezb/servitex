<form class="form-horizontal" action="dashboard/atributos/editarModal/<?=( !empty($data['id']) ? $data['id'] : 0)?>" method="post" enctype="multipart/form-data" id="frmColor">
	<div class="form-group">
		<label class="col-sm-2 control-label">Nombre</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="" name="nombre" placeholder="" value="<?=( ! empty($data['nombre']) ? $data['nombre'] : '')?>" required/>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Descripción</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="" name="descripcion" placeholder="" value="<?=( ! empty($data['descripcion']) ? $data['descripcion'] : '')?>" >
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Color</label>
		<div class="col-sm-10">
			<div class="input-group colorpicker-component">
				<input type="text" value="<?=( ! empty($data['valor']) ? $data['valor'] : '')?>" name="valor" class="form-control" autocomplete="off" required/>
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
