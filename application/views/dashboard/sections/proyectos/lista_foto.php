    <?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'','id_trabajo'=>$id_trabajo,'id_proyecto'=>'')); ?>
    <div class="page-body">
        <div class="panel panel-default">
                <div class="panel-heading">FOTOS DEL PROYECTO</div>
                 <div style="position: relative;text-align: right;padding-bottom: 15px;">
                    <a class="btn" href="dashboard/proyectos/listaTrabajo/<?=$id_proyecto?>"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a los Trabajo</u></a>
                    <a class="btn" href="dashboard/proyectos/nuevaFoto/<?=$id_trabajo?>/<?=$id_proyecto?>"><i style="margin-right:5px;" class="fa fa-plus"></i><u>Nueva Foto</u></a>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <?=$this->session->flashdata('message');?>
                    <table class="table table-striped table-hover js-exportable dataTable" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%">N°</th>
                                    <th>IMAGEN</th>
                                    <th>NOMBRE</th>
                                    <th>ORDEN</th>
                                    <th>ESTADO</th>
                                    <th class="noExport">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataset as $key => $value): ?>

                                <?php $status = (($value['estado']==_ACTIVO) ? 'activo': 'inactivo')?>
                                <?php $class = (($value['estado']==_ACTIVO) ? 'btn-success': 'btn-warning')?>
                             
                                <tr id="fila-<?=$value['id']?>">
                                    <td class="center"><?=$key+1?></td> 
                                    <td><img class="img-responsive" src="files/proyectos/thumbs/<?=$value['imagen']?>" alt="<?=$value['imagen_title']?>"></td>
                                    <td><?=$value['nombre']?></td>
                                    <td><?=$value['orden']?></td>
                                  
                                    <td class="center">
                                        <form action="" id="estadoAjax">
                                            <input type="hidden" id="idFot<?=$value['id']?>" value="<?=$value['id']?>">
                                            <input type="hidden" id="estado<?=$value['id']?>" value="<?=$value['estado']?>">
                                            <button type="button" id="btn-<?=$value['id']?>" class="btn <?=$class?>"
                                            onclick="actualizarEstado($('#idFot<?=$value['id']?>').val(),$('#estado<?=$value['id']?>').val(),'proyectos/ajaxEstado/3');return false;"><?=$status?></button>
                                            <span id="divResultado<?=$value['id']?>"></span>
                                        </form>
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-info" href="dashboard/proyectos/editarFoto/<?=$value['id']?>/<?=$id_trabajo?>">
                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                            Editar
                                        </a>
                                        <a class="btn btn-danger" href="javascript:eliminarItem(<?=$value['id']?>,'proyectos/deleteFoto');">
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