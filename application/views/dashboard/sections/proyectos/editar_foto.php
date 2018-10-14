<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Editar Foto','id_trabajo'=>$id_trabajo,'id_proyecto'=>'')); ?>
<div class="page-body clearfix">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edicion de Foto</div>
                <div style="position: relative;text-align: right;padding-bottom: 15px;">
                    <a class="btn" href="dashboard/proyectos/listaFoto/<?=$id_trabajo?>"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a las Fotos</u></a>
                    <div class="clearfix"></div>
                </div>
                <?=$this->session->flashdata('message')?>
                <div class="panel-body p-b-25">
                    <form class="form-horizontal" role="form" action="dashboard/proyectos/editarFoto/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>/<?=$id_trabajo?>" method="post" enctype="multipart/form-data" id="formFotosProyecto">
                               
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Trabajos</label>
                            <div class="col-sm-10">
                                <select name="galeria_proyecto_id" class="form-control chosen-select" id="foto_id" <?=in_array('galeria_proyecto_id', $requerid)? 'required':''; ?>>
                                    <?php foreach ($foto as $key => $value) {?>
                                    <option value="<?=$value['id']?>"><?= $value['nombre']?></option>
                                     <?php }  ?> 
                                     ?>
                                </select>
                                    <?php echo form_error('galeria_proyecto_id'); ?>
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
                            <label class="col-sm-2 control-label">Orden</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="orden" placeholder="" value="<?=( ! empty($dataset['orden']) ? $dataset['orden'] : '')?>" <?=in_array('orden', $requerid)? 'required':''; ?>>
                                <?php echo form_error('orden'); ?>
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
                            <img src="files/proyectos/thumbs/<?=( ! empty($dataset['imagen']) ? $dataset['imagen'] : '') ?>" width="400" alt="<?=$dataset['imagen_title']?>">
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
  $("#foto_id option[value="+ <?=$dataset['galeria_proyecto_id']?> +"]").attr("selected",true);
</script>