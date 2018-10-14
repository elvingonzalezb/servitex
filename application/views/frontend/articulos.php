<div class="breadcrumb">
        <?php if($seccion['visible']==1){?>
        <div  class="dez-bnr-inr overlay-black-middle" style="background-image:url(files/secciones/<?=$seccion['imagen']?>);">
        </div>
        <?php }?>
    <div class="breadcrumb-inner">
        <div class="container">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Inicio</a></li>
                <li class='active'>Articulos</li>
            </ul>
        </div>
    </div>
</div>
<div class="body-content outer-top-bd contenido-articlo">
    <div class="container">
        <div class="row  outer-bottom-vs">
            <div class="blog-page">
                <?=$this->session->flashdata('message')?>
                <div class="col-md-9">
                    <div class="col-md-12">
                        <div class="row list-dashed">
                            <?php foreach ($articulos as $key => $articulo): ?>
                            
                            <div class="blog-post outer-top-bd  wow fadeInUp">
                                <article class="post clearfix mb-30 bg-lighter">
                                    <div class="col-md-4">
                                        <div class="mt-20">
                                            <a href="articulos/<?=$articulo['url'].'-'.$articulo['id']?>"><img class="img-responsive" src="files/articulos/<?=$articulo['imagen']?>" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="p-20">
                                            <h1><a href="articulos/<?=$articulo['url'].'-'.$articulo['id']?>"><?=$articulo['nombre']?></a></h1>
                                            <span class="author"><?=$articulo['autor']?></span>
                                            <?php $comentario=(($articulo['num_comentarios']<>1) ? 'comentarios':'comentario') ?>
                                            <span class="review"><?=$articulo['num_comentarios']?> <?= $comentario?></span>
                                            <span class="date-time"><?=date_format(date_create($articulo['creado']), 'Y-m-d')?></span>
                                            <p><?=$articulo['resumen']?></p>
                                            <a href="articulos/<?=$articulo['url'].'-'.$articulo['id']?>" class="btn btn-upper btn-primary read-more">Leer más</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="blog-pagination filters-container  wow fadeInUp outer-top-bd">
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
                <!-- fin col-md-9 -->
                <div class="col-md-3 sidebar">
                    <div class="sidebar-module-container">
                                              
                                           
                        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                            <div class="more-info-tab clearfix ">
                                <h3 class="new-product-title pull-left">Articulos Recientes</h3>
                            </div>
                            <div class="tab-content outer-top-xs">
                                <div class="tab-pane in active" id="all">
                                    <div class="product-slider">
                                            {recientes}
                                            <div class="item item-carousel space-services">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image front-img">
                                                                <a href="articulos/url}-{id}"><img class="img-responsive" src="files/articulos/{imagen}" data-echo="files/articulos/{imagen}" alt="{nombre}"></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-info text-center">
                                                            <h3 class="name"><a href="articulos/{url}-{id}">{nombre}</a></h3>
                                                            <div class="description"></div>
                                                        </div>
                                                        <div class="cart clearfix text-center">
                                                            <a class="btn btn-primary btn-detalle" href="articulos/{url}-{id}">VER DETALLE</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {/recientes}
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- fin blog-page -->
        </div>
        <!-- fin row  outer-bottom-vs -->
    </div>
    <!-- fin container -->
</div>