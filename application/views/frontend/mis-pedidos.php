<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="./">Inicio</a></li>
				<li><a href="clientes/mi-cuenta">Mi cuenta</a></li>
				<li class='active'>Mis Pedidos</li>
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
						<table class="table table-striped custab">
							<thead>
								<tr>
									<th>Codigo</th>
									<!--<th>Estado</th>-->
									<th>Total</th>
									<th class="text-center"></th>
								</tr>
							</thead>
							{pedidos}
								<tr>
									<td>{codigo_pedido}</td>
									<!--<td>{estado}</td>-->
									<td><?= dataConfig('moneda') ?>{total}</td>
									<td class="text-center"><a class='btn btn-info btn-sm' href="clientes/pedido-detalle/{id}"><span class="glyphicon glyphicon-eye-open"></span> Detalle</a></td>
								</tr>
							{/pedidos}
						</table>
						<div class="clearfix blog-pagination filters-container  wow fadeInUp outer-top-bd">                  
                            <div class="text-right">
                                 <div class="pagination-container">
                                    <ul class="list-inline list-unstyled">
                                        {paginacion}
                                    </ul><!-- /.list-inline -->
                                </div><!-- /.pagination-container -->  
                            </div><!-- /.text-right -->
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