	<!-- ============================================================= FOOTER ============================================================= -->
		<footer id="footer" class="footer color-bg">
			
			<div class="footer-bottom inner-bottom-sm footer-suscripcion">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
								<!-- <div class="contact-info">
									<div class="footer-logo">
										<div class="logo">
											<a href="./">
												<img src="<?=base_url('assets/frontend/images/logo_blanco.png')?>" alt="">
											</a>
										</div>
									</div>
								</div> -->
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
									<div class="sidebar-widget-body outer-top-xs">
										<form role="form">
											<div class="input-group">
												<input type="email" name="correo" id="sp-email" class="form-control border-email" placeholder="Ingrese su mail">
												<span class="input-group-btn">
													<a href="javascript:fnSuscripcion();" id="btnsuscriptor" class="btn btn-primary border-suscripcion">Suscribete</a>
												</span>
											</div>
											<div id="msj-suscriptor"></div>
										</form>
									</div>
								</div>
						</div>

					</div>
				</div>
			</div>

			<div class="footer-bottom inner-bottom-sm padding-footer">
				<div class="container">
					<div class="row">

						<div class="col-xs-12 col-sm-12 col-md-6">
							<div class="contact-info">
								<div class="footer-logo">
									<!-- <div class="logo"> -->
										<a href="./">
											<img src="<?=base_url('assets/frontend/images/logo-footer.png')?>" alt="SERVITEX">
										</a>
									<!-- </div> -->
								</div>
								<div class="module-body m-t-20">
									<p class="about-us"> <?= dataConfig('texto_pie') ?> </p>
								</div>
								<div class="module-body m-t-20 txt-wp">
									<i class="icon fa fa-whatsapp icon-size"></i> &nbsp;<?=dataConfig('telefono_whatsapp')?>
								</div>
								<div class="contact-information">
									<div class="module-heading">
										<h4 class="module-title">SÍGUENOS</h4>
									</div>
									<div class="module-body m-t-20">
										<div class="social-icons" style="font-size:25px;">
											<a href="<?= dataConfig('enlace_facebook') ?>" class='active'><i class="icon fa fa-facebook" ></i></a>
											<a href="<?= dataConfig('enlace_twitter') ?>"><i class="icon fa fa-twitter"></i></a>
											<a href="<?= dataConfig('enlace_youtube') ?>"><i class="fa fa-youtube"></i></a>
											<a href="<?= dataConfig('enlace_instagram') ?>"><i class="fa fa-instagram"></i></a>
											<a href="<?= dataConfig('enlace_pinterest') ?>"><i class="icon fa fa-pinterest"></i></a>
										</div>
										<!-- /.social-icons -->
									</div>
									<!-- /.module-body -->
								</div>

							</div>
						</div>
						
						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="contact-timing">
								<div class="module-heading">
									<h4 class="module-title">MENU</h4>
								</div>
								<!-- /.module-heading -->
								<div class="module-body outer-top-xs">
									<div class="col-xs-12 col-sm-6 col-md-12">
										<ul>
											<li><a href="./">Inicio</a></li>
											<li><a href="nosotros">La empresa</a></li>
											<li><a href="productos/Merchandising">Merchandising</a></li>
											<li><a href="productos/Textiles">Textiles</a></li>
											<li><a href="ofertas">Ofertas</a></li>
											<li><a href="solo_servicios">Servicios</a></li>
											<li><a href="articulos">Artículos</a></li>
											<li><a href="contactenos">Contáctenos</a></li>
										</ul>
									</div>
									<!-- <div class="col-xs-6 col-sm-6 col-md-6">
										<p><a href="ofertas">Ofertas</a></p>
										<p><a href="preguntas-frecuentes">Preguntas Frecuentes</a></p>
										<p><a href="articulos">Artículos</a></p>
										<p><a href="contactenos">Contáctenos</a></p>
									</div> -->
								</div>
								<!-- /.module-body -->
							</div>
						</div>
						<?php //$getCategoriaDestacadas=getCategoriaDestacadas(); ?>
						<!-- <div class="col-xs-12 col-sm-6 col-md-3">
							<div class="contact-timing">
								<div class="module-heading">
									<h4 class="module-title">CATEGORÍAS DESTACADAS</h4>
								</div>
								<div class="module-body outer-top-xs">
									<div class="col-xs-12 col-sm-6 col-md-12">
										<ul>
										<?php //foreach ($getCategoriaDestacadas as $value1) {?>
											<li><a href="productos/<?//=$value1['url'].'-'.$value1['id']?>"><?//=$value1['nombre']?></a></li>
										<?php //}?>
										</ul>
									</div>
								</div>
							</div>
						</div> -->

						<div class="col-xs-12 col-sm-6 col-md-3">
							<!-- ============================================================= INFORMATION============================================================= -->
							<div class="contact-information">
								<div class="module-heading">
									<h4 class="module-title">CONTÁCTENOS</h4>
								</div>
								<!-- /.module-heading -->
								<div class="module-body outer-top-xs">
									<ul class="toggle-footer" style="">
										<li class="media">
											<div class="pull-left">
												<span class="icon fa-stack fa-lg">
												<i class="fa fa-circle fa-stack-2x"></i>
												<i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
												</span>
											</div>
											<div class="media-body">
												<p><?= dataConfig('direccion') ?></p>
											</div>
										</li>
										<li class="media">
											<div class="pull-left">
												<span class="icon fa-stack fa-lg">
												<i class="fa fa-circle fa-stack-2x"></i>
												<i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
												</span>
											</div>
											<div class="media-body">
												<p><?= dataConfig('telefono') ?><br><?= dataConfig('telefono_whatsapp') ?></p>
											</div>
										</li>
										<li class="media">
											<div class="pull-left">
												<span class="icon fa-stack fa-lg">
												<i class="fa fa-circle fa-stack-2x"></i>
												<i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
												</span>
											</div>
											<div class="media-body">
												<span>Contacto <?= dataConfig('correo_notificaciones') ?></span><br>
												<span>Venta: <?= dataConfig('correo_from') ?></span>
											</div>
										</li>
									</ul>
								</div>
								<!-- /.module-body -->
							</div>
							<!-- /.contact-timing -->
							<!-- ============================================================= INFORMATION : END ============================================================= -->            	
						</div>
							
						
						<!-- <div class="col-xs-12 col-sm-6 col-md-3">
							<div class="module-heading outer-bottom-xs">
								<h4 class="module-title">category</h4>
							</div>
							<div class="module-body">
								<ul class='list-unstyled'>
									<li><a href="#">Order History</a></li>
									<li><a href="#">Returns</a></li>
									<li><a href="#">Libero Sed rhoncus</a></li>
									<li><a href="#">Venenatis augue tellus</a></li>
									<li><a href="#">My Vouchers</a></li>
								</ul>
							</div>
						</div> -->
						<!-- /.col -->
						<!-- <div class="col-xs-12 col-sm-6 col-md-3">
							<div class="module-heading outer-bottom-xs">
								<h4 class="module-title">my account</h4>
							</div>
							<div class="module-body">
								<ul class='list-unstyled'>
									<li><a href="#">My Account</a></li>
									<li><a href="#">Customer Service</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Site Map</a></li>
									<li><a href="#">Search Terms</a></li>
								</ul>
							</div>
						</div> -->
						<!-- /.col -->
						<!-- <div class="col-xs-12 col-sm-6 col-md-3">
							<div class="module-heading outer-bottom-xs">
								<h4 class="module-title">NUESTRAS CATEGORÍAS</h4>
							</div>
							<div class="module-body">
								<ul class='list-unstyled'>
								{categorias}
									<li><a href="<?=base_url('productos/')?>{url}-{id}">{nombre}</a></li>
								{/categorias}
								</ul>
							</div>
						</div> -->
						<!-- /.col -->
						<!-- <div class="col-xs-12 col-sm-6 col-md-3">
							<div class="module-heading outer-bottom-xs">
								<h4 class="module-title">help & support</h4>
							</div>
							<div class="module-body">
								<ul class='list-unstyled'>
									<li><a href="#">Knowledgebase</a></li>
									<li><a href="#">Terms of Use</a></li>
									<li><a href="#">Contact Support</a></li>
									<li><a href="#">Marketplace Blog</a></li>
									<li><a href="#">About Unicase</a></li>
								</ul>
							</div>
						</div> -->
					</div>
				</div>
			</div>

			<div class="copyright-bar">
				<div class="container">
					<div class="col-xs-12 col-sm-6 no-padding">
						<div class="copyright">
							<?= dataConfig('pie_pagina')?>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 no-padding">
						<div class="clearfix payment-methods">
							<ul>
								<li>Desarrollado por Ajax Perú</li>
								<!-- <li><img src="assets/frontend/images/payments/2.png" alt=""></li>
								<li><img src="assets/frontend/images/payments/3.png" alt=""></li>
								<li><img src="assets/frontend/images/payments/4.png" alt=""></li>
								<li><img src="assets/frontend/images/payments/5.png" alt=""></li> -->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- ============================================================= FOOTER : END============================================================= -->
		<!-- JavaScripts placed at the end of the document so the pages load faster -->
		
		<script src="assets/frontend/js/bootstrap.min.js"></script>
		<script src="assets/frontend/js/bootstrap-hover-dropdown.min.js"></script>
		<script src="assets/frontend/js/owl.carousel.min.js"></script>
		<script src="assets/frontend/js/jquery.validate.min.js"></script>
		<script src="assets/frontend/js/echo.min.js"></script>
		<script src="assets/frontend/js/jquery.easing-1.3.min.js"></script>
		<script src="assets/frontend/js/bootstrap-slider.min.js"></script>
		<script src="assets/frontend/js/jquery.rateit.min.js"></script>
		<script type="text/javascript" src="assets/frontend/js/lightbox.min.js"></script>
		<script src="assets/frontend/js/bootstrap-select.min.js"></script>
		<script src="assets/frontend/js/wow.min.js"></script>
		<script src="assets/frontend/js/scripts.js"></script>
		<!--  fancybox-->
		<!-- <script src="assets/frontend/js/jquery.fancybox.min.js"></script> -->
		
		<!--Nuestras validaciones y funciones-->
		<script src="assets/frontend/js/frontend-script.js"></script>
		<script src="assets/frontend/js/validation.js"></script>
		<!-- For demo purposes – can be removed on production -->
		<script src="assets/frontend/switchstylesheet/switchstylesheet.js"></script>

		  	<!-- SWEETALERT.JS -->
 			 <script src="assets/frontend/plugins/sweetalert/js/sweetalert.min.js"></script>
		<script>
			$(document).ready(function(){ 
				$(".changecolor").switchstylesheet( { seperator:"color"} );
				$('.show-theme-options').click(function(){
					$(this).parent().toggleClass('open');
					return false;
				});
			});
			
			$(window).bind("load", function() {
			   $('.show-theme-options').delay(2000).trigger('click');
			});


			

		</script>
		<!-- For demo purposes – can be removed on production : End -->

		<script src="assets/frontend/plugins/slick/slick.min.js"></script>
		<script src="assets/frontend/plugins/elevatezoom/jquery.elevatezoom.js"></script>
		<script src="assets/frontend/plugins/imagesloaded/imagesloaded.pkgd.min.js"></script>
		<!-- Magnific Popup core JS file --> 
		<script src="assets/frontend/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>

		<script src="assets/frontend/js/thumbs-products.js"></script>

	</body>
</html>
<?  ?>