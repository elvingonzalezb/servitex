 <?php $this->load->view("dashboard/includes/breadcrumbs", array()); ?>
    <div class="page-body">
        <div class="panel panel-default">
                <div class="panel-heading">Galería de Videos</div>
                <div style="position: relative;text-align: right;padding-bottom: 15px;">
                    <a class="btn" href="dashboard/galeria_videos/lista_album"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a la Galeria de Videos</u></a>
                    <a class="btn" href="dashboard/galeria_videos/nuevo_video/<?=$id_album?>"><i style="margin-right:5px;" class="fa fa-plus"></i><u>Nuevo Video</u></a>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <?=$this->session->flashdata('message');?>
                    <table class="table table-striped table-hover js-exportable dataTable" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%">N°</th>
                                    <th>VIDEO</th>
                                    <th>NOMBRE</th>
                                    <th>ORDEN</th>
                                    <th>DESTACADO</th>
                                    <th>ESTADO</th>
                                    <th class="noExport">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataset as $key => $value): ?>
                                <?php $status = (($value['estado']==_ACTIVO) ? 'activo': 'inactivo')?>
                                <?php $destacado = (($value['destacado']==_ACTIVO) ? 'DESTACADO': 'NO DESTACADO')?>
                                <?php $class = (($value['estado']==_ACTIVO) ? 'btn-success': 'btn-warning')?>
                                <?php $class_destacado = (($value['destacado']==_ACTIVO) ? 'label-success': ' label-warning')?>
                                <tr id="fila-<?=$value['id']?>">
                                    <td class="center"><?=$key+1?></td>
                                   <td class="miniatura"><img class="img-responsive" src="http://i2.ytimg.com/vi/<?=$value['codigo_video']?>/hqdefault.jpg" width="200" alt="<?=$value['video_title']?>"></td>
                                    <td><?=$value['nombre']?></td>
                                    <td><?=$value['orden']?></td>
                                    <td><label type="label" class="label <?=$class_destacado?>"><?=$destacado?></label></td>
                                    <td class="center">
                                        <form action="" id="estadoAjax">
                                            <input type="hidden" id="idFot<?=$value['id']?>" value="<?=$value['id']?>">
                                            <input type="hidden" id="estado<?=$value['id']?>" value="<?=$value['estado']?>">
                                            <button type="button" id="btn-<?=$value['id']?>" class="btn <?=$class?>"
                                            onclick="actualizarEstado($('#idFot<?=$value['id']?>').val(),$('#estado<?=$value['id']?>').val(),'galeria_videos/ajaxEstado');return false;"><?=$status?></button>
                                            <span id="divResultado<?=$value['id']?>"></span>
                                        </form>
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-info" href="dashboard/galeria_videos/editar_video/<?=$value['id']?>/<?=$id_album?>">
                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                            Editar
                                        </a>
                                        <a class="btn btn-danger" href="javascript:eliminarItem(<?=$value['id']?>,'galeria_videos/delete_video');">
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