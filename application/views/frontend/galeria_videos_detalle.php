    <div class="breadcrumb">
            <div class="container">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="#">Inicio</a></li>
                        <li class='active'>Galeria de Videos</li>
                    </ul>
                </div><!-- /.breadcrumb-inner -->
            </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content outer-top-bd">
        <div class="container">
            <div class="row  outer-bottom-vs">
                <div class="blog-page">
                    
                    <div class="col-md-12">
                      <h2><center> GALERIA DE VIDEOS </center></h2>
                        {dataset}
                        <div class="col-md-4">
                            <form>
                             <tr>
                                <div class="blog-post  wow fadeInUp">
                                    <!--   <a href="http://www.youtube.com/watch?v=<?=$value['codigo_video']?>" data-lightbox-title="<?=$value['video_title']?>"> -->
                                    <!-- <a width="260" height="115" href="https://www.youtube.com/embed/<?=$value['codigo_video']?>" data-lightbox-title="<?=$value['video_title']?>"> -->
                                    <ul class="list">
                                        <li>
                                        <a data-fancybox href="http://www.youtube.com/watch?v={codigo_video}">
                                            <img class="img-responsive" src="http://i2.ytimg.com/vi/{codigo_video}/hqdefault.jpg" width="200" alt="{video_title}"> 
                                        </a>
                                        </li>
                                    </ul>
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