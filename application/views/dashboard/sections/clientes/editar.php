<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Editar')); ?>
<div class="page-body clearfix">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edicion de Clientes</div>
                <div style="position: relative;text-align: right;padding-bottom: 15px;">
                    <a class="btn" href="dashboard/clientes/lista"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a Clientes</u></a>
                    <div class="clearfix"></div>
                </div>
                    <?=$this->session->flashdata('message')?>
                    <div class="panel-body p-b-25">
                        <form class="form-horizontal" role="form" action="dashboard/clientes/editar/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>" method="post" enctype="multipart/form-data" id="formClientes">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nombres</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control slugName" id="" name="nombres" placeholder="" value="<?=( ! empty($dataset['nombres']) ? $dataset['nombres'] : '')?>" onkeyup="slugUrl('slugName', 'slugUrl');" <?=in_array('nombres', $requerid)? 'required':''; ?>>
                                                    <?=form_error('nombres'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Apellido</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control slugName" id="" name="apellidos" placeholder="" value="<?=( ! empty($dataset['apellidos']) ? $dataset['apellidos'] : '')?>" onkeyup="slugUrl('slugName', 'slugUrl');" <?=in_array('apellidos', $requerid)? 'required':''; ?>>
                                                    <?=form_error('apellidos'); ?>
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
                                <label class="col-sm-2 control-label">Teléfono</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control slugName" id="" name="telefono" placeholder="" value="<?=( ! empty($dataset['telefono']) ? $dataset['telefono'] : '')?>" onkeyup="slugUrl('slugName', 'slugUrl');" <?=in_array('telefono', $requerid)? 'required':''; ?>>
                                                    <?=form_error('telefono'); ?>
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
                                <div class="col-sm-offset-2 p-l-15">
                                    <button type="submit" class="btn btn-sm btn-success">Grabar</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div><!--/#content.col-md-0-->
    </div>
</div>