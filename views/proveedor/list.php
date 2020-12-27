<?php if(isset($_SESSION["register"]) && $_SESSION["register"] == 'complete'):?>
    <div class='alert alert-success alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span></button>
    <strong>Exitosa!</strong> <?= $_SESSION["mensaje"] ?>  </div>
<?php elseif(isset($_SESSION["register"]) && $_SESSION["register"] == 'failed'): ?>
    <div class='alert alert-warning alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span></button>
    <strong>Error!</strong> <?= $_SESSION["mensaje"] ?> </div>
<?php endif; ?>		
		
		<!-- Panel listado de proveedores -->
		<div class="container-fluid">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PROVEEDORES</h3>
					
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover text-center">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">NOMBRE</th>
									<th class="text-center">RESPONSABLE</th>
									<th class="text-center">TELEFONO</th>
									<th class="text-center">EMAIL</th>
									<th class="text-center">DIRECCION</th>
									<th class="text-center">EDITAR</th>
									<th class="text-center">ELIMINAR</th>
								</tr>
							</thead>
							<tbody>								
								<?php if($proveedores->num_rows>0) :?>
								<?php while($proveedor = $proveedores->fetch_object()):?>								

								<tr>
									<td><?=$proveedor->id?></td>
									<td><?=$proveedor->nombre?></td>
									<td><?=$proveedor->responsable?></td>
									<td><?=$proveedor->telefono?></td>
									<td><?=$proveedor->email?></td>
									<td><?=$proveedor->direccion?></td>
									<td>								
										<a href="<?=base_url?>proveedor/select&id=<?=$proveedor->id?>" class="btn btn-success btn-raised btn-xs">
											<i class="zmdi zmdi-refresh"></i>
										</a>
									</td>
									<td>
										<form>
											<a href="<?=base_url?>proveedor/remove&id=<?=$proveedor->id?>" class="btn btn-danger btn-raised btn-xs">
												<i class="zmdi zmdi-delete"></i>
											</a>
										</form>
									</td>
								</tr>
								<?php endwhile; ?>
								<?php else : ?>
									<td colspan="8">No hay ningun registro</td> 
								<?php endif; ?>							
							</tbody>
						</table>
					</div>
					<nav class="text-center">
						<ul class="pagination pagination-sm">
							<?php echo Utils::paginar($registros_por_paginas,$registros_totales, $pag,"proveedor/list"); ?>
						</ul>
					</nav>
				</div>
			</div>
		</div>
<?php Utils::borrarErrores(); ?>