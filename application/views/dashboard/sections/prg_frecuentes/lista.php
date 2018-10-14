        <?php $this->load->view("dashboard/includes/breadcrumbs", array()); ?>
        <div class="page-body">
            <div class="panel panel-default">
                    <div class="panel-heading">PREGUNTAS FRECUENTES</div>
                    <div class="panel-body">
                    <?=$this->session->flashdata('message');?>
                        <table class="table table-striped table-hover js-exportable dataTable" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>PREGUNTA</th>
                                    <th>AUTOR</th>
                                    <th>ORDEN</th>
                                    <th>CORREO</th>
                                    <th>ESTADO</th>
                                    <th class="noExport">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($dataset as $key => $value): ?>
                                <?php $status = (($value['estado']==_ACTIVO) ? 'activo': 'inactivo')?>
                                <?php $class = (($value['estado']==_ACTIVO) ? 'btn-success': 'btn-warning')?>
                                <tr id="fila-<?=$value['id']?>">
                                    <td><?=$key+1?></td>
                                    <td><?=$value['pregunta']?></td>          
                                    <td><?=$value['autor']?></td>
                                    <td><?=$value['orden']?></td>
                                    <td><?=$value['mail_autor']?></td>
                                    <td class="center">
                                        <form action="" id="estadoAjax">
                                            <input type="hidden" id="idPreg<?=$value['id']?>" value="<?=$value['id']?>">
                                            <input type="hidden" id="estado<?=$value['id']?>" value="<?=$value['estado']?>">
                                            <button type="button" id="btn-<?=$value['id']?>" class="btn <?=$class?>"
                                            onclick="actualizarEstado($('#idPreg<?=$value['id']?>').val(),$('#estado<?=$value['id']?>').val(),'prg_frecuentes/ajaxEstado');return false;"><?=$status?></button>
                                            <span id="divResultado<?=$value['id']?>"></span>
                                        </form>
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-info" href="dashboard/prg_frecuentes/editar/<?=$value['id']?>">
                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                            Editar
                                        </a>
                                        <a class="btn btn-danger" href="javascript:eliminarItem(<?=$value['id']?>,'prg_frecuentes/delete');">
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