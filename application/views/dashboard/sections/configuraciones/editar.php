<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Editar')); ?>
<div class="page-body clearfix">
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Edicion de configuraciones</div>
				<div style="position: relative;text-align: right;padding-bottom: 15px;">
                    <a class="btn" href="dashboard/configuraciones/lista"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a Configuraciones</u></a>
                    <div class="clearfix"></div>
                </div>
				<?php $success = $this->session->flashdata('success');?>
				<?php if(! empty($success)): ?>
				<div class="alert alert-success">Los datos han sido grabados correctamente</div>
				<?php endif; ?>
				<div class="panel-body p-b-25">
					<form class="form-horizontal" role="form" action="dashboard/configuraciones/editar/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>" method="post" enctype="multipart/form-data" id="formConfiguraciones">
						<div class="form-group">
							<label class="col-sm-2 control-label">Llave</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" name="llave" placeholder="" value="<?=( ! empty($dataset['llave']) ? $dataset['llave'] : '')?>" <?=in_array('llave', $requerid)? 'required':''; ?>>
								<?php echo form_error('llave'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Valor</label>

							<?php if($dataset['tipo']==0){ ?>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="valor" name="valor" value="<?=( ! empty($dataset['valor']) ? $dataset['valor'] : '')?>" <?=in_array('valor', $requerid)? 'required':''; ?>>
								<?php echo form_error('valor'); ?>
							</div>

							<?php }else if($dataset['tipo']==1){ ?>
							<div class="col-sm-10">
								<textarea class="form-control" id="ckeditor" name="valor" <?=in_array('valor', $requerid)? 'required':''; ?>><?=( ! empty($dataset['valor']) ? $dataset['valor'] : '')?></textarea>
								<?php echo form_error('valor'); ?>
							</div>

							<?php }else if($dataset['tipo']==3){
								$json = json_decode($dataset['descripcion'],true);
								$dataset['descripcion'] = $json['descripcion'];
							?>
							<?php foreach ($json['valores'] as $i => $valor): ?>
							<div class="col-sm-2">
								<input type="radio" name="valor" value="<?=$i?>" <?php if($dataset['valor']==$i) echo ' checked="checked"'; ?><?=in_array('valor', $requerid)? 'required':''; ?>>
								<?=$valor?>                            
							</div>
							<?php endforeach ?>

							<?php }else if($dataset['tipo']==2){ ?>
							<div class="col-sm-10">
								<img src="files/configuraciones/thumbs/<?=( ! empty($dataset['valor']) ? $dataset['valor'] : '') ?>" width="400" alt="<?=$dataset['llave']?>">
							</div>
							<div class="col-sm-2">
							</div>
							<div class="col-sm-10">
								<input type="hidden" name="imgant" value="<?=$dataset['valor']?>">
								<p>
								<div class="alert alert-info"> La foto debe tener una medida de <?=$this->sizes['principal_x']?> por <?=$this->sizes['principal_y']?> de lo contrario sera redimencionado a este tamaño </div>
								</p>
								<input type="file" name="valor">
							</div>
							<?php } ?>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Descripcion</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="" name="descripcion" placeholder="" value="<?=( ! empty($dataset['descripcion']) ? $dataset['descripcion'] : '')?>" <?=in_array('descripcion', $requerid)? 'required':''; ?>>
								<?php echo form_error('descripcion'); ?>
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