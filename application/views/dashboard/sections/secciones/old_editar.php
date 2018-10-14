<div id="content" class="col-lg-10 col-sm-10">
    <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li><a href="dashboard/secciones/lista">Lista Secciones</a></li>
            <!-- <li><a href="dashboard/sections/nuevo">New</a></li> -->
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-user"></i> <?=$dataset['titulo']?></h2>

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
            <form role="form" action="dashboard/secciones/editar/<?=$dataset['id']?>" method="post" enctype="multipart/form-data" id="formSections">
                <div class="form-group">
                    <label >Titulo</label>
                    <input type="text" class="form-control" id="" name="titulo" placeholder="" value="<?=$dataset['titulo']?>">
                    <?php echo form_error('titulo'); ?>
                </div>
                <div class="form-group">
                    <label >Descripción</label>
                    <textarea class="form-control" id="description" name="descripcion"><?=$dataset['descripcion']?></textarea>
                    <?php echo form_error('descripcion'); ?>
                </div>

                <!-- <div class="form-group">
                    <img src="files/sections/<?=$dataset['imagen'] ?>" width="400" alt="">
                </div> -->

                <legend>Parámetros para SEO</legend>

                <div class="form-group">
                    <label >Title</label>
                    <input type="text" class="form-control" id="" name="seo_title" placeholder="" value="<?=$dataset['seo_title']?>">
                    <?php echo form_error('seo_title'); ?>
                </div>
                <div class="form-group">
                    <label >Description</label>
                    <input type="text" class="form-control" id="" name="seo_description" placeholder="" value="<?=$dataset['seo_description']?>">
                    <?php echo form_error('seo_description'); ?>
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
<script type="text/javascript">
    $(document).ready(function() {
        CKEDITOR.replace('description' );
    })
</script>