<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Nueva Categoria')); ?>
<div class="page-body clearfix">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Categoria</div>
                <?=$this->session->flashdata('success')?>
                <div class="panel-body p-b-25">
                    <form class="form-horizontal" action="dashboard/categorias/nuevo" method="post" enctype="multipart/form-data" id="formCategoria">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control catNombre" id="" name="nombre" placeholder="" onkeyup="slugUrl('catNombre', 'slugUrl');" <?=in_array('nombre', $requerid)? 'required':''; ?>>
                                <?php echo form_error('nombre'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Url</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control slugUrl" id="" name="url" placeholder="" autocomplete="off" <?=in_array('nombre', $requerid)? 'required':''; ?>>
                                <?php echo form_error('url'); ?>
                            </div>
                        </div>
                        <div class="form-group" id="categorias" >
                        <?php 
                        function catRecursive($array,$space = 0){
                            foreach ($array as $key => $value) {
                                $deshabilitado = ($value['padre'] == '1')? 'disabled': '';
                                echo "<option value='".$value['id']."'>".str_repeat("&nbsp;&nbsp;", $space).$value['nombre']."</option>";
                                if (is_array($value['sub_categorias']) && !empty($value['sub_categorias'])) {
                                    catRecursive($value['sub_categorias'], $space + 1);
                                }
                            }
                        }
                        ?>
                        </div>
                        <div class="form-group" id="categorias" >
                            <label class="col-sm-2 control-label">Elija Categoria</label>
                            <div class="col-sm-10">
                                <select name="padre_id" class="selectpicker form-control show-tick" <?=in_array('padre_id', $requerid)? 'required':''; ?>>
                                    <option value='<?=_PARENT_ID?>'>Categoria Principal</option>
                                    <?php catRecursive($dataset); ?>
                                </select>
                                <?php echo $this->session->flashdata('error_cat');?>
                            </div>
                        </div>
                        <?php //echo '<pre>';print_r($atributos);echo '</pre>'; ?>
                        <div class="form-group" id="categorias" >
                            <label class="col-sm-2 control-label">Atributos</label>
                            <div class="col-sm-10">

                                <?php echo form_multiselect('atributos[]', $atributos,array(),array('class'=>'chosen-select form-control')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-10">
                                <textarea class="form-control"  id="ckeditor" name="descripcion" <?=in_array('descripcion', $requerid)? 'required':''; ?>></textarea>
                                <?php echo form_error('descripcion'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Orden</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" min="1" name="orden" placeholder="" <?=in_array('orden', $requerid)? 'required':''; ?>>
                                <?php echo form_error('orden'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-2">
                                <input type="radio" id="" name="estado" value="1" checked data-icheck-theme="square" data-icheck-color="aero" <?=in_array('estado', $requerid)? 'required':''; ?>>
                                <label for="estado">Activo</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="radio" id="" name="estado" value="0" data-icheck-theme="square" data-icheck-color="blue" <?=in_array('estado', $requerid)? 'required':''; ?>>
                                <label for="estado">Inactivo</label>
                            </div>
                            <div class="col-sm-2"><?php echo form_error('estado'); ?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">

                                <div class="alert alert-info"> La imagen debe tener una medida de <?=$this->sizes['principal_x']?> por <?=$this->sizes['principal_y']?> de lo contrario sera redimencionado a este tamaño </div>
                                <input type="file" name="imagen" required>
                                <?php echo form_error('imagen'); ?>
                            </div>
                        </div>
                        <legend>Parámetros para SEO</legend>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Titulo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="seo_title" placeholder="" <?=in_array('seo_title', $requerid)? 'required':''; ?>>
                                <?php echo form_error('seo_title'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="seo_description" placeholder="" <?=in_array('seo_description', $requerid)? 'required':''; ?>>
                                <?php echo form_error('seo_description'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Keywords</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="seo_keywords" placeholder="" <?=in_array('seo_keywords', $requerid)? 'required':''; ?>>
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