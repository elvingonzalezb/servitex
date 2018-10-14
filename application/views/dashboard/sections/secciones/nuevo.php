<div id="content" class="col-lg-10 col-sm-10">
    <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li><a href="dashboard/sections/lista">Lista Banners</a></li>
            <li><a href="dashboard/sections/nuevo">New</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-user"></i> Banners</h2>

            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
        <?php $success = $this->session->flashdata('success');?>
        <?php if(! empty($success)): ?>
            <div class="alert alert-success">Los datos han sido grabados correctamente</div>
        <?php endif; ?>
        <div class="box-content">
            <form role="form" action="dashboard/sections/save" method="post" enctype="multipart/form-data" id="formSections">
                <div class="form-group">
                    <label >Titulo</label>
                    <input type="text" class="form-control" id="" name="title" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label >subtitulo</label>
                    <input type="text" class="form-control" id="" name="subtitle" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label >link</label>
                    <input type="text" class="form-control" id="" name="link" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label >Orden</label>
                    <input type="text" class="form-control" id="" name="order" placeholder="" value="">
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" id="" name="status" value="1" checked>
                        Activo
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" id="" name="status" value="0">
                        Inactivo
                    </label>
                </div>

                <div class="form-group">
                    <!-- <label for="">Imagen</label> -->
                    <p><div class="alert alert-info"> La imagen debe tener una medida de <?=$this->sizes['principal_x']?> por <?=$this->sizes['principal_y']?> de lo contrario sera redimencionado a este tamaño </div></p>
                    <input type="file" name="image" required>

                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    
                </div>
            </form>
        </div>
        </div>
        </div>
    <!--/span-->

    </div><!--/row-->

    <!-- content ends -->
</div><!--/#content.col-md-0-->