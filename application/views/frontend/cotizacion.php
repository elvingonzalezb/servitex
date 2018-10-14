<?php  ?>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Cotización</li>
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
					<div class="table-responsive post_text_area">
					<?php if (count($carrito)>0): ?>
						<form action="<?=base_url('cotizacion/continuar')?>" method="post" id="form-continuar-compra">
							<div class="" id="list_car">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th class="cart-description item">Imagen</th>
											<th class="cart-product-name item">Nombre</th>
											<th class="cart-qty item">Cantidad</th>
											<th class="cart-romove item"></th>
										</tr>
									</thead>
									<!-- /thead -->
									
									<tbody>
									
									
									<?php 
									$total = 0 ;
									foreach ($carrito as $key => $item): ?>
										<tr>
											<td class="cart-image">
												<a class="entry-thumbnail" href="javascript:void(0)">
												<img src="<?=base_url('files/productos/thumbs/').$item['item_imagen']; ?>" alt="">
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
													<span class="product-imel">CODIGO:<span><?=$item['item_codigo']?></span></span><br>
													<!-- <span class="product-color">COLOR:<span>White</span></span> -->
												</div>
												<div class="cart-product-info">
													<?php $atributos = explode(',',$item['item_atributo_nombre'])?>
													<?php foreach ($atributos as $atributo): ?>
														<?php if (strstr($atributo, '#') && strlen(trim($atributo))==7): ?>
															<span>COLOR: <i style="background-color:<?php echo $atributo?>"> &nbsp;&nbsp;&nbsp;&nbsp;</i></span><br>
														<?php else: ?>
														<span class="product-color"><?=$atributo?></span><br>	
														<?php endif ?>
													<?php endforeach ?>
												</div>
											</td>
											<td class="cart-product-quantity">
												<input type="hidden" value="<?=$item['item_id']?>" id="prodID_<?=$key?>">
												<input type="hidden" value="<?=$item['item_atributo_id']?>" id="atributo_<?=$key?>">
												<input type="text" size="1" title="Cantidad" value="<?=$item['item_cantidad']?>" id="cant_<?=$key?>">
												<a title="Actualizar cantidad" href="javascript:updateCantidad('<?=$key?>')"><i class="btn fa fa-refresh"></i></a>
											</td>
											<td class="romove-item"><a href="javascript:deleteItem('<?=$item['item_carroID']?>')" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
										</tr>
									<?php endforeach ?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="7">
												<div class="shopping-cart-btn">
													<span class="">
													<a href="<?=base_url('productos')?>" class="btn btn-upper btn-primary outer-left-xs">Seguir comprando</a>
													<button type="submit" id='continuar_compra' class="btn btn-upper btn-primary pull-right outer-right-xs">Continuar</button>
													</span>
												</div>
												<!-- /.shopping-cart-btn -->
											</td>
										</tr>
									</tfoot>
									
								</table>
							</div>
						</form>
						<?php else: ?>
							<p>Su carrito está vacío. Dirígete a la sección de nuestros productos para realizar una cotización dando click <a href="productos">aquí</a></p>
						<?php endif ?>
					</div>
				</div>
				<!-- <div class="col-md-4 col-sm-12 estimate-ship-tax">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>
									<span class="estimate-title">Estimate shipping and tax</span>
									<p>Enter your destination to get shipping and tax.</p>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="form-group">
										<label class="info-title control-label">Country <span>*</span></label>
										<select class="form-control unicase-form-control selectpicker">
											<option>--Select options--</option>
											<option>India</option>
											<option>SriLanka</option>
											<option>united kingdom</option>
											<option>saudi arabia</option>
											<option>united arab emirates</option>
										</select>
									</div>
									<div class="form-group">
										<label class="info-title control-label">State/Province <span>*</span></label>
										<select class="form-control unicase-form-control selectpicker">
											<option>--Select options--</option>
											<option>TamilNadu</option>
											<option>Kerala</option>
											<option>Andhra Pradesh</option>
											<option>Karnataka</option>
											<option>Madhya Pradesh</option>
										</select>
									</div>
									<div class="form-group">
										<label class="info-title control-label">Zip/Postal Code</label>
										<input type="text" class="form-control unicase-form-control text-input" placeholder="">
									</div>
									<div class="pull-right">
										<button type="submit" class="btn-upper btn btn-primary">GET A QOUTE</button>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-md-4 col-sm-12 estimate-ship-tax">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>
									<span class="estimate-title">Discount Code</span>
									<p>Enter your coupon code if you have one..</p>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="form-group">
										<input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
									</div>
									<div class="clearfix pull-right">
										<button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-md-4 col-sm-12 cart-shopping-total">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>
									<div class="cart-sub-total">
										Subtotal<span class="inner-left-md">$600.00</span>
									</div>
									<div class="cart-grand-total">
										Grand Total<span class="inner-left-md">$600.00</span>
									</div>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="cart-checkout-btn pull-right">
										<button type="submit" class="btn btn-primary">PROCCED TO CHEKOUT</button>
										<span class="">Checkout with multiples address!</span>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div> -->
			</div>
		</div>
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
		<!-- <div id="brands-carousel" class="logo-slider wow fadeInUp">
			<h3 class="section-title">Our Brands</h3>
			<div class="logo-slider-inner">
				<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
					<div class="item m-t-15">
						<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
						</a>	
					</div>
					<div class="item m-t-10">
						<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
						</a>	
					</div>
					<div class="item">
						<a href="#" class="image">
						<img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
						</a>	
					</div>
					<div class="item">
						<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
						</a>	
					</div>
					<div class="item">
						<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
						</a>	
					</div>
					<div class="item">
						<a href="#" class="image">
						<img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
						</a>	
					</div>
					<div class="item">
						<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
						</a>	
					</div>
					<div class="item">
						<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
						</a>	
					</div>
					<div class="item">
						<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
						</a>	
					</div>
					<div class="item">
						<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
						</a>	
					</div>
				</div>
			</div>
		</div> -->
		<!-- /.logo-slider -->
		<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	
	</div>
	<!-- /.container -->
</div>
<!-- /.body-content -->