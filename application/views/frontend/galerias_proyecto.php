    <div class="breadcrumb">
            <div class="container">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="#">Inicio</a></li>
                        <li class='active'>Galerias del Proyecto</li>
                    </ul>
                </div><!-- /.breadcrumb-inner -->
            </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content outer-top-bd">
        <div class="container">
            <div class="row  outer-bottom-vs">
                <div class="blog-page">
                    
                    <div class="col-md-12">
                      <h2><center>GALERIAS DEL PROYECTO</center></h2>
                        {dataset}
                        <div class="col-md-4">
                            <form>
                             <tr>
                                <div class="blog-post  wow fadeInUp">
                                    <a href="<?=base_url('fotos_proyecto/')?>{url_id}"><img class="img-responsive" src="files/proyectos/{imagen}" alt="{imagen_title}"></a>
                                    <h1><a href="<?=base_url('fotos_proyecto/')?>{url_id}">{nombre}</a></h1>
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


