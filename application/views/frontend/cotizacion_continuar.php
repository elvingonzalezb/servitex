<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Cotizacion</li>
			</ul>
		</div>
		<!-- /.breadcrumb-inner -->
	</div>
	<!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-md-12 col-sm-12 shopping-cart-table ">
					<div class="table-responsive">
						<form method="post" action="frontend/cotizaciones/enviar">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="cart-description item">Imagen</th>
										<th class="cart-product-name item">Nombre</th>
										<th class="cart-qty item">Cantidad</th>
									</tr>
								</thead>
								<!-- /thead -->
								<tbody>
								<?php 
								$total = 0;
								foreach ($pedido as $key => $item): ?>
									<tr>
										<td class="cart-image">
											<a class="entry-thumbnail" href="javascript:void(0)">
											<img src="<?=base_url('files/productos/thumbs/'); ?><?=$item['item_imagen']?>" alt="">
											</a>
										</td>
										<td class="cart-product-name-info">
											<h4 class='cart-product-description'><a href="javascript:void(0)"><?=$item['item_nombre']?></a></h4>
											<div class="row">
												<!-- <div class="col-sm-4">
													<div class="rating rateit-small"></div>
													</div> -->
												<!-- <div class="col-sm-8">
													<div class="reviews">
														(06 Reviews)
													</div>
													</div> -->
											</div>
											<!-- /.row -->
											<div class="cart-product-info">
											<?php $atributos = explode(',',$item['item_atributo_nombre'])?>
											<?php foreach ($atributos as $key => $atributo): ?>
												<?php if (strstr($atributo, '#') && strlen(trim($atributo))==7): ?>
													<span>COLOR: <i style="background-color:<?php echo $atributo?>"> &nbsp;&nbsp;&nbsp;&nbsp;</i></span><br>
												<?php else: ?>
												<span class="product-color"><?=$atributo?></span><br>	
												<?php endif ?>
											<?php endforeach ?>
											</div>
										</td>
										<td class="cart-product-quantity">
											<div class="quant-input"><?=$item['item_cantidad']?></div>
										</td>
									</tr>
								<?php 
								endforeach ?>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="5">
											<div class="shopping-cart-btn">
												<a href="<?=base_url('cotizacion')?>" class="btn btn-upper btn-primary outer-left-xs pull-left">Editar Pedido</a>
												<div class="col-md-8">
													<div  class="pull-right">
													</div>
												</div>
												<button type="submit" class="col-md-2 pull-right btn btn-upper btn-success pull-right outer-right-xs">Cotizar</button>
											</div>
											<!-- /.shopping-cart-btn -->
										</td>
									</tr>
								</tfoot>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
		<!-- /.logo-slider -->
		<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	
	</div>
	<!-- /.container -->
</div>