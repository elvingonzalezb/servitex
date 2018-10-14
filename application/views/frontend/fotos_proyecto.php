    <div class="breadcrumb">
            <div class="container">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="#">Inicio</a></li>
                        <li class='active'>Fotos del proyecto</li>
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
                        <?php foreach ($dataset as $key => $value): ?>
                        <div class="col-md-4">
                            <form>
                             <tr>
                                <div class="blog-post  wow fadeInUp">
                                    <a href="files/proyectos/<?=$value['imagen']?>" data-lightbox="image-1" data-title="<?=$value['nombre']?>">
										<img  class="img-responsive" data-echo="files/proyectos/<?=$value['imagen']?>" src="files/proyectos/<?=$value['imagen']?>" alt="<?=$value['imagen_title']?>">
										<div class="zoom-overlay"></div>
									</a>
                                </div>
                            </tr>
                            </form>
                        </div> <!-- fin col-md-4 -->
                        <?php endforeach;?>
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