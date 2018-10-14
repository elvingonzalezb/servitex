<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Editar')); ?>
<div class="page-body clearfix">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">            
            <div class="panel panel-default">
                <div class="panel-heading">Edicion de testimonios</div>
                <div style="position: relative;text-align: right;padding-bottom: 15px;">
                    <a class="btn" href="dashboard/testimonios/lista"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a Testimonios</u></a>
                    <div class="clearfix"></div>
                </div>
                <?=$this->session->flashdata('message')?>
                <div class="panel-body p-b-25">
                                <form class="form-horizontal" role="form" action="dashboard/testimonios/editar/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>" method="post" enctype="multipart/form-data" id="formTestimonios">    
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nombre</label>
                                        <div class="col-sm-10">
                                                <input type="text" class="form-control slugName" id="" name="nombre" placeholder="" value="<?=( ! empty($dataset['nombre']) ? $dataset['nombre'] : '')?>" onkeyup="slugUrl('slugName', 'slugUrl');" <?=in_array('nombre', $requerid)? 'required':''; ?>>
                                                    <?=form_error('nombre'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Testimonio</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control"  id="ckeditor" name="testimonio" <?=in_array('testimonio', $requerid)? 'required':''; ?>><?=( ! empty($dataset['testimonio']) ? $dataset['testimonio'] : '')?></textarea>
                                            <?php echo form_error('testimonio'); ?>
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
                                        <img src="files/testimonios/thumbs/<?=( ! empty($dataset['imagen']) ? $dataset['imagen'] : '') ?>" width="400" class="img-responsive" alt="<?=$dataset['nombre']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                            <!-- <label for="">Imagen</label> -->
                                            <input type="hidden" name="imgant" value="<?=$dataset['imagen']?>">
                                            <p><div class="alert alert-info"> La imagen debe tener una medida de <?=$this->sizes['principal_x']?> por <?=$this->sizes['principal_y']?> de lo contrario sera redimencionado a este tamaño </div></p>
                                            <input type="file" name="imagen">
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
<script>
  $("#cat_id option[value="+ <?=$dataset['categoria_id']?> +"]").attr("selected",true);
</script>
