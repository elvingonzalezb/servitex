<link href="assets/dashboard/adminbsb/plugins/fileuploader/src/jquery.fileuploader.css" media="all" rel="stylesheet">
<script src="assets/dashboard/adminbsb/plugins/fileuploader/src/jquery.fileuploader.min.js" type="text/javascript"></script>
<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Editar Servicio')); ?>
<div class="page-body clearfix">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">            
            <div class="panel panel-default">
                <div class="panel-heading">Edicion de Servicio</div>
                <div style="position: relative;text-align: right;padding-bottom: 15px;">
                    <a class="btn" href="dashboard/solo_servicios_galerias/listaServicio"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a Servicios</u></a>
                    <div class="clearfix"></div>
                </div>
                <?=$this->session->flashdata('message')?>
                <div class="panel-body p-b-25">
                                <form class="form-horizontal" role="form" action="dashboard/solo_servicios_galerias/editarServicio/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>" method="post" enctype="multipart/form-data" id="formServicios">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nombre</label>
                                        <div class="col-sm-10">
                                                <input type="text" class="form-control slugName" id="" name="nombre" placeholder="" value="<?=( ! empty($dataset['nombre']) ? $dataset['nombre'] : '')?>" onkeyup="slugUrl('slugName', 'slugUrl');" <?=in_array('nombre', $requerid)? 'required':''; ?>>
                                                    <?=form_error('nombre'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Url</label>
                                        <div class="col-sm-10">
                                               <input type="text" class="form-control slugUrl" id="" name="url" placeholder="" value="<?=( ! empty($dataset['url']) ? $dataset['url'] : '')?>" <?=in_array('url', $requerid)? 'required':''; ?>>
                                                    <?=form_error('url'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Descripcion</label>
                                        <div class="col-sm-10">
                                            <textarea <?=in_array('descripcion', $requerid)? 'required':''; ?> class="form-control"  id="ckeditor" name="descripcion" ><?=( ! empty($dataset['descripcion']) ? $dataset['descripcion'] : '')?></textarea>
                                            <?php echo form_error('descripcion'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Orden</label>
                                        <div class="col-sm-10">
                                            <input type="number" min="1" class="form-control" id="" name="orden" placeholder="" value="<?=( ! empty($dataset['orden']) ? $dataset['orden'] : '')?>" <?=in_array('orden', $requerid)? 'required':''; ?>>
                                            <?php echo form_error('orden'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-2">
                                            <input type="radio" id="" name="destacado" value="1" <?php if($dataset['destacado']==1){ echo 'checked';} ?> <?=in_array('destacado', $requerid)? 'required':''; ?>>
                                                Destacado
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="radio" id="" name="destacado" value="0"<?php if($dataset['destacado']==0){ echo 'checked';} ?> <?=in_array('destacado', $requerid)? 'required':''; ?>>
                                            No destacado
                                            </div>
                                    </div>   
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-2">
                                            <input type="radio" id="" name="estado" value="<?= _ACTIVO ?>" <?php if($dataset['estado']==_ACTIVO){ echo 'checked';} ?> <?=in_array('estado', $requerid)? 'required':''; ?>>
                                                Activo
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="radio" id="" name="estado" value="<?= _INACTIVO ?>"<?php if($dataset['estado']==_INACTIVO){ echo 'checked';} ?> <?=in_array('estado', $requerid)? 'required':''; ?>>
                                            Inactivo
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                        <img src="files/solo_servicios/thumbs/<?=( ! empty($dataset['imagen']) ? $dataset['imagen'] : '') ?>" width="400" class="img-responsive" alt="<?=$dataset['imagen_title']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="imgant" value="<?=$dataset['imagen']?>">
                                            <input type="hidden" name="image_id" value="<?=$dataset['image_id']?>">
                                            <p><div class="alert alert-info"> La imagen debe tener una medida de <?=$this->sizes['principal_x']?> por <?=$this->sizes['principal_y']?> de lo contrario sera redimencionado a este tamaño </div></p>
                                            <input type="file" name="files" id="fileuploader" multiple>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                            <div class="col-sm-12">
                                                <?php foreach ($galerias as $galeria): ?>
                                                <div class="col-sm-2 m-b-30" id="img-<?=$galeria['id'] ?>">
                                                    <a href="javascript:void(0)" onclick="eliminarGaleriaImg(<?=$galeria['id']; ?>);return false;" class="btn-close-galeria" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                    <a href="files/solo_servicios/thumbs/<?=( ! empty($galeria['imagen']) ? $galeria['imagen'] : '') ?>" data-lightbox="gallery" data-title="<?=$galeria['imagen_title']; ?>">
                                                        <img class="img-responsive" src="files/solo_servicios/thumbs/<?=( ! empty($galeria['imagen']) ? $galeria['imagen'] : '') ?>" alt="<?=$galeria['imagen_title']; ?>">
                                                    </a>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                            <div id="ajax-message" class="col-sm-12"></div>
                                        </div>
                                    </div>

                                    <legend>Parámetros para SEO</legend>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Titulo</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="" name="seo_title" placeholder="" value="<?=( ! empty($dataset['seo_title']) ? $dataset['seo_title'] : '')?>" <?=in_array('descripcion', $requerid)? 'required':''; ?>>
                                            <?php echo form_error('seo_title'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Descripcion</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="" name="seo_description" placeholder="" value="<?=( ! empty($dataset['seo_description']) ? $dataset['seo_description'] : '')?>" <?=in_array('seo_description', $requerid)? 'required':''; ?>>
                                            <?php echo form_error('seo_description'); ?>
                                        </div>
                                    </div>              
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">seo_keywords</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="" name="seo_keywords" placeholder="" value="<?=( ! empty($dataset['seo_keywords']) ? $dataset['seo_keywords'] : '')?>" <?=in_array('seo_keywords', $requerid)? 'required':''; ?>>
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
            </div> <!--  panel panel-default -->
        </div>
    </div>
</div>

<script type="text/javascript">

    function eliminarGaleriaImg(id_imagen) {
        swal({
            title: "¿Estás seguro?",
            text: "¡No podrás recuperar esta imagen!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sí, borrar!",
            cancelButtonText: "No, cancelar!",
            closeOnConfirm: false
        }, function (isConfirm) {
            if (!isConfirm) return;
            $.ajax({
                data:  { "id_imagen" : id_imagen },
                url:   'dashboard/solo_servicios_galerias/eliminarGaleriaImg',
                dataType: "json",
                type:  'post',
                success: function (response) {
                    $('#img-'+id_imagen).remove();
                    swal("¡Hecho!", "¡Se eliminó con éxito!", "success");
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal("¡Error al borrar!", "Inténtalo de nuevo", "error");
                }
            });
        });
    }

</script>