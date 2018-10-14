    <div class="breadcrumb">
            <div class="container">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="#">Inicio</a></li>
                        <li class='active'>Galeria de Fotos</li>
                    </ul>
                </div><!-- /.breadcrumb-inner -->
            </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content outer-top-bd">
        <div class="container">
            <div class="row  outer-bottom-vs">
                <div class="blog-page">
                    
                    <div class="col-md-12">
                      <h2><center> GALERIA DE FOTOS </center></h2>
                        {dataset}
                        <div class="col-md-4">
                            <form>
                             <tr>
                                <div class="blog-post  wow fadeInUp">
                                    <a href="files/galeria_fotos/{imagen}" data-lightbox="image-1" data-title="{nombre}">
										<img  class="img-responsive" data-echo="files/galeria_fotos/{imagen}" src="files/galeria_fotos/{imagen}" alt="{imagen_title}">
										<div class="zoom-overlay"></div>
									</a>
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