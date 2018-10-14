<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Inicio</a></li>
				<li class='active'>Detalle del Articulo</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">
					<div class="blog-post wow fadeInUp">
	<img class="img-responsive" src="files/articulos/<?=$dataset['imagen']; ?>" alt="">
	<h1><?= $dataset['nombre'] ?></h1>
	<span class="author"><?=$dataset['autor']?></span>
	<?php $comentario=(($dataset['num_comentarios']<>1) ? 'comentarios':'comentario') ?>
	<span class="review"><?=$dataset['num_comentarios']?> <?= $comentario?></span>
	<span class="date-time"><?=date_format(date_create($dataset['creado']), 'Y-m-d')?></span>
	<p><?=$dataset['descripcion']?></p>
	
	<div class="social-media">
		<span>Compartir post:</span>
		<ul class="list-inline">
			<li><a href="<?=CompartirRedes('facebook',$articulo['url_share']);?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
			<li><a href="<?=CompartirRedes('twitter',$articulo['url_share']);?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
			<li><a href="<?= dataConfig('enlace_youtube') ?>"><i class="fa fa-youtube"></i></a></li>
			<li><a href="<?=CompartirRedes('google+',$articulo['url_share']);?>" target="_blank"><i class="fa fa-google"></i></a></li>
			<li><a href="<?= dataConfig('enlace_instagram') ?>"><i class="fa fa-instagram"></i></a></li>
			<li><a href="<?=CompartirRedes('pinterest',$articulo['url_share']);?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
		</ul>
	</div>

	
</div>
<!-- <div class="blog-post-author-details wow fadeInUp">
	<div class="row">
		<div class="col-md-2">
			<img src="assets/images/blog-post/author.png" alt="Responsive image" class="img-circle img-responsive">
		</div>
		<div class="col-md-10">
			<h4><?=$dataset['autor']?></h4>
			<div class="btn-group author-social-network pull-right">
				<span>Follow me on</span>
			    <button type="button" class="dropdown-toggle" data-toggle="dropdown">
			    	<i class="twitter-icon fa fa-twitter"></i>
			    	<span class="caret"></span>
			    </button>
			    <ul class="dropdown-menu" role="menu">
			    	<li><a href="#"><i class="icon fa fa-facebook"></i>Facebook</a></li>
			    	<li><a href="#"><i class="icon fa fa-linkedin"></i>Linkedin</a></li>
			    	<li><a href=""><i class="icon fa fa-pinterest"></i>Pinterst</a></li>
			    	<li><a href=""><i class="icon fa fa-rss"></i>RSS</a></li>
			    </ul>
			</div>
			<span class="author-job">Web Designer</span>
			<p>Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibul um quis convallis lorem, ac volutpat magna. Suspendisse potenti.</p>
		</div>
	</div>
