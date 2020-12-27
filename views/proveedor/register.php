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
 
		<!-- Panel nuevo proveedor -->
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PROVEEDOR</h3>
				</div>
				<div class="panel-body">
					<form action="<?=base_url?>proveedor<?=isset($edit) ? '/edit' : '/save' ?>" method="POST">
					<input type="hidden" name="id" value="<?=$proveedor->getId(); ?>"/>					
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Información del proveedor</legend>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Nombre del proveedor *</label>
											  <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre" required="" value="<?=$proveedor->getNombre();?>"  maxlength="30">
											  <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'nombre') ?>
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Responsable de atención *</label>
											  <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="responsable" required="" value="<?=$proveedor->getResponsable();?>" maxlength="50">
											  <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'responsable') ?>
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Teléfono</label>
											  <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono" value="<?=$proveedor->getTelefono();?>" maxlength="15">
											  <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'telefono') ?>
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">E-mail</label>
											  <input class="form-control" type="email" name="email" value="<?=$proveedor->getEmail();?>" maxlength="50">
											  <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'email') ?>
										</div>
				    				</div>
				    				<div class="col-xs-12">
										<div class="form-group label-floating">
											  <label class="control-label">Dirección</label>											 
											  <textarea name="direccion" class="form-control" rows="2" maxlength="100"><?=$proveedor->getDireccion();?></textarea>
											  <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'direccion') ?>
										</div>
				    				</div>
				    			</div>
				    		</div>
				    	</fieldset>
					    <p class="text-center" style="margin-top: 20px;">
					    	<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i><?= !isset($edit)? "Guardar" : "Actualizar"  ?></button>
					    </p>
					</form>
					<?php Utils::borrarErrores();?>
				</div>
			</div>
		</div>