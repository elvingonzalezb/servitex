    <div class="breadcrumb">
                <!-- plantilla de banner propia -->
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
                            <li><a href="#">Inicio</a></li>
                            <li class='active'>Servicios</li>
                        </ul>
                    </div>
                </div><!-- /.breadcrumb-inner -->
    </div><!-- /.breadcrumb -->

    <div class="body-content outer-top-bd">
        <div class="container">
            <div class="row  outer-bottom-vs">
                <div class="blog-page">

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <h2><center><?php echo strtoupper(mostrarTitulo(3)); ?></center></h2>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product  inner-top-vs space-categories">
                                    <div class="row">
                                        <div class="blog-page">
                                            {dataset}     
                                            <div class="col-sm-6 col-md-3 separation-services">
                                                <div class="blog-post  wow fadeInUp">
                                                    <a href="<?=base_url('solo_servicios/')?>{url_id}"><img class="img-responsive" src="files/solo_servicios/{imagen}" alt="{imagen_title}"></a>
                                                    <h1>
                                                        <a href="<?=base_url('solo_servicios/')?>{url_id}">{nombre}</a>
                                                    </h1>
                                                    <p class="text">{resumen}</p>
                                                </div>
                                            </div>
                                            {/dataset}
                                        </div>
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
                                </div>
                             </div>
                           </div>
                        </div>
                    </div>
                   
                </div> <!-- fin blog-page -->
            </div>  <!-- fin row  outer-bottom-vs -->
        </div>  <!-- fin container -->
    </div>


  