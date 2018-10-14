
<div class="header-nav animate-dropdown">
	<div class="container">
		<div class="yamm navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
			</div>
			<div class="nav-bg-class">
				<div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
					<div class="nav-outer">
						<ul class="nav navbar-nav">
							
							<li class="dropdown <?php if( ! empty($seo['seccion']) && 'inicio'== $seo['seccion']){ echo "active"; }?>">
								<a href="inicio">INICIO</a>
							</li>

							<li class="dropdown <?php if( ! empty($seo['seccion']) && 'nosotros'== $seo['seccion']){ echo "active"; }?>">
								<a href="nosotros">LA EMPRESA</a>
							</li>

							<!-- <li class="dropdown <?php if( ! empty($seo['seccion']) && 'merchandising'== $seo['seccion']){ echo "active"; }?>">
								<a href="productos/merchandising" >MERCHANDISING</a>								
							</li> -->
							<?php $getcategoriasM=getcategoriasMT(2); ?>
							<?php if($getcategoriasM['estado']=='1'){ ?>
							<li class="dropdown" id="m_merchandising">
								<!-- <a href="productos/merchandising" ><?=$getcategoriasM['nombre']?></a> -->
								<a href="productos/<?=$getcategoriasM['nombre']?>" ><?=$getcategoriasM['nombre']?></a>	
							</li>
							<?php }else{ echo '';}?>
							<!-- <li class="dropdown" id="m_textiles">
								<a href="productos/textiles" id="m_textiles">TEXTILES</a>								
							</li> -->
							<?php $getcategoriasT=getcategoriasMT(3); ?>
							<?php if($getcategoriasT['estado']=='1'){ ?>
							<li class="dropdown" id="m_textiles">
								<!-- <a href="productos/textiles" ><?=$getcategoriasT['nombre']?></a>	 -->
								<a href="productos/<?=$getcategoriasT['nombre']?>" ><?=$getcategoriasT['nombre']?></a>
							</li>
							<?php }else{ echo '';}?>
							<!-- <li class="dropdown <?php if( ! empty($seo['seccion']) && 'productos'== $seo['seccion']){ echo "active"; }?>">
								<a href="productos" >PRODUCTOS</a>								
							</li> -->

							<li class="dropdown <?php if(! empty($seo['seccion']) && 'ofertas'== $seo['seccion']){ echo "active"; }?>">
								<a href="ofertas">OFERTAS</a>
							</li>
							
							<li class="dropdown <?php if( ! empty($seo['seccion']) && 'solo_servicios'== $seo['seccion']){ echo "active"; }?>">
								<a href="solo_servicios" id="m_solo_servicios">SERVICIOS</a>
							</li>

							<!-- <li class="dropdown <?php if( ! empty($seo['seccion']) && 'articulos'== $seo['seccion']){ echo "active"; }?>">
								<a href="articulos">ARTÍCULOS</a>
							</li> -->
							<li class="dropdown <?php if( ! empty($seo['seccion']) && 'galeria_albumes_fotos'== $seo['seccion']){ echo "active"; }?>">
								<a href="regalos-personalizados">REGALOS PERSONALIZADOS</a>
							</li>

							<li class="dropdown <?php if( ! empty($seo['seccion']) && 'contactenos'== $seo['seccion']){ echo "active"; }?>">
								<a href="contactenos">CONTÁCTENOS</a>
							</li>
							
						</ul>
						<!-- /.navbar-nav -->
						<div class="clearfix"></div>
					</div>
					<!-- /.nav-outer -->
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.nav-bg-class -->
		</div>
		<!-- /.navbar-default -->
	</div>
	<!-- /.container-class -->
</div>
<!-- /.header-nav -->