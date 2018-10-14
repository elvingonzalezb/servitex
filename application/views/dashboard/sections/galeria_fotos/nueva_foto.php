<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Nueva Foto')); ?>
<div class="page-body clearfix">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Nueva Foto</div>
                <div style="position: relative;text-align: right;padding-bottom: 15px;">
                <?php if($id_album!='0'){?>
                    <a class="btn" href="dashboard/galeria_fotos/lista_foto/<?=$id_album?>"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a las Fotos</u></a>
               <?php } else { ?>
                    <a class="btn" href="dashboard/galeria_fotos/lista_album"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar al Álbum</u></a>
                <?php } ?>
                    <div class="clearfix"></div>
                </div>
                <?=$this->session->flashdata('message')?>
                <div class="panel-body p-b-25">
                    <form class="form-horizontal" role="form" action="dashboard/galeria_fotos/nueva_foto" method="post" enctype="multipart/form-data" id="formGaleriaFotos">                
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Fotos</label>
                            <div class="col-sm-10">
                                <select name="album_id" class="form-control chosen-select" id="selectedAlbum" data-placeholder="Seleccione Un Album" <?php echo in_array('album_id', $requerid)? 'required':''; ?>>
                                     <option></option>
                                    <?php foreach ($albumes as $key => $value) {?>
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
                                    <input type="text" class="form-control slugName" id="" name="nombre" placeholder="" onkeyup="slugUrl('slugName', 'slugUrl');" <?php echo in_array('nombre', $requerid)? 'required':''; ?>>
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
                                    <!-- <label for="">Imagen</label> -->
                            <p><div class="alert alert-info"> La imagen debe tener una medida de <?=$this->sizes['principal_x']?> por <?=$this->sizes['principal_y']?> de lo contrario sera redimencionado a este tamaño </div></p>
                            <input type="file" name="imagen" required>
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

<script type="text/javascript">
    $("#selectedAlbum option[value="+<?=$id_album?>+"]").attr("selected",true)
</script>