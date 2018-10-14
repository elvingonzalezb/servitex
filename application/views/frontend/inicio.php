
<!-- ========================================= SECTION – HERO : END ========================================= -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
		<div class="row separation">
			<!-- ============================================== SIDEBAR ============================================== -->	
			<div class="col-xs-12 col-sm-12 col-md-3 sidebar">

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
			</div><!-- /.sidemenu-holder -->
			<!-- ============================================== SIDEBAR : END ============================================== -->
			<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
				<div class="search-result-container">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active " id="grid-container">
                            <div class="category-product  inner-top-vs space-categories">
                                <div class="row files-size">
                                    {categorias}     
                                    <div class="col-sm-6 col-md-4 wow fadeInUp">
                                        <div class="products">
                                            <div class="product bloquesproducts">
                                                <div class="product-image right-product-info">
                                                    <div class="image">
                                                        <a href="<?=base_url('productos/')?>{url}"><img class="img-responsive" src="assets/frontend/images/blank.gif" data-echo="{ruta}" alt="{imagen_title}"></a>
                                                    </div>
                                                </div>
                                                <div class="product-info text-left left-product-image">
                                                    <h3 class="name"><a href="<?=base_url('productos/')?>{url}">{nombre}</a></h3>
                                                    <div class="description"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {/categorias}
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
		</div><!-- /.row -->
		
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
				<div class="more-info-tab clearfix ">
					<h3 class="new-product-title pull-left">Destacados</h3>
				</div>
				<div class="fadeInUp outer-bottom-vs inner-top-vs">
					<div class="row">
						{promociones}
						<div class="col-md-6">
							<div class="wide-banner cnt-strip">
								<div class="image">
									<img class="img-responsive" data-echo="files/banners/{imagen}" src="assets/frontend/images/blank.gif" alt="">
								</div>
								<div class="strip">
									<div class="strip-inner">
										<h3 class="hidden-xs">{titulo}</h3>
										<h2>{subtitulo}</h2>
									</div>
								</div>
							</div>
							<!-- /.wide-banner -->
						</div>
							<!-- /.col -->
						{/promociones}
					</div>
					<!-- /.row -->
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="search-result-container scroll-tabs">
				<div class="more-info-tab clearfix ">
					<h3 class="new-product-title pull-left">Nuestros Servicios</h3>
				</div>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active " id="grid-container">
                        <div class="category-product  inner-top-vs space-categories">
                            <div class="row">
	                            <div class="blog-page">
	                                {servicios}     
	                                <div class="col-sm-6 col-md-3 separation-services">
	                                    <div class="blog-post  wow fadeInUp">
	                                        <a href="<?=base_url('solo_servicios/')?>{url_id}"><img class="img-responsive" src="files/solo_servicios/{imagen}" alt="{imagen_title}"></a>
	                                        <h1>
	                                        	<a href="<?=base_url('solo_servicios/')?>{url_id}">{nombre}</a>
	                                        </h1>
	                                        <p class="text">{resumen}</p>
	                                	</div>
	                                </div>
	                                {/servicios}
	                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix blog-pagination filters-container  wow fadeInUp outer-top-bd">
                    <div class="text-right">
                        <div class="pagination-container">
                            <ul class="list-inline list-unstyled">
                                {paginacion2}
                             </ul>
                                <!-- /.list-inline -->
                        </div>
                        <!-- /.pagination-container -->  
                     </div>
                     <!-- /.text-right -->
                   </div>
                </div>
            </div>
		</div>

	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu