 <div class="breadcrumb">
		 <!-- plantilla de banner -->
		 <?php if($seccion['visible']==1){?>
        <div  class="dez-bnr-inr overlay-black-middle" style="background-image:url(files/secciones/<?=$seccion['imagen']?>);">
            <!-- <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white h1-custom"><?php echo strtoupper($seccion['titulo']); ?></h1> 
                </div>
            </div> -->
        </div>
        <?php }?>
        <!-- cierre banner -->
		<div class="breadcrumb-inner">
			<div class="container">
				<ul class="list-inline list-unstyled">
					<li><a href="#">Inicio</a></li>
					<li class='active'>Nosotros</li>
				</ul>
			</div>
		</div><!-- /.breadcrumb-inner -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-bd">
	<div class="container">
		<div class="terms-conditions-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12 terms-conditions">
					<h2 class="titulonosotros"><?= $dataset['titulo']?></h2>
					<div class="inner-top-sm">
						<!-- <h3>Descripcion</h3> -->
						<p> <?= $dataset['descripcion']?> </p>
					</div>
				</div>			
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
	</div>
</div>