<link type="text/css" rel="stylesheet" href="assets/frontend/css/lightslider.css" />
<script src="assets/frontend/js/lightslider.js"></script>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="./">Inicio</a></li>
				<!-- <li><a href="productos">Categorías</a></li> -->
				<!-- <?php echo $migaja?> -->
				<!-- <li class='active'><?= $producto['nombre'] ?></li> -->
				<?php echo getFrontBreadProd(); ?>
			</ul>
		</div>
		<!-- /.breadcrumb-inner -->
	</div>
	<!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product outer-bottom-sm '>
			<div class='col-md-3 sidebar'>
				<!-- ================================== TOP NAVIGATION ================================== -->
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
				<!-- ================================== TOP NAVIGATION : END ================================== -->     
				<!-- ============================================== HOT DEALS ============================================== -->
				<div class="sidebar-widget outer-bottom-small wow fadeInUp">
					<h3 class="section-title">OFERTAS ESPECIALES</h3>
					<div class="sidebar-widget-body outer-top-xs">
						<div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs" data-item="1">
							{productosOfertas}
							<div class="product">
								<div class="product-micro">
									<div class="row product-micro-row">
										<div class="col col-xs-5">
											<div class="product-image">
												<div class="image">
													<a href="productos/{url}-{id}/detalle"  data-title="Nunc ullamcors">
														<img  src="assets/frontend/images/blank.gif" data-echo="files/productos/thumbs/{imagen}" alt="{imagen_title}">
														<div class="zoom-overlay"></div>
													</a>
												</div>
												<!-- /.image -->
												<div class="tag tag-micro hot" style="width: 39px;height: 38px;top: 1.5%; right: 10px;">
													<span style="top: 4px;">Oferta</span>
												</div>
											</div>
											<!-- /.product-image -->
										</div>
										<!-- /.col -->
										<div class="col col-xs-7">
											<div class="product-info">
												<h3 class="name"><a href="productos/{url}-{id}/detalle">{nombre}</a></h3>
												<!-- <div class="rating rateit-small"></div> -->
												<!-- <div class="product-price">	
													<span class="price">
													{precio_oferta}
													</span>
													</div> -->
												<!-- /.product-price -->
												<!-- <div class="action"><a href="#" class="lnk btn btn-primary">Add To Cart</a></div> -->
											</div>
											<div class="cart clearfix text-center">
												<a class="btn btn-primary btn-detalle" href="<?=base_url('productos/')?>{url}-{id}/detalle">VER DETALLE</a>
											</div>
										</div>
										<!-- /.col -->
									</div>
									<!-- /.product-micro-row -->
								</div>
								<!-- /.product-micro -->
							</div>
							{/productosOfertas}
						</div>
					</div>
					<!-- /.sidebar-widget-body -->
				</div>
				<!-- ============================================== HOT DEALS: END ============================================== -->
				<!-- </div> -->
			</div>
			<!-- /.sidebar -->
			<div class='col-md-9'>
				<div class="row  wow fadeInUp">
					<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
						<div class="product-item-holder size-big single-product-gallery small-gallery">
							<div class="hidden-xs">
								<div id="owl-thmubs"  class="slide-cont">
									<ul id="imageGallery">
										{imagenes}
										<li data-thumb="files/productos/{imagen}">
											<a href="files/productos/{imagen}" data-fancybox="images">
											<img class="img-responsive" src="files/productos/{imagen}" />
											</a>
										</li>
										{/imagenes}
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /.gallery-holder -->   
					<div class='col-sm-6 col-md-7 product-info-block'>
						<!-- ## PRODUCTO DETALLE ## -->
						<form method="post" action="{url_post}" id="detalleProducto">
							<div class="product-info">
								<h1 class="name titulo-detalle-producto"><?=$producto['nombre']?></h1>
								<input type="hidden" id="productoID" name="id" value="<?=$producto['id']?>">
								<?php if(!empty($producto['codigo'])):?>
								<div>
									<p>Codigo del producto: <?=$producto['codigo']?></p>
								</div>
								<?php endif ?>	
								<!-- /.rating-reviews -->
								<!-- <div class="stock-container info-container m-t-10">
									<div class="row">
										<div class="col-sm-3">
											<div class="stock-box">
												<span class="label">Stock :</span>
											</div>
										</div>
										<div class="col-sm-9">
											<div class="stock-box">
												<?php //if (!empty($atributos)): ?>
												<span class="value" id="msjStock">#</span>
												<?php //else: ?>
												<span class="value" id="msjStock"><?//=( empty($producto['cantidad']) ? 'agotado' : $producto['cantidad'])?></span>
												<?php //endif ?>
											</div>
										</div>
									</div>	
								</div> -->
								<div class="description-container m-t-20">
									<?=$producto['descripcion']?>
								</div>
								<?php if (!empty($atributos)): ?>
								<div class="attributes-list outer-top-vs">
									<fieldset class="attribute_fieldset">
										<div class="row">
											<input type="hidden" id="selectAtributos" name="atributo" value="" />
											<label for="group_1" class="col-sm-2 attribute_label attribute-key">Color:&nbsp;</label>
											<!-- <div class="col-sm-10 attribute_list"> -->
											<div class="col-sm-12">

												<div class="product-price text-left" ">
													<?php foreach ($atributos as $atributo): ?>
													<?php foreach ($atributo['atributos'] as $key => $detalle): ?>
													<!-- <span class="colores colores-detail"> -->
													<div class="colores colores-detail" onclick="colorPrecioAjax(<?= $atributo['id'] ?>)" style="cursor: pointer;background-color: <?php echo $detalle['valor'] ?>;width: 50px;height: 50px;"></div>
													<!-- </span> -->
													<?php endforeach ?>
													<?php endforeach ?>
												</div>
											</div>
											<!-- </div>  -->
										</div>
									</fieldset>
								</div>
								<?php endif ?>
								<div class="quantity-container info-container">
									<div class="row">
										<div class="col-sm-2">
											<span class="label">Cantidad :</span>
										</div>
										<div class="col-sm-2">
											<div class="cart-quantity">
												<div class="quant-input">
													<div class="arrows">
														<div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
														<div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
													</div>
													<input type="text" id="inputCantidad" name="cantidad" value="1" min="1">
												</div>
											</div>
										</div>
										<div>
											<input type="hidden" name="codigo" value="<?=$producto['codigo']?>">
										</div>
										<div class="col-sm-7">
											<a id="btnAddCar" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> Añadir a cotización</a>
											<!--<button id="btnAddCar" type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> Añadir al carrito</button>-->
										</div>
									</div>
									<!-- /.row -->
								</div>
								<!-- /.quantity-container -->
								<div class="product-social-link m-t-20 text-right">
									<span class="social-label">Compartir :</span>
									<div class="social-icons">
										<ul class="list-inline">
											<li><a href="<?=CompartirRedes('facebook',$producto['url_share']);?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
											<li><a href="<?=CompartirRedes('twitter',$producto['url_share']);?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
											<li><a href="<?=CompartirRedes('google+',$producto['url_share']);?>" target="_blank"><i class="fa fa-google"></i></a></li>
										</ul>
										<!-- /.social-icons -->
									</div>
								</div>
							</div>
							<!-- /.product-info -->
						</form>
						<!-- ## PRODUCTO DETALLE ## -->
					</div>
					<!-- /.col-sm-7 -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.col -->
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- /.container -->
</div>
<!-- /.body-content -->
<!--  fancybox-->
<script src="assets/frontend/js/jquery.fancybox.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#imageGallery').lightSlider({
	      gallery:true,
	      item:1,
	     // vertical:true,
	      //verticalHeight:295,
	      //vThumbWidth:50,
	      thumbItem:5,
	      thumbMargin:4,
	      slideMargin:0
	    });
	  });
	$('[data-fancybox="images"]').fancybox({
	  loop : false,
	  thumbs : {
	    showOnStart : true
	  },
	  margin : [ 44, 0, 90, 0 ]
	})
</script>