<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Nueva Foto')); ?>
<div class="page-body clearfix">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Nueva Foto</div>
                <div style="position: relative;text-align: right;padding-bottom: 15px;">
                    <?php if($id_proyecto!='0'){?>
                        <a class="btn" href="dashboard/proyectos/listaFoto/<?=$id_trabajo?>"><i class="fa fa-chevron-left"></i>Regresar a las Fotos</a>
                    <?php } else { ?>
                        <a class="btn" href="dashboard/proyectos/listaProyecto"><i style="margin-right:5px;" class="fa fa-chevron-left"></i><u>Regresar a los Proyectos</u></a>
                    <?php } ?>
                    <div class="clearfix"></div>
                </div>
                <?=$this->session->flashdata('message')?>
                <div class="panel-body p-b-25">
                    <form class="form-horizontal" role="form" action="dashboard/proyectos/nuevaFoto" method="post" enctype="multipart/form-data" id="formFotosProyecto">      

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Proyectos</label>
                            <div class="col-sm-10">
                                <select class="form-control chosen-select" name="proyecto_id" id="proyecto" data-placeholder="Seleccione Un Proyecto" <?php echo in_array('proyecto_id', $requerid)? 'required':''; ?>>
                                     <option></option>
                                    <?php foreach ($proyectos as $key => $value) {?>
                                    <option value="<?=$value['id']?>"><?= $value['nombre']?></option>
                                    <?php }  ?> 
                                   
                                </select>
                                        <?php echo form_error('proyecto_id'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Trabajos</label>
                            <div class="col-sm-10">
                                <select class="form-control chosen-select" data-placeholder="Escoger el proyecto primero" name="galeria_proyecto_id" id ="galeria_proyecto" class="form-control" id="sel1" <?php echo in_array('galeria_proyecto_id', $requerid)? 'required':''; ?>>
                                    <option></option>
                                </select>

                                        <?php echo form_error('galeria_proyecto_id'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                    <input type="text" class="form-control slugName" id="" name="nombre" placeholder="" onkeyup="slugUrl('slugName', 'slugUrl');" <?php echo in_array('nombre', $requerid)? 'required':''; ?>>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Orden</label>
                            <div class="col-sm-10">
                            <input type="number" min="1" class="form-control" id="" name="orden" placeholder="" value="1" <?=in_array('orden', $requerid)? 'required':''; ?>>
                            <?php echo form_error('orden'); ?>
                            </div>
                        </div>     
                                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-2">
                                <input type="radio" id="" name="estado" value="<?= _ACTIVO ?>" checked <?=in_array('estado', $requerid)? 'required':''; ?>>
                                        Activo
                                </div>
                                <div class="col-sm-2">
                                <input type="radio" id="" name="estado" value="<?= _INACTIVO ?>" <?=in_array('estado', $requerid)? 'required':''; ?>>
                                        Inactivo
                                </div>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                    <!-- <label for="">Imagen</label> -->
                            <p><div class="alert alert-info"> La imagen debe tener una medida de <?=$this->sizes['principal_x']?> por <?=$this->sizes['principal_y']?> de lo contrario sera redimencionado a este tamaño </div></p>
                            <input type="file" name="imagen" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 p-l-15">
                                <button type="submit" class="btn btn-sm btn-success">Grabar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#proyecto").change(function(){
        var proyectoID = $(this).val();
            if(proyectoID){

                $.ajax({
                    type : 'post',
                    url  : 'dashboard/proyectos/actualizarTrabajo',
                    data : {'proyecto_id':proyectoID },
                    dataType: "json",
                    success:function(response){
                        
                        $("#galeria_proyecto").html(response.datos);
                        $("#galeria_proyecto").trigger("chosen:updated");

                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("¡Error al cargar combo!", "Inténtalo de nuevo", "error");
                    }

                });
            }   
        });
    });

</script>

<script>
  $("#proyecto option[value="+ <?=$id_proyecto?> +"]").attr("selected",true);
   $("#proyecto").change(function(){
        var proyectoID = $(this).val();
            if(proyectoID){

                $.ajax({
                    type : 'post',
                    url  : 'dashboard/proyectos/actualizarTrabajo',
                    data : {'proyecto_id':proyectoID },
                    dataType: "json",
                    success:function(response){
                        
                        $("#galeria_proyecto").html(response.datos);
                        $("#galeria_proyecto").trigger("chosen:updated");

                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("¡Error al cargar combo!", "Inténtalo de nuevo", "error");
                    }

                });
            }   
        });
</script>
<!-- <script>
  $("#galeria_proyecto option[value="+ <?=$id_trabajo?> +"]").attr("selected",true);
</script> -->