<div class="page-body clearfix">
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
                <div class="box col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">Seccion <?php echo mostrarTitulo($this->uri->segments[4]) ?></div>
						<?php $success =$this->session->flashdata('success');?>
							<?php if(! empty($success)): ?>
		                    <div class="alert alert-success">Los datos han sido grabados correctamente</div>
		                    <?php endif; ?>

						<div class="panel-body p-b-25">
							
							<form class="form-horizontal" action="dashboard/secciones/editar/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>" method="post" enctype="multipart/form-data" id="formSecciones">

								<div class="form-group">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-10">
                                    <img src="files/secciones/thumbs/<?=( ! empty($dataset['imagen']) ? $dataset['imagen'] : '') ?>" width="400" alt="<?=$dataset['imagen_title']?>">
                                    </div>
                                </div>
                                
	                            <div class="form-group">
	                                <label class="col-sm-2 control-label"></label>
	                                <div class="col-sm-10">
	                                    <input type="hidden" name="imgant" value="<?=$dataset['imagen']?>">
	                                    <p><div class="alert alert-info"> La imagen debe tener una medida de <?=$this->sizes['principal_x']?> por <?=$this->sizes['principal_y']?> de lo contrario sera redimencionado a este tamaño </div></p>
	                                     <input type="file" name="imagen">
	                                </div>
	                            </div>

	                            <div class="form-group">
		                            <label class="col-sm-2 control-label">Imagen</label>
		                            <div class="col-sm-2">
		                                <input type="radio" id="" name="visible" value="<?= _ACTIVO ?>" <?php if($dataset['visible']==_ACTIVO){ echo 'checked';} ?> <?=in_array('visible', $requerid)? 'required':''; ?>>
		                                Visible
		                            </div>
		                            <div class="col-sm-2">
		                                 <input type="radio" id="" name="visible" value="<?= _INACTIVO ?>"<?php if($dataset['visible']==_INACTIVO){ echo 'checked';} ?> <?=in_array('visible', $requerid)? 'required':''; ?>>
		                                No visible
		                            </div>
		                        </div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Nombre</label>
									<div class="col-sm-10">
										<input type="text" <?=in_array('titulo', $requerid)? 'required':''; ?>  class="form-control slugName" id="" name="titulo" placeholder="" value="<?=( ! empty($dataset['titulo']) ? $dataset['titulo'] : '')?>" >
										<?php echo form_error('titulo'); ?>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Descripción</label>
									<div class="col-sm-10">
										<textarea <?=in_array('descripcion', $requerid)? 'required':''; ?> class="form-control"  id="ckeditor" name="descripcion" ><?=( ! empty($dataset['descripcion']) ? $dataset['descripcion'] : '')?></textarea>
										<?php echo form_error('descripcion'); ?>
									</div>
								</div>

								<legend>Parámetros para SEO</legend>
								<div class="form-group">
									<label class="col-sm-2 control-label">Title</label>
									<div class="col-sm-10">
										<input type="text" <?=in_array('seo_title', $requerid)? 'required':''; ?>  class="form-control" id="" name="seo_title" placeholder="" value="<?=$dataset['seo_title']?>" >
										<?php echo form_error('seo_title'); ?>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Description</label>
									<div class="col-sm-10">
										<input type="text" <?=in_array('seo_description', $requerid)? 'required':''; ?>  class="form-control" id="" name="seo_description" placeholder="" value="<?=$dataset['seo_description']?>" >
										<?php echo form_error('seo_description'); ?>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Keywords</label>
									<div class="col-sm-10">
										<input type="text" <?=in_array('seo_keywords', $requerid)? 'required':''; ?>  class="form-control" id="" name="seo_keywords" placeholder="" value="<?=$dataset['seo_keywords']?>" >
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
	</div>
</div>