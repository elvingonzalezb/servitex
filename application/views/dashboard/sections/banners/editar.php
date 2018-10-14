<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'editar')); ?>
<div class="page-body clearfix">
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Edicion de Banner</div>
				<div style="position: relative;text-align: right;padding-bottom: 15px;">
					<a class="btn" href="dashboard/banners/lista"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a Banners</u></a>
					<div class="clearfix"></div>
				</div>
				<?=$this->session->flashdata('message');?>
				<div class="panel-body p-b-25">
							<form class="form-horizontal" action="dashboard/banners/editar/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>" method="post" enctype="multipart/form-data" id="formBanner">
								<div class="form-group">
									<label class="col-sm-2 control-label">Titulo</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="" name="titulo" placeholder="" value="<?=( ! empty($dataset['titulo']) ? $dataset['titulo'] : '')?>" <?=in_array('titulo', $required)? 'required':''; ?>>
										<?php echo form_error('titulo'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Subtitulo</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="" name="subtitulo" placeholder="" value="<?=( ! empty($dataset['subtitulo']) ? $dataset['subtitulo'] : '')?>" <?=in_array('subtitulo', $required)? 'required':''; ?>>
										<?php echo form_error('subtitulo'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Resumen</label>
									<div class="col-sm-10">
									    <input type="text" class="form-control" id="" name="resumen" placeholder="" value="<?=( ! empty($dataset['resumen']) ? $dataset['resumen'] : '')?>" <?=in_array('resumen', $required)? 'required':''; ?>>
										<?php echo form_error('resumen'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Titulo Botón</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="" name="btn_titulo" placeholder="" value="<?=( ! empty($dataset['btn_titulo']) ? $dataset['btn_titulo'] : '')?>" <?=in_array('btn_titulo', $required)? 'required':''; ?>>
										<?php echo form_error('btn_titulo'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Enlace</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="" name="link" placeholder="" value="<?=( ! empty($dataset['link']) ? $dataset['link'] : '')?>" <?=in_array('link', $required)? 'required':''; ?>>
										<?php echo form_error('link'); ?>
							        </div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Orden</label>
									<div class="col-sm-10">
										<input type="number" min="1" class="form-control" id="" name="orden" placeholder="" value="<?=( ! empty($dataset['orden']) ? $dataset['orden'] : '')?>" <?=in_array('orden', $required)? 'required':''; ?>>
										<?php echo form_error('orden'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label"></label>
									<div class="col-sm-2">
										<input type="radio" id="" name="estado" value="<?= _ACTIVO ?>" <?php if($dataset['estado']==_ACTIVO){ echo 'checked';} ?> <?=in_array('estado', $required)? 'required':''; ?>>
										Activo
									</div>
									<div class="col-sm-2">
										<input type="radio" id="" name="estado" value="<?= _INACTIVO ?>"<?php if($dataset['estado']==_INACTIVO){ echo 'checked';} ?> <?=in_array('estado', $required)? 'required':''; ?>>
										Inactivo
									</div>
					            </div>
								<div class="form-group">
									<label class="col-sm-2 control-label"></label>
									<div class="col-sm-10">
										<img class="img-responsive" src="files/banners/thumbs/<?=( ! empty($dataset['imagen']) ? $dataset['imagen'] : '') ?>" alt="<?=$dataset['imagen_title']?>">
									</div>
								</div>
								<div class="form-group">
				                    <label class="col-sm-2 control-label">Tipo Banners</label>
				                    <div class="col-sm-10">
				                       <select name="tipo_banner_id" class="form-control chosen-select" data-placeholder="Seleccione Un tipo de banner" id="escogerBanner" required>
					                       	<option></option>
											<option value="1" data-size-x="<?=$this->sizes['principal_x']?>" data-size-y="<?=$this->sizes['principal_y']?>">banner</option>
											<option value="2" data-size-x="<?=$this->sizes2['principal_x']?>" data-size-y="<?=$this->sizes2['principal_y']?>">promociones</option>
										</select>
				                        <?php echo form_error('tipo_banner_id'); ?>
				                    </div>
				                </div>	
							
								<div class="form-group">
									<label class="col-sm-2 control-label"></label>
									<div class="col-sm-10">
									<input type="hidden" name="imgant" value="<?=$dataset['imagen']?>">
										<p><div class="alert alert-info"> La imagen debe tener una medida de <span id="resultSize"><i><?=$this->sizes['principal_x']?></i> por <i><?=$this->sizes['principal_y']?></i></span> de lo contrario sera redimencionado a este tamaño </div></p>
										<input type="file" name="imagen">
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-offset-2 p-l-15">
										<button type="submit" class="btn btn-sm btn-success">Grabar</button>
									</div>
								</div>
							</form>
				</div>  <!-- fin del context -->
			</div>  <!-- fin del header -->
		</div><!--/row-->
	</div>
</div>

<script>
  	// $("#escogerBanner option[value="+ <?=$dataset['tipo_banner_id']?> +"]").attr("selected",true);
// 	  	$("button").click(function(){
// 	    $("input").trigger("select");
// });


		/*$('#escogerBanner').change(function(){
		  var data= $(this).val();
		  // alert(data);            
		});*/

		/*$('#escogerBanner')
		    .val(<?=$dataset['tipo_banner_id']?>)
		    .trigger('change');*/

</script>

<script type="text/javascript">
	//$(document).ready(function(){
		$("#escogerBanner").change(function(){
	            var option1 = $('option:selected', this).attr('data-size-x');
	            var option2 = $('option:selected', this).attr('data-size-y');
	            $('#resultSize').html('<i>'+option1+'</i> por <i>'+option2+'</i>');
	        });
		$('#escogerBanner')
		    .val(<?=$dataset['tipo_banner_id']?>)
		    .trigger('change');
	//});
</script>
<style type="text/css">
	#resultSize i {
		font-size:16px;
	}
</style>

