        <?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Editar Detalle')); ?>
        <div class="page-body">
            <div class="panel panel-default">
                    <div class="panel-heading">DETALLE DEL MENSAJE</div>
                    <div style="position: relative;text-align: right;padding-bottom: 15px;">
                      <a class="btn" href="dashboard/mensajes/lista"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a mensajes</u></a>
                      <div class="clearfix"></div>
                  </div>
                    <div class="panel-body">
                        <?=$this->session->flashdata('message');?>
                        <table class="table table-striped table-hover js-exportable dataTable">
                            <tbody>     
                                <?php $estado = (($dataset['estado']==1) ? 'Leido': 'No leido')?>
                              
                                  <tr>
                                      <td width="20%">Nombre</td><td><?=$dataset['nombre']?></td>
                                  </tr>
                                  <tr>
                                      <td width="20%">Asunto</td><td><?=$dataset['asunto']?></td>
                                  </tr>
                                  <tr>
                                      <td width="20%">Email</td><td><?=$dataset['correo']?></td>
                                  </tr>
                                  <tr>
                                      <td width="20%">Mensaje</td><td><?=$dataset['mensaje']?></td>
                                  </tr>
                                  <tr>
                                    <td width="20%">Fecha de Ingreso</td> <td><?=date_format(date_create($dataset['creado']), 'Y-m-d')?></td>
                                  </tr>
                                  <tr>
                                    <td width="20%">Estado</td><td><?=$estado?></td>
                                  </tr>
                                  <form class="form-horizontal" action="dashboard/mensajes/responder/<?=$dataset['id']?>" method="post" id="">
                                  <tr>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 p-l-15">
                                              <td width="20%">Respuesta</td>
                                              <td><textarea class="form-control"  id="" name="respuesta"><?=$dataset['respuesta']?></textarea></td>
                                            </div>
                                        </div>
                                  </tr>
                                  <tr>
                                      <td width="20%"></td>
                                      <td><button type="submit" class="btn btn-sm btn-success">Responder</button></td>
                                  </tr>
                                 </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>