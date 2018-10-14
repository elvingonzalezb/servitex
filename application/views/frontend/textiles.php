<div class="breadcrumb">
    <!-- plantilla de banner -->
    <?php if($seccion['visible']==1){?>
    <div  class="dez-bnr-inr overlay-black-middle" style="background-image:url(files/secciones/<?=$seccion['imagen']?>);">
        <!-- <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white h1-custom"><?php echo strtoupper($seccion['titulo']); ?></h1>
            </div>
            </div> -->
    </div>
    <?php }?>
    <!-- cierre banner -->
    <div class="breadcrumb-inner">
        <div class="container">
            <ul class="list-inline list-unstyled">
                <li><a href="./">Inicio</a></li>
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
                    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categorias</div>
                    <nav class="yamm megamenu-horizontal" role="navigation">
                        <ul class="nav">
                            {menu}
                            <li class="dropdown menu-item">
                                <a href="<?=base_url('textiles/')?>{url}-{id}" class="dropdown-toggle" data-toggle=""><i class=""></i>{nombre}</a>
                            </li>
                            {/menu}
                        </ul>
                    </nav>
                </div>
                <!-- ================================== TOP NAVIGATION : END ================================== -->             
                <div class="sidebar-module-container">
                    <!-- <h3 class="section-title">shop by</h3> -->
                    <div class="sidebar-filter">
                        <!-- <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <div class="widget-header">
                                <h4 class="widget-title">Manufactures</h4>
                            </div>
                            <div class="sidebar-widget-body m-t-10">
                                <ul class="list">
                                    <li><a href="#">Forever 18</a></li>
                                    <li><a href="#">Nike</a></li>
                                    <li><a href="#">Dolce & Gabbana</a></li>
                                    <li><a href="#">Alluare</a></li>
                                    <li><a href="#">Chanel</a></li>
                                    <li><a href="#">Other Brand</a></li>
                                </ul>
                            </div>
                            </div> -->
                        <!-- <div class="sidebar-widget product-tag wow fadeInUp">
                            <h3 class="section-title">Product tags</h3>
                            <div class="sidebar-widget-body outer-top-xs">
                                <div class="tag-list">                  
                                    <a class="item" title="Phone" href="category.html">Phone</a>
                                    <a class="item active" title="Vest" href="category.html">Vest</a>
                                    <a class="item" title="Smartphone" href="category.html">Smartphone</a>
                                    <a class="item" title="Furniture" href="category.html">Furniture</a>
                                    <a class="item" title="T-shirt" href="category.html">T-shirt</a>
                                    <a class="item" title="Sweatpants" href="category.html">Sweatpants</a>
                                    <a class="item" title="Sneaker" href="category.html">Sneaker</a>
                                    <a class="item" title="Toys" href="category.html">Toys</a>
                                    <a class="item" title="Rose" href="category.html">Rose</a>
                                </div>
                            </div>
                            </div> -->                     
                    </div>
                </div>
                <!-- /.sidebar-module-container -->
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
                                    {categorias}     
                                    <div class="col-sm-6 col-md-4 wow fadeInUp">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="<?=base_url('textiles/')?>{url}"><img  src="assets/frontend/images/blank.gif" data-echo="{ruta}" alt="{imagen_title}"></a>
                                                    </div>
                                                    <!-- /.image -->          
                                                    <!-- <div class="tag new"><span>new</span></div> -->
                                                </div>
                                                <!-- /.product-image -->
                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="<?=base_url('textiles/')?>{url}">{nombre}</a></h3>
                                                    <!-- <div class="rating rateit-small"></div> -->
                                                    <div class="description"></div>
                                                    <!-- /.product-price -->
                                                </div>
                                                <!-- /.product-info -->
                                                <!-- <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                                <i class="fa fa-shopping-cart"></i>         
                                                                </button>
                                                                <button class="btn btn-primary" type="button">Add to cart</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    {/categorias}
                                    <?php }else {?>
                                    <?php foreach ($categorias as $key => $value): ?> 
                                    <?php //var_dump('<pre>',$value);exit();?>    
                                    <div class="col-sm-6 col-md-4 wow fadeInUp">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="<?=base_url('textiles/')?><?=$value['url']?>"><img  src="assets/frontend/images/blank.gif" data-echo="<?=$value['ruta']?>" alt="<?=$value['nombre']?>"></a>
                                                    </div>
                                                </div>
                                                <div class="product-info text-center">
                                                    <h3 class="name"><a href="<?=base_url('textiles/')?><?=$value['url']?>"><?=$value['nombre']?></a></h3>
                                                    <div class="description"></div>
                                                    <!--  <div class="product-price">
                                                        <?php if($value['precio_oferta']!=$value['precio']){ ?>
                                                                 <span class="price">
                                                                     <?=$value['precio']?>
                                                                 </span>
                                                                 <span class="price-before-discount">    <?=$value['precio_oferta']?>
                                                                 </span>
                                                         <?php } else { ?>
                                                                 <span class="price">
                                                                     <?=$value['precio']?>
                                                                 </span>
                                                         <?php } ?>  
                                                         </div> -->
                                                </div>
                                                <div class="cart clearfix animate-effect text-center">
                                                    <a class="btn btn-primary btn-detalle" href="<?=base_url('textiles/')?><?=$value['url']?>-<?=$value['id']?>/detalle">VER DETALLE</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- {/categorias} -->
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