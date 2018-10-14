<?php //var_dump('entro');exit();?>
<div class="breadcrumb">
    <!-- plantilla de banner -->
    <!-- <?php if($seccion['visible']==1){?>
    <div  class="dez-bnr-inr overlay-black-middle" style="background-image:url(files/secciones/<?=$seccion['imagen']?>);">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white h1-custom"><?php echo strtoupper($seccion['titulo']); ?></h1>
            </div>
            </div>
    </div>
    <?php }?> -->
    <!-- cierre banner -->
    <div class="breadcrumb-inner">
        <div class="container">
            <ul class="list-inline list-unstyled">
                <li><a href="./">Inicio</a></li>
                <!-- <li><a href="productos">Productos</a></li> -->
                <!-- {migaja} -->
                <!-- {LI} -->
                <!-- <?php echo $migaja?> -->
                <?php echo getFrontBreadProd(); ?>
            </ul>
        </div>
    </div>
    <!-- /.breadcrumb-inner -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row outer-bottom-sm'>
            <div class='col-md-3 sidebar'>
                <!-- ================================== TOP NAVIGATION ================================== -->
                <div class="side-menu animate-dropdown outer-bottom-xs">
                    <div class="head"><i class="icon fa fa-align-justify fa-fw hide-menu"></i> Categorias</div>
                    <nav class="yamm megamenu-horizontal" role="navigation">
                        <ul class="nav">
                            {menu}
                            <li class="dropdown menu-item">
                                <a href="<?=base_url('productos/')?>{url}-{id}" class="dropdown-toggle" data-toggle=""><i class=""></i>{nombre}</a>
                            </li>
                            {/menu}
                        </ul>
                    </nav>
                </div>
               
            </div>
            <!-- /.sidebar -->
            <div class='col-md-9'>
                <?=$this->session->flashdata('message')?>
                <!-- ========================================== SECTION – HERO ========================================= -->
                <!-- ========================================= SECTION – HERO : END ========================================= -->
                <div class="search-result-container">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active " id="grid-container">
                            <div class="category-product  inner-top-vs">
                                <div class="row">
                                    <?php if ($titulo == 'CATEGORÍAS'){?>
                                <center><h2><?=$titulo_menu?></h2></center> 
                                <?php //var_dump('<pre>',$titulo_menu);exit();?>
                                    {categorias}     
                                    <div class="col-sm-6 col-md-3 wow fadeInUp">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="<?=base_url('productos/')?>{url}/<?=$titulo_menu?>"><img class="img-responsive" src="assets/frontend/images/blank.gif" data-echo="{ruta}" alt="{imagen_title}"></a>
                                                    </div>
                                                </div>
                                                <!-- /.product-image -->
                                                <div class="product-info text-left">
                                                    <h3 class="name"><center><a href="<?=base_url('productos/')?>{url}/<?=$titulo_menu?>">{nombre}</a></center></h3>
                                                    <!-- <div class="rating rateit-small"></div> -->
                                                    <div class="description"></div>
                                                    <!-- /.product-price -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {/categorias}
                                    <?php }else {?>
                                    <center><h2><?php if(count($categorias)>0) {echo $categorias[0]['nombre_categoria'];}else{echo '';}?></h2></center>
                                    <?php foreach ($categorias as $key => $value): ?> 
                                    <div class="col-sm-6 col-md-4 wow fadeInUp">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="<?=base_url('productos/')?><?=$value['url']?>"><img class="img-responsive" src="assets/frontend/images/blank.gif" data-echo="<?=$value['ruta']?>" alt="<?=$value['nombre']?>"></a>
                                                    </div>
                                                </div>
                                                <div class="product-info text-center">
                                                    <h3 class="name"><a href="<?=base_url('productos/')?><?=$value['url']?>"><?=$value['nombre']?></a></h3>
                                                    <div class="description"></div>
                                                </div>
                                                <div class="cart clearfix animate-effect text-center">
                                                    <a class="btn btn-primary btn-detalle" href="<?=base_url('productos/')?><?=$value['url']?>-<?=$value['id']?>/detalle">VER DETALLE</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix blog-pagination filters-container  wow fadeInUp outer-top-bd">
                        <div class="text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">
                                    {paginacion}
                                </ul>
                                <!-- /.list-inline -->
                            </div>
                            <!-- /.pagination-container -->  
                        </div>
                        <!-- /.text-right -->
                    </div>
                </div>
                <!-- /.search-result-container -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!-- /.body-content -->
<?php $getcategoriasM=getcategoriasMT(2); ?>
<?php $getcategoriasT=getcategoriasMT(3); ?>
<?php if($titulo_menu==$getcategoriasM['nombre']){ ?>
    <script>
            $("#m_merchandising").addClass('active');
    </script>
<?php }elseif($titulo_menu==$getcategoriasT['nombre']){ ?>
    <script>
            $("#m_textiles").addClass('active');
    </script>
<?php }?>