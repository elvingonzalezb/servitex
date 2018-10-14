<div class="breadcrumb">
	<!-- plantilla de banner propia -->
	<?php if($banner['visible']==1){?>
	<div style="background-image:url(files/secciones/<?=$banner['imagen']?>); width: 100%;left: 0;top: 0;height: 100%;"  class="banner-personalizados overlay-black-middle">
		<div class="container">
			<div class="div-head-personalizados">
				<h1 class="text-white h1-personalizados"><?=$banner['titulo']?></h1>
			</div>
		</div>
	</div>
	<?php }?>
</div>
<!-- /.breadcrumb -->
<div id="personalizados" class="body-content outer-top-bd">
	<div class="container">
		<div class="row  outer-bottom-vs">
			<div class="blog-page clearfix">
				<?php if (isset($personalizados) && !empty($personalizados)): ?>
				<div class="col-md-12">
					<h2>
						<center><?= $personalizados['nombre'] ?></center>
					</h2>
					<div class="per-desc">
						<p><?//= $personalizados['descripcion'] ?></p>
					</div>
					<?php foreach ($personalizados['fotos'] as $key1 => $value1): ?>
					<div class="col-md-3">
						<div class="blog-post  wow fadeInUp">
							<img class="img-responsive" src="files/galeria_fotos/<?= $value1['imagen'] ?>" alt="<?= $value1['nombre'] ?>">
							<h1><?= $value1['nombre'] ?></h1>
						</div>
					</div>
					<!-- fin col-md-4 -->  
					<?php endforeach ?>
				</div>
				<!-- fin col-md-12 -->    
				<?php endif ?>
				<?php if (isset($vendidos) && !empty($vendidos)): ?>
				<div class="col-md-12">
					<h2>
						<center><?= $vendidos['nombre'] ?></center>
					</h2>
					<div class="per-desc">
						<p><?= $vendidos['descripcion'] ?></p>
					</div>
					<?php foreach ($vendidos['fotos'] as $key2 => $value2): ?>
					<div class="col-md-3">
						<div class="blog-post  wow fadeInUp">
							<img class="img-responsive" src="files/galeria_fotos/<?= $value2['imagen'] ?>" alt="<?= $value2['nombre'] ?>">
							<h1><?= $value2['nombre'] ?></h1>
						</div>
					</div>
					<!-- fin col-md-4 -->  
					<?php endforeach ?>
				</div>
				<!-- fin col-md-12 -->    
				<?php endif ?>
				<?php if (isset($publicitarios) && !empty($publicitarios)): ?>
				<div class="col-md-12">
					<h2>
						<center><?= $publicitarios['nombre'] ?></center>
					</h2>
					<div class="per-desc">
						<p><?= $publicitarios['descripcion'] ?></p>
					</div>
					<?php foreach ($publicitarios['fotos'] as $key3 => $value3): ?>
					<div class="col-md-3">
						<div class="blog-post  wow fadeInUp">
							<img class="img-responsive" src="files/galeria_fotos/<?= $value3['imagen'] ?>" alt="<?= $value3['nombre'] ?>">
							<h1><?= $value3['nombre'] ?></h1>
						</div>
					</div>
					<!-- fin col-md-4 -->  
					<?php endforeach ?>
				</div>
				<!-- fin col-md-12 -->    
				<?php endif ?>
				<?php if (isset($promocionales) && !empty($promocionales)): ?>
				<div class="col-md-12">
					<h2>
						<center><?= $promocionales['nombre'] ?></center>
					</h2>
					<div class="per-desc">
						<p><?= $promocionales['descripcion'] ?></p>
					</div>
					<?php foreach ($promocionales['fotos'] as $key4 => $value4): ?>
					<div class="col-md-3">
						<div class="blog-post  wow fadeInUp">
							<img class="img-responsive" src="files/galeria_fotos/<?= $value4['imagen'] ?>" alt="<?= $value4['nombre'] ?>">
							<h1><?= $value4['nombre'] ?></h1>
						</div>
					</div>
					<!-- fin col-md-4 -->  
					<?php endforeach ?>
				</div>
				<!-- fin col-md-12 -->    
				<?php endif ?>
			</div>
			<!-- fin blog-page -->
			<section class="section owl-personalizados">
				<?php if (isset($novedades) && !empty($novedades)): ?>
				<h2>
					<center>Novedades</center>
				</h2>
				<div id="hero">
					<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
						<?php foreach ($novedades as $key5 => $value5): ?>
						<div class="item" style="background-image: url(files/galeria_fotos/<?= $value5['imagen'] ?>);">
							<div class="container-fluid">
								<div class="caption bg-color vertical-center text-left">
									<div class="big-text fadeInDown-1">
										<?//= $value5['nombre'] ?>
									</div>
								</div>
								<!-- /.caption -->
							</div>
							<!-- /.container-fluid -->
						</div>
						<?php endforeach ?>
						<!-- /.item -->
					</div>
					<!-- /.owl-carousel -->
				</div>
				<?php endif ?>
			</section>
		</div>
		<!-- fin row  outer-bottom-vs -->
	</div>
	<!-- fin container -->
</div>