</div> -->
<hr>
<?php if($dataset['num_comentarios']!=0) {?>
<!-- Traemos los comentarios si hay comentario -->
<div class="blog-review wow fadeInUp">
	<div class="row">

		<div class="col-md-12">
			<h3 class="title-review-comments"><?=$dataset['num_comentarios']?> <?= $comentario?></h3>
		</div>
		
		<?php foreach ($dataset['comentarios'] as $key => $value_comentario) {  ?>
		<div class="col-md-2 col-sm-2">
		<!-- imagen de la persona que realiza comentario -->
			<img src="<?=base_url('assets/frontend/images/blog-post/c1.jpg')?>" alt="Responsive image" class="img-rounded img-responsive">
		</div>
		<!-- operacion ternaria para decidir el estilo segun la platilla cuando hay respuesta del admin se dara otro estilo -->
		<?php $class_comments = (!empty($value_comentario['respuesta']) ? 'col-md-10 col-sm-10 blog-comments outer-bottom-xs': 'col-md-10 col-sm-10') ?>

		<div class="<?=$class_comments?>">
			<?php //$class_comments_botton = (($dataset['num_comentarios']>$key+1) ? 'blog-sub-comments inner-bottom-xs': '')?>

			<?php if(!empty($value_comentario['respuesta'])){?>
				<div class="blog-comments inner-bottom-xs">
					<h4><?=$value_comentario['nombre']?></h4>
					<span class="review-action pull-right">
						<p><?=date_format(date_create($value_comentario['creado']), 'd-m-Y')?></p>
					</span>
					<p><?=$value_comentario['comentario']?><</p>
				</div>

				<div class="blog-comments-responce outer-top-xs">
					<div class="row">
						<div class="col-md-2 col-sm-2">
							<img src="<?=base_url('assets/frontend/images/blog-post/c1.jpg')?>" alt="Responsive image" class="img-rounded img-responsive">
						</div>
						<div class="col-md-10 col-sm-10 outer-bottom-xs">
							<div class="">
								<h4><?=$value_comentario['autor_respuesta']?></h4>
								<span class="review-action pull-right">
								<p><?=date_format(date_create($value_comentario['modificado']), 'd-m-Y')?></p>
								</span>
								<p><?=$value_comentario['respuesta']?></p>
							</div>
						</div>

					</div>
				</div>

			<?php }else{?>
				<!-- no hay respuesta se traen solo ciertos datos -->
				<div class="blog-comments inner-bottom-xs outer-bottom-xs">
					<h4><?=$value_comentario['nombre']?></h4>
					<span class="review-action pull-right">
						<p><?=date_format(date_create($value_comentario['creado']), 'd-m-Y')?></p>
					</span>
					<p><?=$value_comentario['comentario']?></p>
				</div>
				<?php }?>

		</div>
			<?php } ?>

	</div>
</div>	
<?php } else {?>
<!-- si no hay comentarios  -->
<div class="blog-review wow fadeInUp">
	<div class="row">
		<div class="col-md-12">
			<h3 class="title-review-comments"><?=$dataset['num_comentarios']?> <?= $comentario?></h3>
		</div>
	</div>
</div>
<hr>
<?php }?>		
	
<div class="blog-write-comment m-t-20">
	<div class="row">
		<div class="col-md-12">
			<h4>Dejar un comentario</h4>
		</div>
		<?= validation_errors() ?>
		<?=$this->session->flashdata('message')?>
		<form class="register-form" role="form" action="frontend/articulos/enviarComentario" method="post" enctype="multipart/form-data" id="formArticulo">
			
			<div class="col-md-4">
				<div class="form-group">
				   <label class="info-title" for="exampleInputName"> Nombre <span>*</span></label>
				   <input type="text" name="nombre" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="Nombre" >
				</div>
			</div>

			<div class="col-md-4">
                <div class="form-group">
	                <label class="info-title" for="exampleInputEmail1">Direcciòn de email<span>*</span></label>
	                <input type="email" class="form-control unicase-form-control text-input" name="correo" id="exampleInputEmail1" placeholder="admin@unicase.com">
                </div>
            </div>

			<div class="col-md-12">
					<div class="form-group">
				    <label class="info-title" for="exampleInputComments">Comentario <span>*</span></label>
				    <textarea class="form-control unicase-form-control" name="comentario" id="exampleInputComments"></textarea>
				  </div>
			</div>
			<div>
				<input type="hidden" name="idioma_id" value="1">
				<input type="hidden" name="articulo_id" id="idArt<?=$dataset['id']?>" value="<?=$dataset['id']?>">
				 <input type="hidden" name="url" value="<?=$dataset['url']?>">
			 </div>
			<div class="col-md-12 outer-bottom-small m-t-20">
				<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Enviar comentario</button>
			</div>
		</form>	
	</div>
</div>
				</div>
				<div class="col-md-3 sidebar top-articulos">
					<div class="sidebar-module-container">
						<div class="search-area outer-bottom-small">
    <!-- <form>
        <div class="control-group">
            <input placeholder="Type to search" class="search-field">
            <a href="#" class="search-button"></a>   
        </div>
    </form> -->
