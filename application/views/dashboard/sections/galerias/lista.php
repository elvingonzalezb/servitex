<div id="content" class="col-lg-10 col-sm-10">
    <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <!-- <li><a href="dashboard/galery/lista">Lista Productos</a></li> -->
            <li><a href="dashboard/galerias/nuevo/<?=$id_product?>">Nuevo</a></li>
        </ul>
    </div>

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
        <div class="box-content">
            <!-- <div class="alert alert-info">For help with such table please check <a href="http://datatables.net/" target="_blank">http://datatables.net/</a></div> -->
            <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
            <thead>
            <tr>
                <th>N°</th>
                <th width="20%">Imagen</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($dataset as $key => $value): ?>
                    <?php $status = (($value['status']==1) ? 'activo': 'inactivo')?>
                    <?php $class = (($value['status']==1) ? 'label-success': 'label-danger')?>
                <tr>
                    <td class="center"><?=$key+1?></td>
                    <td><img src="files/producto/thumbs/<?=$value['image']?>" alt="" width="300"></td>
                    <td><?=$value['name']?></td>
                    <td class="center">
                        <span class="<?=$class?> label label-default"><?=$status?></span>
                    </td>
                    <td class="center">
                        <!-- <a class="btn btn-success" href="#">
                            <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                            View
                        </a> -->
                        <a class="btn btn-info" href="dashboard/galerias/editar/<?=$value['id']?>">
                            <i class="glyphicon glyphicon-edit icon-white"></i>
                            Editar
                        </a>

                        <a class="btn btn-danger" href="javascript:deleteItem('<?=$value['id']?>');">
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
    <!--/span-->

    </div><!--/row-->

    <!-- content ends -->
</div><!--/#content.col-md-0-->
<script type="text/javascript">
    function deleteItem(data){
        var conf = confirm("Esta seguro que desea borrar este item?");
        if(conf){
            window.location.href = "dashboard/galerias/delete/"+data;
        }
        console.log(conf);
    }
</script>