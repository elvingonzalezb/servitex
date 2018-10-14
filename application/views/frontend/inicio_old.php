<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
		<div class="row">
			<!-- ============================================== SIDEBAR ============================================== -->	
			<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
				<!-- ================================== TOP NAVIGATION ================================== -->
				<div class="side-menu animate-dropdown outer-bottom-xs">
					<div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categorías</div>
					<nav class="yamm megamenu-horizontal" role="navigation">
						<ul class="nav">
							{categorias}
							<li class="dropdown menu-item">
								<a href="productos/{url}-{id}" {if {padre} == 1} class="dropdown-toggle" data-toggle="dropdown" {/if}><i class="icon fa fa-check"></i>{nombre}</a>
								{if {padre} == 1}
								<ul class="dropdown-menu mega-menu">
									<li class="yamm-content">
										<div class="row">
											{sub_categorias}
											<div class="col-sm-12 col-md-3">
												<ul class="links list-unstyled">
													<li><a href="productos/{url}-{id}">{nombre}</a></li>
												</ul>
											</div>
											<!-- /.col -->
											{/sub_categorias}
										</div>
										<!-- /.row -->
									</li>
									<!-- /.yamm-content -->                    
								</ul>
								{/if}
								<!-- /.dropdown-menu -->            
							</li>
							<!-- /.menu-item -->
							{/categorias}
						</ul>
						<!-- /.nav -->
					</nav>
					<!-- /.megamenu-horizontal -->
				</div>
				<!-- /.side-menu -->
				<!-- ================================== TOP NAVIGATION : END ================================== -->
				<!-- ============================================== SPECIAL OFFER ============================================== -->



				<div class="sidebar-widget outer-bottom-small wow fadeInUp">
					<h3 class="section-title">OFERTAS ESPECIALES</h3>
					
					<div class="sidebar-widget-body outer-top-xs">
						<div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
							{productosOfertas}		
									
							<div class="item">
								<div class="products special-product">			
									<div class="product">
										<div class="product-micro">
											<div class="row product-micro-row">
											<!-- <div class="product"> -->
												<div class="col col-xs-5">
													<div class="product-image">
														<div class="image">
															<a href="productos/{url}-{id}/detalle"  data-title="Nunc ullamcors">
																<img data-echo="files/productos/thumbs/{imagen}" alt="{nombre}">
																<div class="zoom-overlay"></div>
															</a>
														</div>
														<!-- /.image -->
													</div>
													<!-- /.product-image -->
												</div>
												<!-- /.col -->
												<div class="col col-xs-7">
													<div class="product-info">
														<h3 class="name"><a href="productos/{url}-{id}/detalle">{nombre}</a></h3>
														<!-- <div class="rating rateit-small"></div> -->
														<div class="product-price">	
															<span class="price">
															{precio_oferta}
															</span>
														</div>

														<!-- /.product-price -->
														<!-- <div class="action"><a href="#" class="lnk btn btn-primary">Add To Cart</a></div> -->
													</div>
												</div>

												<div class="cart clearfix animate-effect">
													<div class="action">
														<div class="add-cart-button btn-group">
															<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
															<i class="fa fa-eye"></i>					
															</button>
															<a class="btn btn-primary" href="productos/{url}-{id}/detalle">Ver detalle</a>
														</div>
													</div>
												</div>

												<!-- /.col -->
											<!-- </div> -->
											<!-- /.product-micro-row -->
											</div>
										</div>
										<!-- /.product-micro -->
									</div>
								</div>
							</div>
									
							{/productosOfertas}

						</div>
					</div>
					<!-- /.sidebar-widget-body -->
					
				</div>
				<!-- /.sidebar-widget -->

				<!-- ============================================== SPECIAL OFFER : END ============================================== -->
				<!-- ============================================== PRODUCT TAGS ============================================== -->
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
				<!-- /.sidebar-widget -->
			
				<!-- ============================================== NEWSLETTER ============================================== -->
				<!-- <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
					<h3 class="section-title">Newsletters</h3>
					<div class="sidebar-widget-body outer-top-xs">
						<p>Sign Up for Our Newsletter!</p>
						<form role="form">
							<div class="form-group">
								<label class="sr-only" for="exampleInputEmail1">Email address</label>
								<input type="email" name="email" id="sp-email" class="form-control" placeholder="Subscribe to our newsletter">
							</div>
							<div id="msj-suscriptor"></div>
							<a href="javascript:fnSuscripcion();" id="btnsuscriptor" class="btn btn-primary">Suscribete</a>
						</form>
					</div>
				</div> -->
				<!-- /.sidebar-widget -->
				<!-- ============================================== NEWSLETTER: END ============================================== -->
				<!-- ============================================== HOT DEALS ============================================== -->
			<!-- 	<div class="sidebar-widget hot-deals wow fadeInUp">
					<h3 class="section-title">hot deals</h3>
					<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">
						<div class="item">
							<div class="products">
								<div class="hot-deal-wrapper">
									<div class="image">
										<img src="assets/frontend/images/hot-deals/1.jpg" alt="">
									</div>
									<div class="sale-offer-tag"><span>35%<br>off</span></div>
									<div class="timing-wrapper">
										<div class="box-wrapper">
											<div class="date box">
												<span class="key">120</span>
												<span class="value">Days</span>
											</div>
										</div>
										<div class="box-wrapper">
											<div class="hour box">
												<span class="key">20</span>
												<span class="value">HRS</span>
											</div>
										</div>
										<div class="box-wrapper">
											<div class="minutes box">
												<span class="key">36</span>
												<span class="value">MINS</span>
											</div>
										</div>
										<div class="box-wrapper hidden-md">
											<div class="seconds box">
												<span class="key">60</span>
												<span class="value">SEC</span>
											</div>
										</div>
									</div>
								</div>
								<div class="product-info text-left m-t-20">
									<h3 class="name"><a href="detail.html">Apple Iphone 5s 32GB Gold</a></h3>
									<div class="rating rateit-small"></div>
									<div class="product-price">	
										<span class="price">
										$600.00
										</span>
										<span class="price-before-discount">$800.00</span>					
									</div>
								</div>
								<div class="cart clearfix animate-effect">
									<div class="action">
										<div class="add-cart-button btn-group">
											<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
											<i class="fa fa-shopping-cart"></i>													
											</button>
											<button class="btn btn-primary" type="button">Add to cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="products">
								<div class="hot-deal-wrapper">
									<div class="image">
										<img src="assets/frontend/images/hot-deals/2.jpg" alt="">
									</div>
									<div class="sale-offer-tag"><span>35%<br>off</span></div>
									<div class="timing-wrapper">
										<div class="box-wrapper">
											<div class="date box">
												<span class="key">120</span>
												<span class="value">Days</span>
											</div>
										</div>
										<div class="box-wrapper">
											<div class="hour box">
												<span class="key">20</span>
												<span class="value">HRS</span>
											</div>
										</div>
										<div class="box-wrapper">
											<div class="minutes box">
												<span class="key">36</span>
												<span class="value">MINS</span>
											</div>
										</div>
										<div class="box-wrapper hidden-md">
											<div class="seconds box">
												<span class="key">60</span>
												<span class="value">SEC</span>
											</div>
										</div>
									</div>
								</div>
								<div class="product-info text-left m-t-20">
									<h3 class="name"><a href="detail.html">Apple Iphone 5s 32GB Gold</a></h3>
									<div class="rating rateit-small"></div>
									<div class="product-price">	
										<span class="price">
										$600.00
										</span>
										<span class="price-before-discount">$800.00</span>	
									</div>
								</div>
								<div class="cart clearfix animate-effect">
									<div class="action">
										<div class="add-cart-button btn-group">
											<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
											<i class="fa fa-shopping-cart"></i>													
											</button>
											<button class="btn btn-primary" type="button">Add to cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="products">
								<div class="hot-deal-wrapper">
									<div class="image">
										<img src="assets/frontend/images/hot-deals/3.jpg" alt="">
									</div>
									<div class="sale-offer-tag"><span>35%<br>off</span></div>
									<div class="timing-wrapper">
										<div class="box-wrapper">
											<div class="date box">
												<span class="key">120</span>
												<span class="value">Days</span>
											</div>
										</div>
										<div class="box-wrapper">
											<div class="hour box">
												<span class="key">20</span>
												<span class="value">HRS</span>
											</div>
										</div>
										<div class="box-wrapper">
											<div class="minutes box">
												<span class="key">36</span>
												<span class="value">MINS</span>
											</div>
										</div>
										<div class="box-wrapper hidden-md">
											<div class="seconds box">
												<span class="key">60</span>
												<span class="value">SEC</span>
											</div>
										</div>
									</div>
								</div>
								<div class="product-info text-left m-t-20">
									<h3 class="name"><a href="detail.html">Apple Iphone 5s 32GB Gold</a></h3>
									<div class="rating rateit-small"></div>
									<div class="product-price">	
										<span class="price">
										$600.00
										</span>
										<span class="price-before-discount">$800.00</span>					
									</div>
								</div>
								<div class="cart clearfix animate-effect">
									<div class="action">
										<div class="add-cart-button btn-group">
											<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
											<i class="fa fa-shopping-cart"></i>													
											</button>
											<button class="btn btn-primary" type="button">Add to cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<!-- ============================================== HOT DEALS: END ============================================== -->
				<!-- ============================================== COLOR============================================== -->
				<!-- <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
					<div id="advertisement" class="advertisement">
						<div class="item bg-color">
							<div class="container-fluid">
								<div class="caption vertical-top text-left">
									<div class="big-text">
										Save<span class="big">50%</span>
									</div>
									<div class="excerpt">
										on selected items
									</div>
								</div>
							</div>
						</div>
						<div class="item" style="background-image: url('assets/frontend/images/advertisement/1.jpg');">
						</div>
						<div class="item bg-color">
							<div class="container-fluid">
								<div class="caption vertical-top text-left">
									<div class="big-text">
										Save<span class="big">50%</span>
									</div>
									<div class="excerpt fadeInDown-2">
										on selected items
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<!-- ============================================== COLOR: END ============================================== -->
			</div><!-- /.sidemenu-holder -->
			<!-- ============================================== SIDEBAR : END ============================================== -->
			<!-- ============================================== CONTENT ============================================== -->
			<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
				<!-- ========================================== SECTION – HERO ========================================= -->
				{banners}
				<!-- ========================================= SECTION – HERO : END ========================================= -->	
				<!-- ============================================== INFO BOXES ============================================== -->
				<!-- <div class="info-boxes wow fadeInUp">
					<div class="info-boxes-inner">
						<div class="row">
							<div class="col-md-6 col-sm-4 col-lg-4">
								<div class="info-box">
									<div class="row">
										<div class="col-xs-2">
											<i class="icon fa fa-dollar"></i>
										</div>
										<div class="col-xs-10">
											<h4 class="info-box-heading green">money back</h4>
										</div>
									</div>
									<h6 class="text">30 Day Money Back Guarantee.</h6>
								</div>
							</div>
							<div class="hidden-md col-sm-4 col-lg-4">
								<div class="info-box">
									<div class="row">
										<div class="col-xs-2">
											<i class="icon fa fa-truck"></i>
										</div>
										<div class="col-xs-10">
											<h4 class="info-box-heading orange">free shipping</h4>
										</div>
									</div>
									<h6 class="text">free ship-on oder over $600.00</h6>
								</div>
							</div>
							<div class="col-md-6 col-sm-4 col-lg-4">
								<div class="info-box">
									<div class="row">
										<div class="col-xs-2">
											<i class="icon fa fa-gift"></i>
										</div>
										<div class="col-xs-10">
											<h4 class="info-box-heading red">Special Sale</h4>
										</div>
									</div>
									<h6 class="text">All items-sale up to 20% off </h6>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<!-- /.info-boxes -->
				<!-- ============================================== INFO BOXES : END ============================================== -->
				<!-- ============================================== SCROLL TABS ============================================== -->
				<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
					<div class="more-info-tab clearfix ">
						<h3 class="new-product-title pull-left">Productos</h3>
						<!--<ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
							<li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
							<li><a data-transition-type="backSlide" href="#smartphone" data-toggle="tab">smartphone</a></li>
							<li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">laptop</a></li>
							<li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">apple</a></li>
						</ul>-->
						<!-- /.nav-tabs -->
					</div>
					<div class="tab-content outer-top-xs">
						<div class="tab-pane in active" id="all">
							<div class="product-slider">
								<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="3">
									{productosNuevos}
									<div class="item item-carousel">
										<div class="products">
											<div class="product">
												<div class="product-image">
													<div class="image">
														<a href="productos/{url}-{id}/detalle"><img  src="assets/frontend/images/blank.gif" data-echo="files/productos/medianas/{imagen}" alt=""></a>
													</div>
													<!-- /.image -->			
													<!-- <div class="tag new"><span>new</span></div> -->
												</div>
												<!-- /.product-image -->
												<div class="product-info text-left">
													<h3 class="name"><a href="productos/{url}-{id}/detalle">{nombre}</a></h3>
													<!-- <div class="rating rateit-small"></div> -->
													<div class="description"></div>
													<div class="product-price">	
														<span class="price">
														{precio}
														</span>
														<span class="price-before-discount">{precio_oferta}</span>
													</div>
													<!-- /.product-price -->
												</div>
												<div class="cart clearfix animate-effect">
													<div class="action">
														<div class="add-cart-button btn-group">
																<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
															<i class="fa fa-eye"></i>					
															</button>
															<a class="btn btn-primary" href="productos/{url}-{id}/detalle">Ver detalle</a>
														</div>
													</div>
												</div>
												<!-- /.product-info -->
												<!-- <div class="cart clearfix animate-effect"> -->
													<!--<div class="action">
														<ul class="list-unstyled">
															<li class="add-cart-button btn-group">
																<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																<i class="fa fa-shopping-cart"></i>													
																</button>
																<button class="btn btn-primary" type="button">Add to cart</button>
															</li>
															<li class="lnk wishlist">
																<a class="add-to-cart" href="detail.html" title="Wishlist">
																<i class="icon fa fa-heart"></i>
																</a>
															</li>
															<li class="lnk">
																<a class="add-to-cart" href="detail.html" title="Compare">
																<i class="fa fa-retweet"></i>
																</a>
															</li>
														</ul>
													</div>-->
													<!-- /.action -->
												<!-- </div> -->
												<!-- /.cart -->
											</div>
											<!-- /.product -->
										</div>
										<!-- /.products -->
									</div>
									<!-- /.item -->
									{/productosNuevos}
									<!-- /.item -->

								</div>
								<!-- /.home-owl-carousel -->
							</div>
							<!-- /.product-slider -->
						</div>
						<!-- /.tab-pane -->
					</div>
					<!-- /.tab-content -->
				</div>
				<!-- /.scroll-tabs -->
				<!-- ============================================== SCROLL TABS : END ============================================== -->
				<!-- ============================================== WIDE PRODUCTS ============================================== -->
				<!-- <div class="wide-banners wow fadeInUp outer-bottom-vs">
					<div class="row">
						<div class="col-md-7">
							<div class="wide-banner cnt-strip">
								<div class="image">
									<img class="img-responsive" data-echo="assets/frontend/images/banners/1.jpg" src="assets/frontend/images/blank.gif" alt="">
								</div>
								<div class="strip">
									<div class="strip-inner">
										<h3 class="hidden-xs">samsung</h3>
										<h2>galaxy</h2>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="wide-banner cnt-strip">
								<div class="image">
									<img class="img-responsive" data-echo="assets/frontend/images/banners/2.jpg" src="assets/frontend/images/blank.gif" alt="">
								</div>
								<div class="strip">
									<div class="strip-inner">
										<h3 class="hidden-xs">new trend</h3>
										<h2>watch phone</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<!-- /.wide-banners -->
				<!-- ============================================== WIDE PRODUCTS : END ============================================== -->
				<!-- ============================================== FEATURED PRODUCTS ============================================== -->
				<section class="section featured-product wow fadeInUp">
					<h3 class="section-title">Categorías</h3>
					<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs" data-item="3">
						{categorias}
						<div class="item item-carousel">
							<div class="products">
								<div class="product">
									<div class="product-image">
										<div class="image">
											<a href="productos/{url}-{id}"><img  src="files/categorias/medianas/{imagen}" data-echo="files/categorias/medianas/{imagen}" alt="{nombre}"></a>
										</div>
										<!-- /.image -->			
										<!-- <div class="tag hot"><span>hot</span></div> -->
									</div>
									<!-- /.product-image -->
									<div class="product-info text-left">
										<h3 class="name"><a href="productos/{url}-{id}">{nombre}</a></h3>
										<!-- /.product-price -->
									</div>
									<!-- /.product-info -->
								</div>
								<!-- /.product -->
							</div>
							<!-- /.products -->
						</div>
						<!-- /.item -->
						{/categorias}
					</div>
					<!-- /.home-owl-carousel -->
				</section>
				<!-- /.section -->
				<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
				<!-- ============================================== WIDE PRODUCTS ============================================== -->
				<!-- <div class="wide-banners wow fadeInUp outer-bottom-vs">
					<div class="row">
						<div class="col-md-12">
							<div class="wide-banner cnt-strip">
								<div class="image">
									<img class="img-responsive" data-echo="assets/frontend/images/banners/3.jpg" src="assets/frontend/images/blank.gif" alt="">
								</div>
								<div class="strip strip-text">
									<div class="strip-inner">
										<h2 class="text-right">one stop place for<br>
											<span class="shopping-needs">all your shopping needs</span>
										</h2>
									</div>
								</div>
								<div class="new-label">
									<div class="text">NEW</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<!-- /.wide-banners -->
				<!-- ============================================== WIDE PRODUCTS : END ============================================== -->
	
				<!-- ============================================== BLOG SLIDER ============================================== -->
				<!-- <section class="section outer-bottom-vs wow fadeInUp">
					<h3 class="section-title">Últimos Articulos</h3>
					<div class="blog-slider-container outer-top-xs">
						<div class="owl-carousel blog-slider custom-carousel">
							{articulos}
							<div class="item">
								<div class="blog-post">
									<div class="blog-post-image">
										<div class="image">
											<a href="articulos/{url}-{id}"><img data-echo="files/articulos/medianas/{imagen}" width="270" height="135" src="assets/frontend/images/blank.gif" alt=""></a>
										</div>
									</div>
									<div class="blog-post-info text-left">
										<h3 class="name"><a href="articulos/{url}-{id}">{nombre}</a></h3>
										<span class="info"><i class="fa fa-user"></i> {autor} - {creado}</span>
										<p class="text">{resumen}</p>
										<a href="articulos/{url}-{id}" class="lnk btn btn-primary">Leer más</a>
									</div>
								</div>
							</div>
							{/articulos}
						</div>
					</div>
				</section> -->
				<!-- /.section -->
				<!-- ============================================== BLOG SLIDER : END ============================================== -->

			</div>
			<!-- /.homebanner-holder -->
			<!-- ============================================== CONTENT : END ============================================== -->
		</div><!-- /.row -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
		<!-- <div id="brands-carousel" class="logo-slider wow fadeInUp">
			<h3 class="section-title">Our Brands</h3>
			<div class="logo-slider-inner">
				<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
					{clientes}
					<div class="item m-t-10">
						<a href="#" class="image">
						<img data-echo="files/partners/thumbs/{logo}" src="" alt="">
						</a>	
					</div>
					{/clientes}
				</div>
			</div>
		</div> -->
		<!-- /.logo-slider -->
		<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->