</div>						<!-- ==============================================CATEGORY============================================== -->
<!-- <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
	<h3 class="section-title">Category</h3>
	<div class="sidebar-widget-body m-t-10">
		<div class="accordion">
	    	<div class="accordion-group">
	            <div class="accordion-heading">
	                <a href="#collapseOne" data-toggle="collapse" class="accordion-toggle collapsed">
	                   Camera
	                </a>
	            </div>
	            <div class="accordion-body collapse" id="collapseOne" style="height: 0px;">
	                <div class="accordion-inner">
	                    <ul>
	                        <li><a href="#">gaming</a></li>
	                        <li><a href="#">office</a></li>
	                        <li><a href="#">kids</a></li>
	                        <li><a href="#">for women</a></li>
	                    </ul>
	                </div>
	            </div>
	        </div>

	        <div class="accordion-group">
	            <div class="accordion-heading">
	                <a href="#collapseTwo" data-toggle="collapse" class="accordion-toggle collapsed">
	                  Desktops
	                </a>
	            </div>
	            <div class="accordion-body collapse" id="collapseTwo" style="height: 0px;">
	                <div class="accordion-inner">
	                    <ul>
	                        <li><a href="#">gaming</a></li>
	                        <li><a href="#">office</a></li>
	                        <li><a href="#">kids</a></li>
	                        <li><a href="#">for women</a></li>
	                    </ul>
	                </div>
	            </div>
	        </div>

	        <div class="accordion-group">
	            <div class="accordion-heading">
	                <a href="#collapseThree" data-toggle="collapse" class="accordion-toggle collapsed">
	                   Pants
	                </a>
	            </div>
	            <div class="accordion-body collapse" id="collapseThree" style="height: 0px;">
	                <div class="accordion-inner">
	                    <ul>
	                        <li><a href="#">gaming</a></li>
	                        <li><a href="#">office</a></li>
	                        <li><a href="#">kids</a></li>
	                        <li><a href="#">for women</a></li>
	                    </ul>
	                </div>
	            </div>/.accordion-body
	        </div>

	        <div class="accordion-group">
	            <div class="accordion-heading">
	                <a href="#collapseFour" data-toggle="collapse" class="accordion-toggle collapsed">
	                   Bags
	                </a>
	            </div>
	            <div class="accordion-body collapse" id="collapseFour" style="height: 0px;">
	                <div class="accordion-inner">
	                    <ul>
	                        <li><a href="#">gaming</a></li>
	                        <li><a href="#">office</a></li>
	                        <li><a href="#">kids</a></li>
	                        <li><a href="#">for women</a></li>
	                    </ul>
	                </div>
	            </div>
	        </div>

	        <div class="accordion-group">
	            <div class="accordion-heading">
	                <a href="#collapseFive" data-toggle="collapse" class="accordion-toggle collapsed">
	                  Hats
	                </a>
	            </div>
	            <div class="accordion-body collapse" id="collapseFive" style="height: 0px;">
	                <div class="accordion-inner">
	                    <ul>
	                        <li><a href="#">gaming</a></li>
	                        <li><a href="#">office</a></li>
	                        <li><a href="#">kids</a></li>
	                        <li><a href="#">for women</a></li>
	                    </ul>
	                </div>
	            </div>
	        </div>

	        <div class="accordion-group">
	            <div class="accordion-heading">
	                <a href="#collapseSix" data-toggle="collapse" class="accordion-toggle collapsed">
	                 Accessories
	                </a>
	            </div>
	            <div class="accordion-body collapse" id="collapseSix" style="height: 0px;">
	                <div class="accordion-inner">
	                    <ul>
	                        <li><a href="#">gaming</a></li>
	                        <li><a href="#">office</a></li>
	                        <li><a href="#">kids</a></li>
	                        <li><a href="#">for women</a></li>
	                    </ul>
	                </div>
	            </div>
	        </div>

	    </div>
	</div>
</div> -->
	<!-- ============================================== CATEGORY : END ============================================== -->						
