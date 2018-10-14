<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<base href="<?= BASE_URL ?>">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Zona de Administracion</title>
		<!-- Favicon -->
		<link rel="icon" href="../../favicon.ico" type="image/x-icon">
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet"/>
		<!-- Bootstrap Core Css -->
		<link href="assets/dashboard/adminbsb/css/bootstrap.min.css" rel="stylesheet" />
		<!-- Font Awesome Css -->
		<link href="assets/dashboard/adminbsb/css/font-awesome.min.css" rel="stylesheet" />
		<!-- iCheck Css -->
		<link href="assets/dashboard/adminbsb/css/flat/_all.css" rel="stylesheet" />
		<!--<link href="../../assets/plugins/iCheck/skins/square/_all.css" rel="stylesheet"/>-->
		<!-- Custom Css -->
		<link href="assets/dashboard/adminbsb/css/style.css" rel="stylesheet" />
	</head>
	<body class="sign-in-page">
		<div class="signin-form-area">
			<h1><b>Zona de Administración</b></h1>
			<div class="signin-top-info">Ingrese su usuario y clave de acceso</div>
			<div class="row padding-15">
				<div class="col-sm-2 col-md-2 col-lg-4"></div>
				<div class="col-sm-8 col-md-8 col-lg-4">
				
					<form id="frmSignin" action="dashboard/usuarios/login" method="post" enctype="multipart/form-data">
						<?php if (validation_errors()) : ?>
						<div class="form-group has-feedback">
							<?= validation_errors() ?>
						</div>
						<?php endif; ?>
						<?=$this->session->flashdata('message')?>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="usuario" name="usuario" required/>
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
							<input type="password" class="form-control" placeholder="Contraseña" name="password" required/>
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						</div>
						<div class="clearfix"></div>
						<?= $recaptcha?>
						<div class="clearfix"></div>
						<div class="row">
							<div class="col-xs-7">
								<!--<div class="checkbox icheck m-l--20">
									<label><input type="checkbox"> Remember Me</label>
								</div>-->
							</div>
							<div class="col-xs-5">
								<button type="submit" class="btn btn-success btn-block btn-flat">INGRESAR</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-sm-2 col-md-2 col-lg-4"></div>
			</div>
		</div>
		<div class="signin-bottom-info">
			<!--<a href="sign-up.html">
			<i class="fa fa-user-circle-o m-r-5"></i>Register Now!
			</a>-->
			<a href="dashboard/usuarios/recuperar_clave" class="pull-right">Se te olvidó tu contraseña
			<i class="fa fa-unlock m-l-5 font-14"></i>
			</a>
		</div>
		<!-- Jquery Core Js -->
		<script src="assets/dashboard/adminbsb/js/jquery.min.js"></script>
		<!-- Bootstrap Core Js -->
		<script src="assets/dashboard/adminbsb/js/bootstrap.min.js"></script>
		<!-- iCheck Js -->
		<script src="assets/dashboard/adminbsb/js/icheck.min.js"></script>
		<!-- Jquery Validation Js -->
		<script src="assets/dashboard/adminbsb/js/jquery.validate.min.js"></script>
		<!-- Custom Js -->
		<script src="assets/dashboard/adminbsb/js/signin.js"></script>
	</body>
</html>