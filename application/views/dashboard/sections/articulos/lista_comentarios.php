    <?php $this->load->view("dashboard/includes/breadcrumbs", array()); ?>
    <div class="page-body">
        <div class="panel panel-default">
                <div class="panel-heading">COMENTARIOS</div>
                <div class="panel-body">
                    <div style="position: relative;text-align: right;padding-bottom: 15px;">
                        <a class="btn" href="dashboard/articulos/lista"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a Articulos</u></a>
                        <div class="clearfix"></div>
                    </div>
                    <?=$this->session->flashdata('message');?>
                    <table class="table table-striped table-hover js-exportable dataTable" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%">N°</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th class="noExport">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataset as $key => $value): ?>
                                <?php $status = (($value['estado']==_ACTIVO) ? 'activo': 'inactivo')?>
                                <?php $class = (($value['estado']==_ACTIVO) ? 'btn-success': 'btn-warning')?>
                                <tr id="fila-<?=$value['id']?>">
                                    <td class="center"><?=$key+1?></td> 
                                    <td><?=$value['nombre']?></td>
                                    <td><?=$value['correo']?></td>
                                    <td><?=date_format(date_create($value['creado']),'Y-m-d')?></td>
                                    <td class="center">
                                        <form action="" id="estadoAjax">
                                            <input type="hidden" id="idCat<?=$value['id']?>" value="<?=$value['id']?>">
                                            <input type="hidden" id="estado<?=$value['id']?>" value="<?=$value['estado']?>">
                                            <button type="button" id="btn-<?=$value['id']?>" class="btn <?=$class?>"
                                            onclick="actualizarEstado($('#idCat<?=$value['id']?>').val(),$('#estado<?=$value['id']?>').val(),'articulos/ajaxEstado');return false;"><?=$status?></button>
                                            <span id="divResultado<?=$value['id']?>"></span>
                                        </form>
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-info" href="dashboard/articulos/editarComentarios/<?=$value['id']?>/<?=$id_articulo?>">
                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                            Editar
                                        </a>
                                        <a class="btn btn-danger" href="javascript:eliminarItem(<?=$value['id']?>,'articulos/deleteComentario');">
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