<!-- <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
    <h3 class="section-title">tab widget</h3>
	<ul class="nav nav-tabs">
	  <li class="active"><a href="#popular" data-toggle="tab">popular post</a></li>
	  <li><a href="#recent" data-toggle="tab">recent post</a></li>
	</ul>
	<div class="tab-content">
	   <div class="tab-pane active m-t-20" id="popular">
		<div class="blog-post inner-bottom-30 " >
			<img class="img-responsive" src="assets/images/blog-post/sm1.jpg" alt="">
			<h4><a href="blog-details.html">Simple Blog Post</a></h4>
			<span class="author">Michael</span>
			<span class="review">6 Comments</span>
			<span class="date-time">24/06/14</span>
			<p>Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros.</p>
			
		</div>
		<div class="blog-post" >
			<img class="img-responsive" src="assets/images/blog-post/sm2.jpg" alt="">
			<h4><a href="blog-details.html">Simple Blog Post</a></h4>
			<span class="author">Michael</span>
			<span class="review">6 Comments</span>
			<span class="date-time">24/06/14</span>
			<p>Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros.</p>
			
		</div>
	</div>

	<div class="tab-pane m-t-20" id="recent">
		<div class="blog-post inner-bottom-30" >
			<img class="img-responsive" src="assets/images/blog-post/sm2.jpg" alt="">
			<h4><a href="blog-details.html">Simple Blog Post</a></h4>
			<span class="author">Michael</span>
			<span class="review">6 Comments</span>
			<span class="date-time">24/06/14</span>
			<p>Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros.</p>
			
		</div>
		<div class="blog-post">
			<img class="img-responsive" src="assets/images/blog-post/sm1.jpg" alt="">
			<h4><a href="blog-details.html">Simple Blog Post</a></h4>
			<span class="author">Michael</span>
			<span class="review">6 Comments</span>
			<span class="date-time">24/06/14</span>
			<p>Integer sit amet commodo eros, sed dictum ipsum. Integer sit amet commodo eros.</p>
			
		</div>
	</div>
	</div>
</div> -->
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

			<!-- <aside class="col-md-4 sidebar">
				<div class="sidebox widget">
					<h3 class="widget-title">Articulos Recientes</h3>
					<ul class="post-list">
					<?php foreach ($recientes as $key => $value) {  ?>
						<li>
							<div class="icon-overlay"><a href="articulos/<?=$value['url'].'-'.$value['id']?>"><i class="fa fa-link" aria-hidden="true"></i><img src="files/articulos/<?=$value['imagen']?>" alt="" /> </a> </div>
							<div class="meta">
							<h5><a href="articulos/<?=$value['url'].'-'.$value['id']?>"><?=$value['nombre']?></a></h5>
							<em><span class="date"><a  class="link-effect"><?=date_format(date_create($value['creado']), 'd-m-Y')?></a></span></em>
							</div>
						</li>
					<?php } ?>
					</ul>
				</div>
			</aside> -->


			<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
						<div class="more-info-tab clearfix ">
							<h3 class="new-product-title pull-left">Articulos Recientes</h3>
						</div>
						<div class="tab-content outer-top-xs">
							<div class="tab-pane in active" id="all">
								<div class="product-slider">
									<!-- <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="1"> -->
										{recientes}
										<div class="item item-carousel space-services">
											<div class="products">
												<div class="product">
													<div class="product-image">
														<div class="image front-img">
															<a href="articulos/{url}-{id}"><img class="img-responsive" src="files/articulos/{imagen}" data-echo="files/articulos/{imagen}" alt="{nombre}"></a>
														</div>			
														<!-- <div class="sale-offer-tag"><span<br>Oferta</span></div> -->
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
									<!-- </div> -->
								</div>
							</div>
						</div>
			</div>

<!-- ============================================== PRODUCT TAGS : END ============================================== -->					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
function dias_transcurridos($fecha,$fecha_f)
{
	$fecha_i = date_format(date_create($fecha), 'Y-m-d');
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
}
?>