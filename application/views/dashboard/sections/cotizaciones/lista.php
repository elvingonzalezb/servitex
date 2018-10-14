<?php $this->load->view("dashboard/includes/breadcrumbs", array()); ?>
<div class="page-body">
    <div class="panel panel-default">
        <div class="panel-heading">Listado de Solicitudes</div>
        <div class="panel-body">
            <div><?php echo($this->session->flashdata('success'));?></div>
            <table class="table table-striped table-hover js-exportable dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="5%">NRO</th>
                        <th width="8%">COD. SOLICITUD</th>
                        <th width="15%">CLIENTE</th>
                        <!--<th width="8%">CODS PRODS</th>-->
                        <th width="5%">ESTADO</th>
                        <th width="12%">FECHA VENTA</th>
                        <th width="13%" class="noExport">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ordenes as $key => $value): ?>
                    <tr id="prod-<?=$value['id']?>">
                        <td class="center"><?=$key+1?></td>
                        <td><?=$value['codigo_orden']?></td>
                        <td><?=$value['nombre_cliente']?></td>
                        <?php if ($value['estado'] == _C_PENDIENTE): ?>
                            <td class="center"><span class="label label-warning">Pendiente</span></td>
                            <td class="center"><?=$value['fecha_venta']?></td>
                            <td>
                                <a class="btn btn-success" href="dashboard/cotizaciones/cotizar/<?=$value['id']?>"><i class="fa fa-thumbs-up icon-white"></i> &nbsp;COTIZAR</a><br /><br />
                                <a class="btn btn-danger" href="javascript:borrarReserva(\'<?=$value['id']?>\')"><i class="fa fa-trash icon-white"></i> &nbsp;&nbsp;BORRAR</a><br /><br />
                            </td>
                        <?php endif ?>
                        <?php if ($value['estado'] == _C_COTIZADO): ?>
                            <td class="center"><span class="label label-success">Cotizado</span></td>
                            <td class="center"><?=$value['fecha_venta']?></td>
                            <td>
                                <a class="btn btn-info" href="dashboard/cotizaciones/detalle/<?=$value['id']?>"><i class="fa fa-eye icon-white"></i> VER</a><br /><br />
                                <a class="btn btn-danger" href="javascript:borrarReserva(\'<?=$value['id']?>\')"><i class="fa fa-trash icon-white"></i> &nbsp;&nbsp;BORRAR</a><br /><br />
                            </td>
                        <?php endif ?>
                    </tr>
                    <?php endforeach;?>                              
                </tbody>
            </table>
        </div>
    </div>
</div>