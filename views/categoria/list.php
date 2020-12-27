<!-- Content page -->
<!--Mensaje de alerta o registro-->
<?php if(isset($_SESSION["register"]) && $_SESSION["register"] == 'complete'):?>
    <div class='alert alert-success alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span></button>
    <strong>Exitosa!</strong> Registro guardado con exito! </div>
<?php elseif(isset($_SESSION["register"]) && $_SESSION["register"] == 'failed'): ?>
    <div class='alert alert-warning alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span></button>
    <strong>Error!</strong> Registro fallido! </div>
<?php endif; ?>

<!-- Panel listado de categorias -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CATEORÍAS</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover text-center">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">NOMBRE</th>
							<th class="text-center">EDITAR</th>
							<th class="text-center">ELIMINAR</th>
						</tr>
					</thead>
					<tbody>
						<?php if($categorias->num_rows>0) :?>
						<?php while($categoria = $categorias->fetch_object()):?>
						<tr>
							<td><?=$categoria->id?></td>
							<td><?=$categoria->nombre?></td>
							<td>
								<a href="<?=base_url?>categoria/select&id=<?=$categoria->id?>" class="btn btn-success btn-raised btn-xs">
									<i class="zmdi zmdi-refresh"></i>
								</a>
							</td>
							<td>
								<form>
									<a href="<?=base_url?>categoria/remove&id=<?=$categoria->id?>" class="btn btn-danger btn-raised btn-xs">
										<i class="zmdi zmdi-delete"></i>
									</a>
								</form>
							</td>
						</tr>
						<?php endwhile; ?>
						<?php else : ?>
							<td colspan="4">No hay ningun registro</td> 
						<?php endif; ?>
					</tbody>
				</table>
			</div>			
			<nav class="text-center">
				<ul class="pagination pagination-sm">
					<?php echo Utils::paginar($registros_por_paginas,$registros_totales, $pag,"categoria/list"); ?>
				</ul>
			</nav>
		</div>
	</div>
</div>
<?php Utils::borrarErrores();?>