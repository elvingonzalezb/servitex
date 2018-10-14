    <?php $this->load->view("dashboard/includes/breadcrumbs", array()); ?>
    <div class="page-body">
        <div class="panel panel-default">
                <div class="panel-heading">ARTÍCULOS</div>
                <div class="panel-body">
                    <?=$this->session->flashdata('message');?>
                    <table class="table table-striped table-hover js-exportable dataTable" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%">N°</th>
                                    <th>IMAGEN</th>
                                    <th>NOMBRE</th>
                                    <th>FECHA</th>
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
                                    <td><img class="img-responsive" src="files/articulos/thumbs/<?=$value['imagen']?>" alt="<?=$value['imagen_title']?>"></td>
                                    <td><?=$value['nombre']?></td>
                                    <td><?=date_format(date_create($value['creado']), 'd-m-Y')?></td>
                                  
                                    <td class="center">
                                        <form action="" id="estadoAjax">
                                            <input type="hidden" id="idCat<?=$value['id']?>" value="<?=$value['id']?>">
                                            <input type="hidden" id="estado<?=$value['id']?>" value="<?=$value['estado']?>">
                                            <button type="button" id="btn-<?=$value['id']?>" class="btn <?=$class?>"
                                            onclick="actualizarEstado($('#idCat<?=$value['id']?>').val(),$('#estado<?=$value['id']?>').val(),'articulos/ajaxEstado/<?=$value['id']?>');return false;"><?=$status?></button>
                                            <span id="divResultado<?=$value['id']?>"></span>
                                        </form>
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-info" href="dashboard/articulos/editar/<?=$value['id']?>">
                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                            Editar
                                        </a>
                                        <a class="btn btn-danger" href="javascript:eliminarItem(<?=$value['id']?>,'articulos/delete');">
                                            <i class="glyphicon glyphicon-trash icon-white"></i>
                                            Borrar
                                        </a>
                                        <a class="btn btn-success" href="dashboard/articulos/listaComentarios/<?=$value['id']?>">
                                            <i class="glyphicon glyphicon-align-justify icon-white"></i>
                                            Comentarios
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach;?>                              
                            </tbody>                        
                    </table>
                </div>
        </div>
    </div>