<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Nuevo')); ?>
<div class="page-body clearfix">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">           
            <div class="panel panel-default">
                <div class="panel-heading">Nueva pregunta frecuente</div>
                <div style="position: relative;text-align: right;padding-bottom: 15px;">
                    <a class="btn" href="dashboard/prg_frecuentes/lista"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar al listado de preguntas</u></a>
                    <div class="clearfix"></div>
                </div>
                <?=$this->session->flashdata('message');?>
                <div class="panel-body p-b-25">
                    <form class="form-horizontal" role="form" action="dashboard/prg_frecuentes/nuevo" method="post" enctype="multipart/form-data" id="formPrgFrecuentes">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Preguntas</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="" name="pregunta" placeholder="" value="" <?=in_array('pregunta', $requerid)? 'required':''; ?>>
                            <?php echo form_error('pregunta'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Respuestas</label>
                            <div class="col-sm-10">
                            <textarea class="form-control"  id="ckeditor" name="respuesta" <?=in_array('respuesta', $requerid)? 'required':''; ?>></textarea>
                                <?php echo form_error('respuesta'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Autor</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="" name="autor" placeholder="" value="" <?=in_array('autor', $requerid)? 'required':''; ?>>
                            <?php echo form_error('autor'); ?>
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
                            <label class="col-sm-2 control-label">Mail_autor</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="" name="mail_autor" placeholder="" value="" <?=in_array('mail_autor', $requerid)? 'required':''; ?>>
                                    <?php echo form_error('mail_autor'); ?>
                            </div>
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