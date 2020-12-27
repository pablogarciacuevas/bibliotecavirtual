<div class="container-fluid">
			<h2 class="text-titles text-center">Categoría seleccionada</h2>
			<div class="row">
				<div class="col-xs-12">
					<div class="list-group">
						<div class="list-group-item">
							<br>
						<div class="list-group-separator"></div>				
							<?php while($libro = $libros->fetch_object()): ?>
							<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" style="margin-top:10px">
								<div class="row-picture">
									<img class="circle" src="<?=base_url?><?php echo Utils::seleccionarImagen($libro->url_imagen) ?>" alt="icon">						
								</div>
								<div class="row-content">
									<h4 class="list-group-item-heading"><?=$libro->titulo?></h4>
									<p class="list-group-item-text">													
										<strong>Autor: </strong><?=$libro->autor?> <br>
										<a href="<?=base_url?>catalogo/info&id=<?=$libro->id?>" class="btn btn-primary" title="Más información"><i class="zmdi zmdi-info"></i></a>
										<a href="#!" class="btn btn-primary" title="Ver PDF"><i class="zmdi zmdi-file"></i></a>
										<a href="#!" class="btn btn-primary" title="Descargar PDF"><i class="zmdi zmdi-cloud-download"></i></a>
										<a href="<?=base_url?>libro/config" class="btn btn-primary" title="Gestionar libro"><i class="zmdi zmdi-wrench"></i></a>
										
									</p>
								</div>
							</div>
							<?php endwhile; ?>
							<div class="row-content">
						</div>
						<div class="list-group-separator"></div>				
						<div class="list-group-separator"></div>
					</div>
					<nav class="text-center">
						<ul class="pagination pagination-sm">					
						<?php 
						if(isset($paginador)){
							echo Utils::pag($registros_por_paginas,$registros_totales, $pagina_actual,"catalogo/index");
						}else{
							
						}?>

						<!-- 	<li class="disabled"><a href="javascript:void(0)">«</a></li>
							<li class="active"><a href="javascript:void(0)">1</a></li>
							<li><a href="javascript:void(0)">2</a></li>
							<li><a href="javascript:void(0)">3</a></li>
							<li><a href="javascript:void(0)">4</a></li>
							<li><a href="javascript:void(0)">5</a></li>
							<li><a href="javascript:void(0)">»</a></li> -->
						</ul>
					</nav>
				</div>
			</div>
		</div>