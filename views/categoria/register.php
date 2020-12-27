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

<!-- Panel nueva categoria -->
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVA CATEORÍA</h3>
		</div>
		<div class="panel-body">		
			<form action="<?=base_url?>categoria/<?=isset($edit) ? 'edit'  : 'save' ?>" method="POST">
				<input type="hidden" name="id" value="<?=$categoria->getId();?>" />
				<fieldset>
					<legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Información de la categoría</legend>
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">								
									<label class="control-label">Código *</label>
									<input pattern="[0-9]{1,7}" class="form-control" type="text" name="id" value='<?=$categoria->getId();?>' disabled maxlength="7">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Nombre *</label>
									<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" value="<?=$categoria->getNombre();?>" name="nombre" required="" maxlength="30">
									<?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'nombre') ?>
								</div>
							</div>
						</div>
					</div>
				</fieldset>
				<p class="text-center" style="margin-top: 20px;">
					<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i><?=isset($edit)?' Actualizar' : ' Guardar'?></button>
				</p>
			</form>
			<?php Utils::borrarErrores();?>
		</div>
	</div>
</div>