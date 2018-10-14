        <?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Detalle Solicitud')); ?>
        <div class="page-body">
            <div class="panel panel-default">
                    <div class="panel-heading">DETALLE DEL MENSAJE</div>
                    <div class="panel-body">
                         <div style="position: relative;text-align: right;padding-bottom: 15px;">
                            <a class="btn" href="dashboard/servicios/consultaServicio"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a Solicitudes</u></a>
                            <div class="clearfix"></div>
                        </div>
                        <?=$this->session->flashdata('message');?>
                        <form class="form-horizontal" role="form" action="dashboard/servicios/responder/<?=$dataset['id']?>" method="post" id="">

                            <table class="table table-striped table-hover">
                                <tbody>
                              
                                    <tr>
                                        <td width="20%">Nombre</td><td><?=$dataset['nombre']?></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Email</td><td><?=$dataset['correo']?></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Telefono</td><td><?=$dataset['telefono']?></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Empresa</td><td><?=$dataset['empresa']?></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Mensaje</td><td><?=$dataset['mensaje']?></td>
                                    </tr>
                                    <tr>
                                      <td width="20%">Fecha de Ingreso</td> <td><?=date_format(date_create($dataset['creado']), 'Y-m-d')?></td>
                                    </tr>

                                    <tr>
                                        <div class="form-group">
                                              <td>Estado</td>
                                              <td>  
                                                <div class="col-sm-2" >
                                                    <input type="radio" id="" name="estado" value="1" <?php if($dataset['estado']==1){ echo 'checked';} ?>>
                                                        Atendido
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="radio" id="" name="estado" value="2"<?php if($dataset['estado']==2){ echo 'checked';} ?>>
                                                    No Atendido
                                                </div>
                                              </td>
                                        </div>
                                    </tr>

                                    <tr>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 p-l-15">
                                              <td width="20%">Respuesta</td>
                                              <td>
                                                  <textarea class="form-control"  id="" name="respuesta"><?=$dataset['respuesta']?></textarea>
                                                  <input type="hidden" name="servicio_id" value="<?=$dataset['servicio_id']?>">
                                              </td>
                                            </div>
                                        </div>
                                      </tr>

                                      <tr>
                                          <td width="20%"></td>
                                          <td>
                                            <button type="submit" class="btn btn-sm btn-success">Responder</button>
                                          </td>
                                      </tr>
                              
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>