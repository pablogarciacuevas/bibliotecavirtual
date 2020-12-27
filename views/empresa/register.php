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
			
		<!-- Content page -->
		<!-- Content Body  -->
		<!-- panel datos de la empresa -->
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS DE LA EMPRESA</h3>					
				</div>
				<div class="panel-body">
					<form action="<?=base_url?>empresa/<?=isset($edit) ? '/edit' : '/save' ?>" method="POST">
						<!-- Cuando Se Crea Edit, Permite Ingresar al Controlador Edit o en el Caso de que No Se Guarda -->
						<input type="hidden" name="id" value="<?=$empresa->getId(); ?>"/>
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos básicos</legend>
				    		<div class="container-fluid">			
				    			<div class="row">
				    				<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
											  <label class="control-label">DNI/CÓDIGO/NÚMERO DE REGISTRO *</label>															
											  <input pattern="[0-9+]{1,30}" class="form-control" type="text" name="codigo" value="<?=$empresa->getCodigo();?>" maxlength="30">			
											  <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'codigo') ?>
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Nombre de la empresa *</label>
											  <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" value="<?=$empresa->getNombre();?>" name="nombre" required="" maxlength="40">
											  <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'nombre') ?>
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Teléfono</label>
											  <input pattern="[0-9+]{1,15}" class="form-control" type="text" value="<?=$empresa->getTelefono();?>" name="telefono" maxlength="15">
											  <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'empresa') ?>
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">E-mail</label>
											  <input class="form-control" type="email" value="<?=$empresa->getEmail();?>" name="email" maxlength="50">
											  <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'email') ?>
										</div>
				    				</div>
				    				<div class="col-xs-12">
										<div class="form-group label-floating">
										  	<label class="control-label">Dirección</label>
											  <input class="form-control" type="text" name="direccion" value="<?=$empresa->getDireccion();?>"maxlength="170">
											  <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'direccion') ?>
										</div>
				    				</div>
				    			</div>
				    		</div>
				    	</fieldset>
				    	<br>
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Otros datos</legend>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12">
							    		<div class="form-group label-floating">
										  	<label class="control-label">Nombre del gerente o director *</label>
											  <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,50}" class="form-control" type="text" value="<?=$empresa->getDirector();?>" name="director" required=""  maxlength="50">
											  <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'director') ?>
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
							    		<div class="form-group label-floating">
										  	<label class="control-label">Símbolo de moneda *</label>
											  <input class="form-control" type="text" name="moneda" value="<?=$empresa->getSimboloMoneda();?>" required="" maxlength="1">
											  <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'moneda') ?>
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
							    		<div class="form-group label-floating">
										  	<label class="control-label">Año *</label>
											  <input pattern="[0-9]{4,4}" class="form-control" value="<?=$empresa->getAnio();?>"type="text" name="year" >
											  <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'year') ?>
										</div>
				    				</div>
				    			</div>
				    		</div>
				    	</fieldset>
				    	<br>
					    <p class="text-center" style="margin-top: 20px;">
							<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i><?=isset($edit)?' Actualizar' : ' Guardar'?></button>
						</p>
					</form>
					<?php Utils::borrarErrores();?>
				</div>
			</div>
		</div>
		