<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Editar Categoria')); ?>
<div class="page-body clearfix">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Categoria</div>
                <?=$this->session->flashdata('message')?>
                <div class="panel-body p-b-25">
                    <form class="form-horizontal" action="dashboard/categorias/editar/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>" method="post" enctype="multipart/form-data" id="formCategoria">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control catNombre" id="" name="nombre"  value="<?=( ! empty($dataset['nombre']) ? $dataset['nombre'] : '')?>" onkeyup="slugUrl('catNombre', 'slugUrl');" <?=in_array('nombre', $requerid)? 'required':''; ?>>
                                <?php echo form_error('nombre'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Url</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control slugUrl" id="" name="url" value="<?=( ! empty($dataset['url']) ? $dataset['url'] : '')?>" autocomplete="off" <?=in_array('url', $requerid)? 'required':''; ?>>
                                <?php echo form_error('url'); ?>
                            </div>
                        </div>
                        <div class="form-group" id="categorias" >
                            <label class="col-sm-2 control-label">Atributos</label>
                            <div class="col-sm-10">
                                <?php echo form_multiselect('atributos[]', $atributos,$dataset['atributos'],array('class'=>'chosen-select form-control')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-10">
                                <textarea class="form-control"  id="ckeditor" name="descripcion" <?=in_array('descripcion', $requerid)? 'required':''; ?>><?=( ! empty($dataset['descripcion']) ? $dataset['descripcion'] : '')?></textarea>
                                <?php echo form_error('descripcion'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Orden</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" min="1" name="orden" placeholder="" value="<?=( ! empty($dataset['orden']) ? $dataset['orden'] : '')?>" <?=in_array('orden', $requerid)? 'required':''; ?>>
                                <?php echo form_error('orden'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <img src="files/categorias/thumbs/<?=( ! empty($dataset['imagen']) ? $dataset['imagen'] : '') ?>" alt="<?=( ! empty($dataset['imagen_title']) ? $dataset['imagen_title'] : '')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-2">
                                <input type="radio" id="" name="estado" value="<?= _ACTIVO ?>" <?php if($dataset['estado']==_ACTIVO){ echo 'checked';} ?> data-icheck-theme="square" data-icheck-color="aero" <?=in_array('estado', $requerid)? 'required':''; ?>>
                                <label for="estado">Activo</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="radio" id="" name="estado" value="<?= _INACTIVO ?>"<?php if($dataset['estado']==_INACTIVO){ echo 'checked';} ?> data-icheck-theme="square" data-icheck-color="blue" <?=in_array('estado', $requerid)? 'required':''; ?>>
                                <label for="estado">Inactivo</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <input type="hidden" name="imgant" value="<?=$dataset['imagen']?>">

                                <div class="alert alert-info"> La imagen debe tener una medida de <?=$this->sizes['principal_x']?> por <?=$this->sizes['principal_y']?> de lo contrario sera redimencionado a este tamaño </div>
                                <input type="file" name="imagen">
                            </div>
                        </div>
                        <legend>Parámetros para SEO</legend>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Titulo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="seo_title" placeholder="" value="<?=$dataset['seo_title']?>" <?=in_array('seo_title', $requerid)? 'required':''; ?>>
                                <?php echo form_error('seo_title'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="seo_description" placeholder="" value="<?=$dataset['seo_description']?>" <?=in_array('seo_description', $requerid)? 'required':''; ?>>
                                <?php echo form_error('seo_description'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Keywords</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="seo_keywords" placeholder="" value="<?=$dataset['seo_keywords']?>" <?=in_array('seo_keywords', $requerid)? 'required':''; ?>>
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