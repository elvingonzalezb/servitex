<div class="breadcrumb">
    <div class="container">
        <!-- plantilla de banner propia -->
        <div style="background-image:url(files/secciones/<?=$seccion['imagen']?>); width: 100%;left: 0;top: 0;height: 100%;"  class="dez-bnr-inr overlay-black-middle">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white h1-custom">Resultados</h1>
                </div>
            </div>
        </div>
        <!-- cierre banner -->
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="./">Home</a></li>
                <li class='active'>Resultados</li>
            </ul>
        </div>
        <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row outer-bottom-sm'>
            <div class='col-md-3 sidebar'>
                <!-- ================================== TOP NAVIGATION ================================== -->
                <div class="side-menu animate-dropdown outer-bottom-xs">
                    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
                    <nav class="yamm megamenu-horizontal" role="navigation">
                        <ul class="nav">
                            {categorias}
                            <li class="dropdown menu-item">
                                <a href="<?=base_url('productos/')?>{url}" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-desktop fa-fw"></i>{nombre}</a>
                            </li>
                            {/categorias}
                        </ul>
                    </nav>
                </div>
                <!-- ================================== TOP NAVIGATION : END ================================== -->             
            </div>
            <!-- /.sidebar -->
            <div class='col-md-9'>
                <!-- ========================================== SECTION – HERO ========================================= -->
                <!-- ========================================= SECTION – HERO : END ========================================= -->
                <div class="search-result-container">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active " id="grid-container">
                            <div class="category-product  inner-top-vs">
                                <div class="row">
                                    {productos}
                                    <div class="col-sm-6 col-md-4 wow fadeInUp">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="<?=base_url('productos/')?>{url}"><img  src="assets/frontend/images/blank.gif" data-echo="files/productos/medianas/{imagen}" alt="{nombre}"></a>
                                                    </div>
                                                    <!-- /.image -->          
                                                </div>
                                                <!-- /.product-image -->
                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="<?=base_url('productos/')?>{url}">{nombre}</a></h3>
                                                    <div class="description"></div>
                                                    <div class="product-price"> 
                                                        <span class="price">
                                                        {precio}             </span>
                                                        <span class="price-before-discount">{precio_oferta}</span>
                                                    </div>
                                                    <!-- /.product-price -->
                                                </div>
                                                <!-- /.product-info -->
                                            </div>
                                        </div>
                                    </div>
                                    {/productos}
                                </div>
                            </div>
                        </div>
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