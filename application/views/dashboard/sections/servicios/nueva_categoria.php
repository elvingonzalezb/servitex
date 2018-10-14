 <?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Nueva Categoria')); ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">    
        <div class="panel panel-default">
            <div class="panel-heading">Nueva Categoria</div>
            <div style="position: relative;text-align: right;padding-bottom: 15px;">
                <a class="btn" href="dashboard/servicios/listaCategoria"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a Categorias</u></a>
                <div class="clearfix"></div>
            </div>
            <?=$this->session->flashdata('message')?>
            <div class="panel-body p-b-25">
                <form class="form-horizontal" role="form" action="dashboard/servicios/nuevaCategoria" method="post" enctype="multipart/form-data" id="formCategoria">
                    
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
                        <label class="col-sm-2 control-label">Descripcion</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" id="ckeditor" name="descripcion" placeholder="" value="" <?=in_array('descripcion', $requerid)? 'required':''; ?>></textarea>
                        <?php echo form_error('descripcion'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Orden</label>
                        <div class="col-sm-10">
                        <input type="number" min="1" class="form-control" id="" name="orden" placeholder="" value="1" <?=in_array('orden', $requerid)? 'required':''; ?>>
                        <?php echo form_error('orden'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-2">
                            <input type="radio" id="" name="destacado" value="1" <?=in_array('destacado', $requerid)? 'required':''; ?>>
                            Destacado
                            </div>
                            <div class="col-sm-2">
                            <input type="radio" id="" name="destacado" value="0" checked <?=in_array('destacado', $requerid)? 'required':''; ?>>
                            No destacado
                            </div>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-2">
                            <input type="radio" id="" name="estado" value="<?= _ACTIVO ?>" checked <?=in_array('estado', $requerid)? 'required':''; ?>>
                            Activo
                            </div>
                            <div class="col-sm-2">
                            <input type="radio" id="" name="estado" value="<?= _INACTIVO ?>" <?=in_array('estado', $requerid)? 'required':''; ?>>
                            Inactivo
                            </div>
                        </label>
                    </div>    
                     <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                        <p><div class="alert alert-info"> La imagen debe tener una medida de <?=$this->sizes['principal_x']?> por <?=$this->sizes['principal_y']?> de lo contrario sera redimencionado a este tamaño </div></p>
                        <input type="file" name="imagen" required>
                        </div>
                    </div>
                    
                    <legend>Parámetros para SEO</legend>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Titulo</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="" name="seo_title" placeholder="" value="" <?=in_array('seo_title', $requerid)? 'required':''; ?>>
                        <?php echo form_error('seo_title'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Descripcion</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="" name="seo_description" placeholder="" value="" <?=in_array('seo_description', $requerid)? 'required':''; ?>>
                        <?php echo form_error('seo_description'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">seo_keywords</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="" name="seo_keywords" placeholder="" value="" <?=in_array('seo_keywords', $requerid)? 'required':''; ?>>
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