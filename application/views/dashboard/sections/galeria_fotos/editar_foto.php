<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Editar Foto')); ?>
<div class="page-body clearfix">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edicion de Fotos</div>
                <div style="position: relative;text-align: right;padding-bottom: 15px;">
                    <a class="btn" href="dashboard/galeria_fotos/lista_foto/<?=$id_album?>"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a Galeria de Fotos</u></a>
                    <div class="clearfix"></div>
                </div>
                <?=$this->session->flashdata('message')?>
                <div class="panel-body p-b-25">
                    <form class="form-horizontal" role="form" action="dashboard/galeria_fotos/editar_foto/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>/<?=$id_album?>" method="post" enctype="multipart/form-data" id="formGaleriaFotos">
                                
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Fotos</label>
                            <div class="col-sm-10">
                                <select name="album_id" class="form-control chosen-select" id="album_foto_id" <?=in_array('album_id', $requerid)? 'required':''; ?>>
                                    <?php foreach ($albumes_fotos as $key => $value) {?>
                                    <option value="<?=$value['id']?>"><?= $value['nombre']?></option>
                                     <?php }  ?> 
                                     ?>
                                </select>
                                        <?php echo form_error('album_id'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control slugName" id="" name="nombre" placeholder="" value="<?=( ! empty($dataset['nombre']) ? $dataset['nombre'] : '')?>" onkeyup="slugUrl('slugName', 'slugUrl');" <?=in_array('nombre', $requerid)? 'required':''; ?>>
                                    <?=form_error('nombre'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Descripcion</label>
                            <div class="col-sm-10">
                                <textarea <?=in_array('descripcion', $requerid)? 'required':''; ?> class="form-control" id="ckeditor" name="descripcion" placeholder=""><?=( ! empty($dataset['descripcion']) ? $dataset['descripcion'] : '')?></textarea>
                                <?php echo form_error('descripcion'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Orden</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="orden" placeholder="" value="<?=( ! empty($dataset['orden']) ? $dataset['orden'] : '')?>" <?=in_array('orden', $requerid)? 'required':''; ?>>
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
                            <img src="files/galeria_fotos/thumbs/<?=( ! empty($dataset['imagen']) ? $dataset['imagen'] : '') ?>" width="400" alt="<?=$dataset['imagen_title']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <input type="hidden" name="imgant" value="<?=$dataset['imagen']?>">
                                <p><div class="alert alert-info"> La foto debe tener una medida de <?=$this->sizes['principal_x']?> por <?=$this->sizes['principal_y']?> de lo contrario sera redimencionado a este tamaño </div></p>
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
            </div>
        </div>
    </div>
</div>

<script>
  $("#album_foto_id option[value="+ <?=$dataset['alb_foto_id']?> +"]").attr("selected",true);
</script>