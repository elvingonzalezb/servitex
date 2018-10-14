<link href="assets/dashboard/adminbsb/plugins/fileuploader/src/jquery.fileuploader.css" media="all" rel="stylesheet">
<script src="assets/dashboard/adminbsb/plugins/fileuploader/src/jquery.fileuploader.min.js" type="text/javascript"></script>
<div class="page-body clearfix">
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">PRODUCTO</div>
				<div class="panel-body p-b-25">
					<div><?=$this->session->flashdata('success');?></div>
					<form class="form-horizontal" action="dashboard/productos/nuevo" method="post" enctype="multipart/form-data" id="formProducto">
						<div class="form-group">
							<label class="col-sm-2 control-label">Categoria</label>
							<div class="col-sm-10">
								<select class="form-control chosen-select" id="selectedCategoria" data-rule-chosen-required="true" name="categoria_id[]" multiple="multiple" <?=in_array('categoria_id[]', $requerid)? 'required':''; ?>>
									<?php recursive($dataset); ?>
                                </select>
								<?php echo form_error('categoria_id[]'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nombre</label>
							<div class="col-sm-10">
								<input type="text" class="form-control slugName" id="" name="nombre" placeholder="" onkeyup="slugUrl('slugName', 'slugUrl');" <?php echo in_array('nombre', $requerid)? 'required':''; ?>>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Url</label>
							<div class="col-sm-10">
								<input type="text" class="form-control slugUrl" id="" name="url" placeholder="" <?php echo in_array('url', $requerid)? 'required':''; ?>>
								<?php echo form_error('url'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Descripción</label>
							<div class="col-sm-10">
								<textarea class="form-control"  id="ckeditor" name="descripcion" <?php echo in_array('descripcion', $requerid)? 'required':''; ?>></textarea>
								<?php echo form_error('descripcion'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Orden</label>
							<div class="col-sm-10">
								<input type="number" min="1" class="form-control" id="" name="orden" placeholder="" <?php echo in_array('orden', $requerid)? 'required':''; ?>>
								<?php echo form_error('orden'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-2">
								<input type="radio" id="" name="estado" value="<?= _ACTIVO ?>" checked data-icheck-theme="square" data-icheck-color="aero" <?php echo in_array('estado', $requerid)? 'required':''; ?>>
								<label for="estado">Activo</label>
							</div>
							<div class="col-sm-2">
								<input type="radio" id="" name="estado" value="<?= _INACTIVO ?>" data-icheck-theme="square" data-icheck-color="blue" <?php echo in_array('estado', $requerid)? 'required':''; ?>>
								<label for="estado">Inactivo</label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<div class="alert alert-info"> La imagen debe tener una medida de <?=$this->sizes['principal_x']?> por <?=$this->sizes['principal_y']?> de lo contrario sera redimencionado a este tamaño </div>
								<input type="file" name="files[]" id="fileuploader" multiple <?php echo in_array('files[]', $requerid)? 'required':''; ?>>
								<?php echo form_error('files[]'); ?>
							</div>
						</div>
						<div id="ajaxAtributos"></div>
						<div class="form-group">
                            
                        </div>
						<legend>Parámetros para SEO</legend>
						<div class="form-group">
							<label class="col-sm-2 control-label">Titulo</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" name="seo_title" placeholder="" <?php echo in_array('seo_title', $requerid)? 'required':''; ?>>
								<?php echo form_error('seo_title'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Descripción</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" name="seo_description" placeholder="" <?php echo in_array('seo_description', $requerid)? 'required':''; ?>>
								<?php echo form_error('seo_description'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Keywords</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" name="seo_keywords" placeholder="" <?php echo in_array('seo_keywords', $requerid)? 'required':''; ?>>
								<?php echo form_error('seo_keywords'); ?>
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
<?php 
 function recursive($array,$space = 0) {
	foreach ($array as $key => $value) {
		$deshabilitado = ($value['padre'] == '1')? 'disabled': '';
		if ($space > 1) 
			echo "<option ".$deshabilitado." value='".$value['id']."'>".str_repeat("&nbsp;", $space)."&nbsp;".$value['nombre'];
		else 
			echo "<option ".$deshabilitado." value='".$value['id']."'>".$value['nombre'];

		if (is_array($value['sub_categorias']) && !empty($value['sub_categorias'])) 
			recursive($value['sub_categorias'], $space + 1);
	}
}
 ?>
<script>
//$('#selectedCategoria').val().trigger('chosen:updated');

$("#selectedCategoria").change(function(){
	//alert();
	$.ajax({
		data:  {"id_atributos" : $(this).val() },
		url:   'dashboard/atributos/getAjaxAtributos',
		//dataType: "json",
		type:  'post',
		beforeSend: function (response) {
			$('#ajaxAtributos').text('Procesando...');
		},
		success:  function (response) {
			$("#ajaxAtributos").html(response);                        
        }
    });
});
function actualizarEstado(param_id){
	
	//alert('aaa');
    
}
</script>