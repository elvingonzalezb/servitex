<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="./">Inicio</a></li>
				<li><a href="clientes/mis-pedidos">Mis pedidos</a></li>
				<li class='active'>Detalle pedido</li>
			</ul>
		</div>
		<!-- /.breadcrumb-inner -->
	</div>
	<!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-bd">
	<div class="container" id="postCliente">
		<div class="sign-in-page inner-bottom-sm">
			<div class="row">
				<!-- create a new account -->
				<div class="col-md-12 col-sm-12 create-new-account">
					<h4 class="checkout-subtitle">MIS PEDIDOS</h4>
					<p class="text title-tag-line"></p>
					<div class="well">
						<div class="form-group">
							<label class="info-title" for="firstname">Codigo</label>
							<p>{codigo_pedido}</p>
						</div>
						<div class="form-group">
							<label class="info-title" for="firstname">Fecha de venta</label>
							<p>{fecha_venta}</p>
						</div>
						<!--<div class="form-group">
							<label class="info-title" for="firstname">Estado</label>
							<p>{estado}</p>
						</div>-->
						<div class="form-group">
							<label class="info-title" for="firstname">Total</label>
							<p><?=dataConfig('moneda')?>{total}</p>
						</div>
						<div class="table-responsive">
							<table class="table table-striped custab">
								<thead>
									<tr>
										<th>Imagen</th>
										<th>Producto</th>
										<th>Atributo</th>
										<th>Cant.</th>
										<th>Precio</th>
										<th>Subtotal</th>
									</tr>
								</thead>
								<?php if (isset($detalles) && ($detalles)>0): ?>
								{detalles}
									<tr>
										<td><img src="files/productos/thumbs/{imagen}" alt="{nombre}"></td>
										<td>{nombre}</td>
										<td>{atributo}</td>
										<td>{cantidad}</td>
										<td><?= dataConfig('moneda') ?>{precio}</td>
										<td><?= dataConfig('moneda') ?>{subtotal}</td>
									</tr>
								{/detalles}
								<?php endif ?>
							</table>
						</div>
						<!--end form -->
					</div>
				</div>
				<!-- create a new account -->     
			</div>
			<!-- /.row -->
		</div>
		<!-- /.sigin-in-->
	</div>
	<!-- /.container -->
</div>
<!-- /.body-content -->