

<!-- <div id="content" class="col-lg-10 col-sm-10"> -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li><a href="dashboard/clientes/lista">Lista De Clientes</a></li>
            <li><a href="dashboard/clientes/nuevo">Nuevo</a></li>
        </ul>
    </div>

    <div class="row">
       <div class="box col-md-12">
        <!-- <div class="box-inner"> -->
        <div class="panel panel-default">
        <!-- <div class="box-header well" data-original-title=""> -->
        <div class="panel-heading">Nuevo Cliente</div>
            <!-- <h2><i class="glyphicon glyphicon-user"></i> Articulos</h2> -->

           <!--  <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
            </div> -->
        <!-- </div> -->
        <?php $success = $this->session->flashdata('success');?>
        <?php if(! empty($success)): ?>
            <div class="alert alert-success">Los datos han sido grabados correctamente</div>
        <?php endif; ?>
        <!-- <div class="box-content"> -->
        <div class="panel-body p-b-25">
            <form class="form-horizontal" role="form" action="dashboard/clientes/nuevo" method="post" enctype="multipart/form-data" id="formClientes">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nombre Completo</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="nombre_completo" placeholder="" value="" required>
                    <?php echo form_error('nombre_completo'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Razon Social</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="razon_social" placeholder="" value="" required>
                    <?php echo form_error('razon_social'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Correo</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="correo" placeholder="" value="" required>
                    <?php echo form_error('correo'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Telefono</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="telefono" placeholder="" value="" required>
                    <?php echo form_error('telefono'); ?>
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-sm-2 control-label">Ruc</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="ruc" placeholder="" value="" required>
                    <?php echo form_error('ruc'); ?>
                    </div>
                </div>
                

                 <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                    <!-- <label for="">Imagen</label> -->
                    <p><div class="alert alert-info"> La imagen debe tener una medida de <?=$this->sizes['principal_x']?> por <?=$this->sizes['principal_y']?> de lo contrario sera redimencionado a este tamaño </div></p>
                    <input type="file" name="image" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-2">
                        <input type="radio" id="" name="estado" value="1" checked required>
                        Activo
                        </div>
                        <div class="col-sm-2">
                        <input type="radio" id="" name="estado" value="2" required>
                        Inactivo
                        </div>
                    </label>
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
    <!--/span-->

    </div><!--/row-->

    <!-- content ends -->
</div><!--/#content.col-md-0-->