<div class="page-body clearfix">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edicion de Mensajes</div>
                <?=$this->session->flashdata('message');?>
                <div class="panel-body p-b-25">
                    <form class="form-horizontal" role="form" action="dashboard/mensajes/editar/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>" method="post" enctype="multipart/form-data" id="formMensajes">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="nombre" placeholder="" value="<?=( ! empty($dataset['nombre']) ? $dataset['nombre'] : '')?>" <?=in_array('nombre', $requerid)? 'required':''; ?>>
                                        <?php echo form_error('nombre'); ?>
                            </div>
                        </div>
                                                    
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-2">
                                <input type="radio" id="" name="estado" value="<?= _ACTIVO ?>" <?php if($dataset['estado']==_ACTIVO){ echo 'checked';} ?> <?=in_array('estado', $requerid)? 'required':''; ?>>
                                            leido
                            </div>
                            <div class="col-sm-2">
                                 <input type="radio" id="" name="estado" value="<?= _INACTIVO ?>"<?php if($dataset['estado']==_INACTIVO){ echo 'checked';} ?> <?=in_array('estado', $requerid)? 'required':''; ?>>
                                        No leido
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