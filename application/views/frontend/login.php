<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="./">Home</a></li>
				<li class='active'>Acceso</li>
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
				<div class="col-md-6 col-sm-6 sign-in">
					<h4 class="">INGRESAR</h4>
					<p class="">Ingrese a continuación el correo y clave que uso al registrarse</p>
					<!--<div class="social-sign-in outer-top-xs">
						<a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
						<a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
					</div>-->
					<form class="register-form outer-top-xs" role="form" action="clientes/login" method="post" enctype="multipart/form-data">
						
						<?=$this->session->flashdata('message')?>
						<div class="form-group">
							<label class="info-title" for="exampleInputEmail1">Correo <span>*</span></label>
							<input type="email" class="form-control unicase-form-control text-input" name="email" required>
						</div>
						<div class="form-group">
							<label class="info-title" for="exampleInputPassword1">Contraseña <span>*</span></label>
							<input type="password" class="form-control unicase-form-control text-input" name="clave" value="" required>
						</div>
						<div class="radio outer-xs">
							<!--<label>
							<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember me!
							</label>-->
							<a href="clientes/olvido" class="forgot-password pull-right">¿Olvidaste tu contraseña?</a>
						</div>
						<button type="submit" class="btn-upper btn btn-primary checkout-page-button">INGRESAR</button>
					</form>
				</div>
				<!-- Sign-in -->
				<!-- create a new account -->
				<div class="col-md-6 col-sm-6 create-new-account">
					<h4 class="checkout-subtitle">REGÍSTRATE</h4>
					<p class="text title-tag-line">Llene el formulario que se muestra a continuación.</p>
					<form class="register-form outer-top-xs" id="formCliente" role="form" action="clientes/registrate" method="post" enctype="multipart/form-data">
						<?php if (validation_errors()) : ?>
						<div class="form-group has-feedback">
							<?= validation_errors() ?>
						</div>
						<?php endif; ?>
						<?=$this->session->flashdata('message_add')?>
						<div class="form-group">
							<label class="info-title" for="">Nombres <span>*</span></label>
							<input type="text" class="form-control unicase-form-control text-input" name="nombres" >
						</div>
						<div class="form-group">
							<label class="info-title" for="">Apellidos <span>*</span></label>
							<input type="text" class="form-control unicase-form-control text-input" name="apellidos" >
						</div>
						<div class="form-group">
							<label class="info-title" for="">Correo <span>*</span></label>
							<input type="email" class="form-control unicase-form-control text-input" name="correo" >
						</div>
						<div class="form-group">
							<label class="info-title" for="">Teléfono <span>*</span></label>
							<input type="text" class="form-control unicase-form-control text-input" name="telefono" >
						</div>
						<div class="form-group">
							<label class="info-title" for="">Contraseña <span>*</span></label>
							<input type="password" class="form-control unicase-form-control text-input" name="password" id="password">
						</div>
						<div class="form-group">
							<label class="info-title" for="">Repetir Contraseña <span>*</span></label>
							<input type="password" class="form-control unicase-form-control text-input" name="cfmPassword" id="cfmPassword" >
						</div>
						<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Crear cuenta</button>
					</form>

				</div>
				<!-- create a new account -->			
			</div>
			<!-- /.row -->
		</div>
		<!-- /.sigin-in-->
	</div>
	<!-- /.container -->
</div>