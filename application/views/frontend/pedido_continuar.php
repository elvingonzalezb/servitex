<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Inicio</a></li>
				<li class='active'>Carrito de compras</li>
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
						<table class="table table-bordered">
							<thead>
								<tr>
									<th class="cart-description item">Imagen</th>
									<th class="cart-product-name item">Nombre</th>
									<th class="cart-qty item">Cantidad</th>
									<th class="cart-qty item">Precio</th>
									<th class="cart-sub-total item">Subtotal</th>
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
											<span class="product-imel">CODIGO:<span><?=$item['item_codigo']?></span></span><br>
													<!-- <span class="product-color">COLOR:<span>White</span></span> -->
										</div>
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
									<td class="cart-product-sub-total"><span class="cart-sub-total-price"><?=dataConfig('moneda').number_format($item['item_precio'],2)?></span></td>
									<td class="cart-product-grand-total"><span class="cart-grand-total-price"><?=dataConfig('moneda').number_format($item['item_subtotal'],2)?></span></td>
								</tr>
							<?php 
							$total = $total + $item['item_subtotal'];
							endforeach ?>
								<tr>
									<td class="cart-product-grand-total" colspan="4"><span class="cart-grand-total-price pull-right"> TOTAL </span></td>
									<td class="cart-product-grand-total"><span class="cart-grand-total-price"><?=dataConfig('moneda').number_format($total,2)?></span></td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="5">
										<div class="shopping-cart-btn">
											<a href="<?=base_url('pedido')?>" class="btn btn-upper btn-primary outer-left-xs pull-left">Editar Pedido</a>
											<div class="col-md-8">
												<div  class="pull-right">
													<input style="display: inline-block; min-height: 0px !important;" type="checkbox" class="checkbox" name="tyc" id="tyc" >Debe aceptar los 
													<a href="terminos-y-condiciones" target="_blank">Terminos y Condiciones.</a>
												</div>
											</div>
											<button type="button" id='botonPagar' class="col-md-2 pull-right btn btn-upper btn-success pull-right outer-right-xs" disabled>Pagar</button>
										</div>
										<!-- /.shopping-cart-btn -->
									</td>
								</tr>
							</tfoot>
						</table>
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
<!-- /.body-content -->
<script src="https://checkout.culqi.com/v2/"></script>
<script>
	Culqi.publicKey = 'pk_test_Jwv4Fbkzu2MY14gO';
      Culqi.settings({
        title: 'New Cms',
        currency: 'PEN',
        order: '<?=$numpedido?>',
        description: 'Compra web',
        amount: <?= $total * 100 ?>
       });
       $('#botonPagar').on('click', function (e) {
            // Abre el formulario con las opciones de Culqi.configurar
            Culqi.open();
            e.preventDefault();
        });

// Recibimos Token del Culqi.js
	function culqi() {
		if (Culqi.token) {
			//console.log(Culqi);
			$.ajax({
				type: 'POST',
				url: 'pedido/enviar',
				datatype: 'json',
				data: { 
					token: Culqi.token.id, 
					total: <?= $total * 100 ?>,
					email: Culqi.token.email,
                    numpedido: '<?=$numpedido?>',
					installments: Culqi.token.metadata.installments 
				},
				/*datatype: 'json',*/
				beforeSend: function () {
					swal({
						title: "NEW CMS",
						text: "Espere mientras se procesa su compra por favor...",
						imageUrl: "assets/frontend/img/loader.gif",
						showConfirmButton: false
					});
				},
				success: function (data){
					if (data.tipo == 'success') {
						swal({
						  title: data.message,
						  //text: data.message,
						  html: true
						},function(){
							/**redireccionar al listado de sus compras.**/
							location.href = data.redirect;
							}
						);
						
					}
					if (data.tipo == 'error') {
						swal({
							title: "NEW CMS",
							text: data.message,
							imageUrl: "assets/frontend/img/loader.gif",
							showConfirmButton: true
						});
					}
					
				}
              });
          } else {
          	console.log(Culqi.error);
          }
        }
</script>