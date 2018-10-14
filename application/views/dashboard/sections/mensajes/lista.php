        <?php $this->load->view("dashboard/includes/breadcrumbs", array()); ?>
        <div class="page-body">
            <div class="panel panel-default">
                    <div class="panel-heading">CONTACTENOS</div>
                    <div class="panel-body">
                        <?=$this->session->flashdata('message');?>
                        <table class="table table-striped table-hover js-exportable dataTable"  cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%">N°</th>
                                    <th width="40%">NOMBRE</th>
                                    <th>FECHA</th>
                                    <th>ESTADO</th>
                                    <th class="noExport">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($dataset as $key => $value): ?> 

                                <?php $estado = (($value['estado']==_ACTIVO) ? 'Leido': 'No leido')?>
                                <tr id="fila-<?=$value['id']?>">
                                    <td><?=$key+1?></td>
                                    <td><?=$value['nombre']?></td>
                                    <td><?=date_format(date_create($value['creado']), 'd-m-Y')?></td> 
                                    <td>
                                        <?=$estado?>
                                    </td>
                                    <td class="center">
                                       <!--  <a class="btn btn-info" href="dashboard/mensajes/editar/<?=$value['id']?>">
                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                            Editar
                                        </a> -->
                                        <a class="btn btn-danger" href="javascript:eliminarItem(<?=$value['id']?>,'mensajes/delete');">
                                            <i class="glyphicon glyphicon-trash icon-white"></i>
                                            Borrar
                                        </a>
                                        <?php 
                                            $href = 'dashboard/mensajes/lista_detalle/'.$value['id'];
                                            $texto = 'Ver Detalle';
                                        ?>
                                        <a class="btn btn-success" href="<?=$href?>">
                                            <i class="glyphicon glyphicon-align-justify icon-white"></i>
                                            <?=$texto?>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                                
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>