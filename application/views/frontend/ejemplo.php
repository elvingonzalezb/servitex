<section id="main-container" class="main-container">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 col-md-3 col-sm-12">
					<div class="sidebar sidebar-left">
						<div class="widget">
							<ul class="nav nav-tabs nav-stacked service-menu">
									{servicios}
										<li><a href="{url}">{nombre}</a></li>	
									{/servicios}
							</ul>
						</div><!-- Widget end -->

					</div><!-- Sidebar end -->
				</div><!-- Sidebar Col end -->
				<div class="col-lg-9 col-md-9 col-sm-12">
					<div class="content-inner-page">
						
						<h2 class="border-title border-left"><?=$dataset_por_id['nombre']?></h2>

						<div class="row">
							<div class="col-md-6">
								<p class="lead"><?=$dataset_por_id['descripcion']?></p>
							</div><!-- col end -->
							<div id="owl-thmubs" class="slide-cont col-md-6">
								<ul id="imageGallery">
									<?php foreach ($dataset_por_id['imagenes'] as $key => $value): ?>
									<li data-thumb="files/galeria_fotos/thumbs/<?=$value['imagen']; ?>">
										<a href="files/galeria_fotos/<?=$value['imagen']; ?>" data-fancybox="images">
											<img class="img-responsive" src="files/galeria_fotos/medianas/<?=$value['imagen']; ?>" />
										</a>
									</li>	
									<?php endforeach ?>
								</ul>	
								
							
								
								
							</div><!-- col end -->
						</div><!-- 1st row end-->

						<div class="gap-40"></div>

					</div><!-- Content inner end -->
				</div><!-- Content Col end -->


			</div><!-- Main row end -->
		</div><!-- Conatiner end -->
	</section><!-- Main container end -->