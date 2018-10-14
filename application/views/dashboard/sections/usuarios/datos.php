<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Datos')); ?>
<div class="page-body profile-page">
    <div class="m-t-15 clearfix">
        <div class="col-sm-12">
            <div class="panel panel-default" data-panel-close="false" data-panel-fullscreen="false">
                <div class="panel-heading">MIS DATOS</div>
                <div class="panel-body">
                    <div class="info-content">
                        <div class="info-line">
                            <div class="info-title">Nombre</div>
                            <div class="info-detail"><?=getDataSession('nombre');?></div>
                        </div>
                        <div class="info-line">
                            <div class="info-title">Usuario</div>
                            <div class="info-detail"><?=getDataSession('usuario');?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>