        <?php $this->load->view("dashboard/includes/breadcrumbs", array()); ?>
        <div class="page-body">
            <div class="panel panel-default">
                    <div class="panel-heading">CLIENTES REGISTRADOS</div>
                    <div class="panel-body">
                        <?=$this->session->flashdata('message');?>
                        <table class="table table-striped  table-hover js-exportable dataTable" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%">N°</th>
                                    <th width="30%">NOMBRES</th>
                                    <th width="10%">FECHA</th>
                                    <th width="20%">CORREO</th>
                                    <th width="10%">TELÉFONO</th>
                                    <th width="7%">ESTADO</th>
                                    <th width="18%" class="noExport">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($dataset as $key => $value): ?>
                            <?php $estado = (($value['estado']==_ACTIVO) ? 'activo': 'inactivo')?>
                            <?php $class = (($value['estado']==_ACTIVO) ? 'btn-success': 'btn-warning')?>
                                <tr id="fila-<?=$value['id']?>">
                                    <td><?=$key+1?></td>
                                    <td><?=$value['nombre_completo']?></td>
                                    <td><?=date_format(date_create($value['creado']), 'd-m-Y')?></td>           
                                    <td><?=$value['correo']?></td>
                                    <td><?=$value['telefono']?></td>                               
                                    <td class="center">
                                        <form action="" id="estadoAjax">
                                            <input type="hidden" id="idCli<?=$value['id']?>" value="<?=$value['id']?>">
                                            <input type="hidden" id="estado<?=$value['id']?>" value="<?=$value['estado']?>">
                                            <button type="button" id="btn-<?=$value['id']?>" class="btn <?=$class?>"
                                            onclick="actualizarEstado($('#idCli<?=$value['id']?>').val(),$('#estado<?=$value['id']?>').val(),'clientes/ajaxEstado');return false;"><?=$estado?></button>
                                            <span id="divResultado<?=$value['id']?>"></span>
                                        </form>
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="dashboard/clientes/editar/<?=$value['id']?>">
                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                            Editar
                                        </a>
                                        <a class="btn btn-danger" href="javascript:eliminarItem(<?=$value['id']?>,'clientes/delete');">
                                            <i class="glyphicon glyphicon-trash icon-white"></i>
                                            Borrar
                                        </a>
                                    </td> 
                                </tr>
                            <?php endforeach;?>
                                
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
  