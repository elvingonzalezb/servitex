<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="./">Home</a></li>
				<li class='active'>Recuperar Contraseña</li>
			</ul>
		</div>
		<!-- /.breadcrumb-inner -->
	</div>
	<!-- /.container -->
</div>
<div class="body-content outer-top-bd">
	<div class="container" id="redirectLogin">
		<div class="sign-in-page inner-bottom-sm">
			<div class="row">
				<!-- Sign-in -->
				<div class="col-md-6 col-sm-6 sign-in col-center">
					<div class="well">
					<?php if ($this->uri->rsegments[2] == 'olvido'): ?>
						<h4 class="">RECUPERAR CONTRASEÑA</h4>
						<p class="">Ingrese a continuación el correo</p>
						<form class="register-form outer-top-xs" role="form" action="clientes/olvido" method="post" enctype="multipart/form-data">
							<?=$this->session->flashdata('message')?>
							<div class="form-group">
								<label class="info-title" for="exampleInputEmail1">Correo <span>*</span></label>
								<input type="email" class="form-control unicase-form-control text-input" name="correo" required>
							</div>
							<div class="radio outer-xs">
								<a href="clientes/login" class="forgot-password pull-right">Ingresar a mi cuenta</a>
							</div>
							<button type="submit" class="btn-upper btn btn-primary checkout-page-button">RECUPERAR CONTRASEÑA</button>
						</form>
					<?php else: ?>
						<h4 class="">RESTABLECER CONTRASEÑA</h4>
						<p class="">Ingrese a continuación su nueva contraseña</p>
						<form class="register-form outer-top-xs" id="formCliente" role="form" action="clientes/restablecer" method="post" enctype="multipart/form-data">
							<?=$this->session->flashdata('message_restablecer')?>
							<div class="form-group">
								<label class="info-title" for="exampleInputEmail1">Nueva contraseña <span>*</span></label>
								<input type="password" class="form-control unicase-form-control text-input" name="password" id="password" required>
							</div>
							<div class="form-group">
								<label class="info-title" for="exampleInputEmail1">Repetir contraseña <span>*</span></label>
								<input type="password" class="form-control unicase-form-control text-input" name="cfmPassword" required>
							</div>
							<div class="radio outer-xs">
								<a href="clientes/login" class="forgot-password pull-right">Ingresar a mi cuenta</a>
							</div>
							<button type="submit" class="btn-upper btn btn-primary checkout-page-button">RESTABLECER</button>
						</form>
					<?php endif ?>
					</div>
				</div>	
				<!-- Sign-in -->		
			</div>
			<!-- /.row -->
		</div>
		<!-- /.sigin-in-->
	</div>
	<!-- /.container -->
</div>
<style>
.col-center{
	float: none;
	margin: 0 auto;
}
</style>