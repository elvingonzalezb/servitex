<div id="content" class="col-lg-10 col-sm-10">
    <!-- content starts -->
    <!-- <div>
        <ul class="breadcrumb">
            <li><a href="dashboard/product/lista">Lista Productos</a></li>
            <li><a href="dashboard/product/nuevo">New</a></li>
        </ul>
    </div> -->

    <div class="row">
        <div class="box col-md-12">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-user"></i> Productos</h2>

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
            <form role="form" action="dashboard/galerias/editar/<?=( !empty($dataset['id']) ? $dataset['id'] : 0)?>" method="post" enctype="multipart/form-data" id="formGaleria">
                <div class="form-group">
                    <label >Nombre</label>
                    <input type="text" class="form-control" id="" name="name" placeholder="" value="<?=( ! empty($dataset['name']) ? $dataset['name'] : '')?>">
                </div>

                <div class="form-group">
                    <img src="files/producto/<?=( ! empty($dataset['image']) ? $dataset['image'] : '') ?>" width="400" alt="">
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" id="" name="status" value="1" <?php if($dataset['status']==1){ echo 'checked';} ?>>
                        Activo
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" id="" name="status" value="0"<?php if($dataset['status']==0){ echo 'checked';} ?>>
                        Inactivo
                    </label>
                </div>

                <div class="form-group">
                    <!-- <label for="">Imagen</label> -->
                    <input type="hidden" name="imgant" value="<?=$dataset['image']?>">

                    <p><div class="alert alert-info"> La imagen debe tener una medida de <?=$this->sizes['principal_x']?> por <?=$this->sizes['principal_y']?> de lo contrario sera redimencionado a este tamaño </div></p>
                    <input type="file" name="image">
                </div>
                <!-- 
                
                <legend>Parámetros para SEO</legend>

                <div class="form-group">
                    <label >Title</label>
                    <input type="text" class="form-control" id="" name="seo_title" placeholder="" value="<?=$dataset['seo_title']?>">
                </div>
                <div class="form-group">
                    <label >Description</label>
                    <input type="text" class="form-control" id="" name="seo_description" placeholder="" value="<?=$dataset['seo_description']?>">
                </div>
                     -->

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