<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<base href="<?= BASE_URL ?>">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="<?=( ! empty($seo['seo_description']) ? $seo['seo_description'] : '')?>">
		<meta name="author" content="">
	    <meta name="keywords" content="<?=( ! empty($seo['seo_keywords']) ? $seo['seo_keywords'] : '')?>">
	    <meta name="robots" content="all">
	    <title><?=( ! empty($seo['seo_title']) ? $seo['seo_title'] : '')?></title>


	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/frontend/css/bootstrap.min.css">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/frontend/css/main.css">
	    <link rel="stylesheet" href="assets/frontend/css/blue.css">
	    
	    <link rel="stylesheet" href="assets/frontend/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/frontend/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/frontend/css/owl.theme.css">-->
		<link href="assets/frontend/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/frontend/css/animate.min.css">
		<link rel="stylesheet" href="assets/frontend/css/rateit.css">
		<link rel="stylesheet" href="assets/frontend/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production : END -->

		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/frontend/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/frontend/images/favicon.ico">

		<!-- SWEETALERT.CSS -->
  		<link rel="stylesheet" type="text/css" href="assets/frontend/plugins/sweetalert/css/sweetalert.css">
		<script src="assets/frontend/js/jquery-1.11.1.min.js"></script>
		<!--  fancybox-->
		<link rel="stylesheet" type="text/css" href="assets/frontend/css/jquery.fancybox.min.css">
		<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

		<link rel="stylesheet" href="assets/frontend/plugins/slick/slick.css">
		<link rel="stylesheet" href="assets/frontend/plugins/slick/slick-theme.css">
		<!-- Magnific Popup core CSS file -->
		<link rel="stylesheet" type="text/css" href="assets/frontend/plugins/magnific-popup/magnific-popup.css">

		<link rel="stylesheet" type="text/css" href="assets/frontend/css/thumbs-products.css">
		<link rel="stylesheet" href="assets/frontend/css/custom.css">
	</head>
    <body class="cnt-home">
		<!-- ============================================== HEADER ============================================== -->
		<header class="header-style-1">
			<!-- ============================================== TOP MENU ============================================== -->
			<div class="top-bar animate-dropdown">
				<div class="container">
					
					<div class="header-top-inner text-left col-lg-10">
						<div class="cnt-account">
							<ul class="list-unstyled">
								<?=getLogueado()?>
							</ul>
						</div>
						<!-- /.cnt-account -->
						<!--<div class="cnt-block">
							<ul class="list-unstyled list-inline">
								<li class="dropdown dropdown-small">
									<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="#">USD</a></li>
										<li><a href="#">INR</a></li>
										<li><a href="#">GBP</a></li>
									</ul>
								</li>
								<li class="dropdown dropdown-small">
									<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="#">English</a></li>
										<li><a href="#">French</a></li>
										<li><a href="#">German</a></li>
									</ul>
								</li>
							</ul>
						</div>-->
						<!-- /.cnt-cart -->
						<div class="clearfix"></div>
					</div>
					<!-- /.header-top-inner -->
					<span class="header-top-inner text-right col-lg-2 header-right">
						<!-- <div class="cnt-account inicio-top-correo">
						<i class="icon fa fa-envelope"></i> <?=dataConfig('correo_notificaciones')?>
						</div> -->
						<div class="cnt-account inicio-top-wp">
							<i class="icon fa fa-whatsapp icon-size"></i> &nbsp;<?=dataConfig('telefono_whatsapp')?>
						</div>
					</span>
				</div>
				<!-- /.container -->
			</div>
			<!-- /.header-top -->
			<!-- ============================================== TOP MENU : END ============================================== -->
			<div class="main-header">
				<div class="container">
					<div class="row">	
						<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
							<!-- ============================================================= LOGO ============================================================= -->
							<div class="logo">
								<a href="./">
									<img src="<?=base_url('assets/frontend/images/logo.png')?>" alt="SERVITEX" class="img-responsive" style="max-width: 80%;">
								</a>
							</div>
							<!-- /.logo -->
							<!-- ============================================================= LOGO : END ============================================================= -->				
						</div>
						<!-- /.logo-holder -->
						<div class="col-xs-12 col-sm-12 col-md-7 top-header-text">
							<h3>merchandising - confección prendas publicitarias</h3>
							<!-- /.contact-row -->
							<!-- ============================================================= SEARCH AREA ============================================================= -->
							<!-- <div class="search-area">
								<form id="myFormSearch" action="frontend/productos/resultado" method="get">
									<div class="control-group">
										<input class="search-field" name="search" autocomplete="off" placeholder="merchandising - confección prendas publicitarias" />
										<a class="search-button" onclick="document.getElementById('myFormSearch').submit();"></a>  
									</div>
								</form>
							</div> -->
							<!-- /.search-area -->
							<!-- ============================================================= SEARCH AREA : END ============================================================= -->				
						</div>
						<!-- /.top-search-holder -->
						<div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row right-carrito">
							
							<div class="dropdown dropdown-cart backgroung-color-shopping">
								<!-- <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown"> -->
								<a href="cotizacion" class="" data-toggle="">
									<div class="items-cart-inner">
										<div class="total-price-basket">
											<div class="info-icons col-xs-4">
												<i class="fa fa-shopping-cart fa-3" aria-hidden="true"></i>
												<span class="count icono-carrito"><?=getCantidadItem()?></span>
											</div>
											<div class="col-xs-8">
												<span class="lbl item-color-shopping ">Mi Pedido</span>
											</div>
										</div>
										<!-- <div class="basket-item-count"><span class="count">2</span></div> -->
									</div>
								</a>
								<!-- <ul class="dropdown-menu">
									<li>
										<div class="cart-item product-summary">
											<div class="row">
												<div class="col-xs-4">
													<div class="image">
														<a href="detail.html"><img src="assets/frontend/images/cart.jpg" alt=""></a>
													</div>
												</div>
												<div class="col-xs-7">
													<h3 class="name"><a href="index.php?page-detail">Simple Product</a></h3>
													<div class="price">$600.00</div>
												</div>
												<div class="col-xs-1 action">
													<a href="#"><i class="fa fa-trash"></i></a>
												</div>
											</div>
										</div>
										<div class="clearfix"></div>
										<hr>
										<div class="clearfix cart-total">
											<div class="pull-right">
												<span class="text">Sub Total :</span><span class='price'>$600.00</span>
											</div>
											<div class="clearfix"></div>
											<a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>	
										</div>
									</li>
								</ul> -->
							</div>
						
						</div>
						<!-- /.top-cart-row -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container -->
			</div>
			<!-- /.main-header -->
			<?php $this->load->view("frontend/includes/menu", array()); ?>
		</header>
		