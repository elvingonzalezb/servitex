<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Nuevo')); ?>
<div class="page-body clearfix">
    <div class="row clearfix">       
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Cliente Web</div>  
                <div style="position: relative;text-align: right;padding-bottom: 15px;">
                    <a class="btn" href="dashboard/clientes_web/lista"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a Clientes</u></a>
                    <div class="clearfix"></div>
                </div>              
                <?= $this->session->flashdata('message')?>
                <div class="panel-body p-b-25">
                    <form class="form-horizontal" role="form" action="dashboard/clientes_web/nuevo" method="post" enctype="multipart/form-data" id="formClientesWeb">   
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Razon social</label>
                            <div class="col-sm-10">
                                    <input type="text" class="form-control slugName" id="" name="razon_social" placeholder="" onkeyup="slugUrl('slugName', 'slugUrl');" <?php echo in_array('razon_social', $requerid)? 'required':''; ?>>
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
                            <label class="col-sm-2 control-label">Orden</label>
                            <div class="col-sm-10">
                            <input type="number" min="1" class="form-control" id="" name="orden" placeholder="" value="1" <?=in_array('orden', $requerid)? 'required':''; ?>>
                            <?php echo form_error('orden'); ?>
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
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                            <p><div class="alert alert-info"> La imagen debe tener una medida de <?=$this->sizes['principal_x']?> por <?=$this->sizes['principal_y']?> de lo contrario sera redimencionado a este tamaño </div></p>
                            <input type="file" name="logo" required>
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