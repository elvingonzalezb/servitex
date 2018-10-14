    <div class="breadcrumb">
            <div class="container">
                <!-- plantilla de banner propia -->
                <?php if($banner['visible']==1){?>
                <div style="background-image:url(files/secciones/<?=$banner['imagen']?>); width: 100%;left: 0;top: 0;height: 100%;"  class="dez-bnr-inr overlay-black-middle">
                    <div class="container">
                        <div class="dez-bnr-inr-entry">
                            <h1 class="text-white h1-custom">Galeria de Videos</h1>
                        </div>
                    </div>
                </div>
                <?php }?>
                <!-- cierre banner -->
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="#">Inicio</a></li>
                        <li class='active'>Galeria Albumes de videos</li>
                    </ul>
                </div><!-- /.breadcrumb-inner -->
            </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content outer-top-bd">
        <div class="container">
            <div class="row  outer-bottom-vs">
                <div class="blog-page">
                    
                    <div class="col-md-12">
                      <h2><center>GALERIA ALBUMES DE VIDEOS</center></h2>
                        {dataset}
                        <div class="col-md-4">
                            <form>
                             <tr>
                                <div class="blog-post  wow fadeInUp">
                                        <a href="<?=base_url('galeria_videos/')?>{url_id}">
                                        <img class="img-responsive" src="files/galeria_videos/{video}" alt="{video_title}">
                                        </a>
                                        <h1><a href="<?=base_url('galeria_videos/')?>{url_id}">{nombre}</a></h1>
                                </div>
                            </tr>
                            </form>
                        </div> <!-- fin col-md-4 -->
                        {/dataset}
                    </div>   <!-- fin col-md-12 -->
                       
                    <div class="col-md-12">
                        <div class="clearfix blog-pagination filters-container  wow fadeInUp outer-top-bd">                  
                            <div class="text-right">
                                <div class="pagination-container">
                                    <ul class="list-inline list-unstyled">
                                        {paginacion}
                                    </ul><!-- /.list-inline -->
                                </div><!-- /.pagination-container -->  
                            </div><!-- /.text-right -->
                            
                        </div>
                    </div>   <!-- fin col-md-12 -->
                   
                </div> <!-- fin blog-page -->
            </div>  <!-- fin row  outer-bottom-vs -->
        </div>  <!-- fin container -->
    </div>


