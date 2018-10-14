<?php $this->load->view("dashboard/includes/breadcrumbs", array()); ?>
<?php $MT=$this->uri->segment(4,0);?>
<div class="page-body">
    <div class="panel panel-default">
		<div class="panel-heading">CATEGORÍAS</div>
		<div class="panel-body">
			<?=$this->session->flashdata('message');?>
			<table class="table table-striped table-hover js-exportable dataTable"  cellspacing="0" width="100%">
				<thead>
					<tr>
						<th width="5%">N°</th>
						<?php if($MT===0){?>
						<?php }else{?>
							<th>IMAGEN</th>
						<?php }?>
						<th>NOMBRE</th>
						<th>ESTADO</th>
						<th width="18%" class="noExport">ACCIONES</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($dataset as $key => $value): ?>
					<?php $status = (($value['estado']==_ACTIVO) ? 'activo': 'inactivo')?>
					<?php $class = (($value['estado']==_ACTIVO) ? 'btn-success': 'btn-warning')?>
					<tr  id="fila-<?=$value['id']?>">
						<td class="center"><?=$key+1?></td>
						<?php if ( ! empty($value['imagen'])){
						$tamaño='300';
						}else{
						$tamaño='20';
						}?>
						<?php if($MT===0){?>
						<?php }else{?>
							<td><img src="files/categorias/thumbs/<?=$value['imagen']?>" alt="<?=$value['imagen_title']?>" class="img-responsive"></td>
						<?php }?>						
						<td><?=$value['nombre']?></td>
						<td class="center">
							<form action="" id="estadoAjax">
								<input type="hidden" id="idCat<?=$value['id']?>" value="<?=$value['id']?>">
								<input type="hidden" id="estado<?=$value['id']?>" value="<?=$value['estado']?>">
								<button type="button" id="btn-<?=$value['id']?>" class="btn <?=$class?>"
								onclick="actualizarEstado($('#idCat<?=$value['id']?>').val(),$('#estado<?=$value['id']?>').val(),'categorias/ajaxEstado');return false;"><?=$status?></button>
                                <span id="divResultado<?=$value['id']?>"></span>
							</form>
						</td>
						<td class="center">
						
						<?php if($MT===0){?>
						<?php }else{?>
							<a class="btn btn-info" href="dashboard/categorias/editar/<?=$value['id']?>">
								<i class="glyphicon glyphicon-edit icon-white"></i>
								Editar
							</a>
						<?php }?>
							
							<a class="btn btn-danger" href="javascript:eliminarItem(<?=$value['id']?>,'categorias/delete');">
								<i class="glyphicon glyphicon-trash icon-white"></i>
								Borrar
							</a>
							<?php if ($value['numero_categorias']>0) {
								$href = 'dashboard/categorias/lista/'.$value['id'];
								$texto = 'Subcategorias';
							} else {
								$href = 'dashboard/productos/lista/'.$value['id'];
								$texto = 'Productos';
							}
							?>
							<a class="btn btn-success" href="<?=$href?>">
								<i class="glyphicon glyphicon-align-justify icon-white"></i>
								<?=$texto?>
							</a>
						</td>
					</tr>
					<?php endforeach;?>                              
				</tbody>
			</table>
		</div>
	</div>
</div>