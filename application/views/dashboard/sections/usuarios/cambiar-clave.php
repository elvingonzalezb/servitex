<?php $this->load->view("dashboard/includes/breadcrumbs", array('titulo'=>'Editar')); ?>
<div class="page-body clearfix">
	<div class="row clearfix">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Cambiar Clave</div>
				<?=$this->session->flashdata('message')?>
				<div class="panel-body p-b-25">
					<form class="form-horizontal" role="form" action="dashboard/usuarios/cambiar_clave" method="post" enctype="multipart/form-data" id="Changepassword">
						<div class="form-group">
							<label class="col-sm-2 control-label old_clave">Clave actual</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="password" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nueva clave</label>
							<div class="col-sm-10">
								<input type="text" class="form-control new_clave" name="nuevaClave" value="" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 p-l-15">
								<button type="submit" class="btn btn-sm btn-success">Actualizar Clave</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>