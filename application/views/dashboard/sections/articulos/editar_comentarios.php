<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Editar Comentario')); ?>
<div class="page-body clearfix">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edicion de Comentario</div>
                <div style="position: relative;text-align: right;padding-bottom: 15px;">
                    <a class="btn" href="dashboard/articulos/listaComentarios/<?=$id_articulo?>"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a Comentarios</u></a>
                </div>
                <?=$this->session->flashdata('message')?>
                <div class="panel-body p-b-25">
                    <form class="form-horizontal" role="form" action="dashboard/articulos/editarComentarios/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>" method="post" enctype="multipart/form-data" id="formDejarComentario">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                    <input type="text" class="form-control slugName" id="" name="nombre" placeholder="" value="<?=( ! empty($dataset['nombre']) ? $dataset['nombre'] : '')?>" onkeyup="slugUrl('slugName', 'slugUrl');" <?=in_array('nombre', $requerid)? 'required':''; ?>>
                                        <?=form_error('nombre'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Correo</label>
                            <div class="col-sm-10">
                                    <input type="text" class="form-control slugName" id="" name="correo" placeholder="" value="<?=( ! empty($dataset['correo']) ? $dataset['correo'] : '')?>" onkeyup="slugUrl('slugName', 'slugUrl');" <?=in_array('correo', $requerid)? 'required':''; ?>>
                                        <?=form_error('correo'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Comentario</label>
                            <div class="col-sm-10">
                                <textarea <?=in_array('comentario', $requerid)? 'required':''; ?> class="form-control"  id="ckeditor" name="comentario" ><?=( ! empty($dataset['comentario']) ? $dataset['comentario'] : '')?></textarea>
                                <?php echo form_error('comentario'); ?>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Respuesta</label>
                            <div class="col-sm-10">
                                <textarea <?=in_array('respuesta', $requerid)? 'required':''; ?> class="form-control"  id="ckeditor2" name="respuesta" ><?=( ! empty($dataset['respuesta']) ? $dataset['respuesta'] : '')?></textarea>
                                <?php echo form_error('respuesta'); ?>
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