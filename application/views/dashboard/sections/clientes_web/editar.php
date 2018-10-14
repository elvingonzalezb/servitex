<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Editar')); ?>
<div class="page-body clearfix">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                    <div class="panel-heading">Edicion de Clientes</div>
                    <div style="position: relative;text-align: right;padding-bottom: 15px;">
                        <a class="btn" href="dashboard/clientes_web/lista"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a Clientes</u></a>
                        <div class="clearfix"></div>
                    </div>
                    <?=$this->session->flashdata('message')?>
                    <div class="panel-body p-b-25">
                        <form class="form-horizontal" role="form" action="dashboard/clientes_web/editar/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>" method="post" enctype="multipart/form-data" id="formClientesWeb">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Razón Social</label>
                                <div class="col-sm-10">
                                        <input type="text" class="form-control slugName" id="" name="razon_social" placeholder="" value="<?=( ! empty($dataset['razon_social']) ? $dataset['razon_social'] : '')?>" onkeyup="slugUrl('slugName', 'slugUrl');" <?=in_array('razon_social', $requerid)? 'required':''; ?>>
                                            <?=form_error('razon_social'); ?>
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
                                <label class="col-sm-2 control-label">Orden</label>
                                <div class="col-sm-10">
                                    <input type="number" min="1" class="form-control" id="" name="orden" placeholder="" value="<?=( ! empty($dataset['orden']) ? $dataset['orden'] : '')?>" <?=in_array('orden', $requerid)? 'required':''; ?>>
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
                                    <img src="files/partners/thumbs/<?=( ! empty($dataset['logo']) ? $dataset['logo'] : '') ?>" width="400" alt="<?=$dataset['razon_social']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="imgant" value="<?=$dataset['logo']?>">
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
            </div>
        </div><!--/#content.col-md-0-->
    </div>
</div>