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

<?php if(isset($_SESSION["errores"]) && trim($_SESSION["errores"]["password_actual"]) != "") : ?>
    <div class='alert alert-warning alert-dismissible' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span></button>
    <strong>Error!</strong> El password actual no es valido de la cuenta </div>
<?php endif; ?>

<!-- Panel mi cuenta -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; MI CUENTA</h3>
		</div>
		<div class="panel-body">
			<form action="<?=base_url?>usuario/editMyCount" method="POST" onsubmit="return valida(this)">
				<fieldset>
					<legend><i class="zmdi zmdi-key"></i> &nbsp; Datos de la cuenta</legend>
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group label-floating">
									<input type="hidden" name="id" value="<?=$usuario->getId()?>">
									<label class="control-label">Nombre de usuario *</label>
									<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" class="form-control" type="text" name="username" required="" value="<?=$usuario->getUsername()?>" maxlength="15">
                                    <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'username') ?>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">E-mail</label>
									<input class="form-control" type="email" name="email" maxlength="50" value="<?=$usuario->getEmail()?>">
                                    <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'email') ?>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="form-group">
									<label class="control-label">Genero</label>
									<div class="radio radio-primary">
										<label>
											<input type="radio" name="sexo" id="optionsRadios1" value="M" <?= $usuario->getSexo() == 'M' ? 'checked' : ''; ?> checked="" >
											<i class="zmdi zmdi-male-alt"></i> &nbsp; Masculino
										</label>
									</div>
									<div class="radio radio-primary">
										<label>
											<input type="radio" name="sexo" id="optionsRadios2" value="F" <?= $usuario->getSexo() == 'F' ? 'checked' : ''; ?> >
											<i class="zmdi zmdi-female"></i> &nbsp; Femenino
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</fieldset>
				<br>
				<fieldset>
					<legend><i class="zmdi zmdi-lock"></i> &nbsp; Contraseña</legend>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo minima cupiditate tempore nobis. Dolor, blanditiis, mollitia. Alias fuga fugiat molestias debitis odit, voluptatibus explicabo quia sequi doloremque numquam dignissimos quis.
					</p>
					
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12 col-sm-12" id="divCambiarContraseña" style="display:block;" >
								<a href="#" id="contraseña_confirm">Cambiar contraseña</a>
							</div> 
							<div id="contraseñas" style="display:none;">
								<div class="col-xs-12">
									<div class="form-group label-floating">
										<label class="control-label">Contraseña actual *</label>
										<input class="form-control" type="password" name="contraseñaActual"  maxlength="70">
										<?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'password_actual') ?>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6">
									<div class="form-group label-floating">
										<label class="control-label">Nueva contraseña *</label>
										<input class="form-control" type="password" name="NuevaContraseña" id="NuevaContraseña"  maxlength="70">
										<?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'password') ?>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6">
									<div class="form-group label-floating">
										<label class="control-label">Repita la nueva contraseña *</label>
										<input class="form-control" type="password" name="ConfirmacionContraseña" id="ConfirmacionContraseña"  maxlength="70">
										<?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'password_confirm') ?>
										<div id="validar_password" class="valid_form"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</fieldset>
				<br>
				<fieldset>
					<legend><i class="zmdi zmdi-star"></i> &nbsp; Nivel de privilegios</legend>
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<p class="text-left">
									<div class="label label-success">Nivel 1</div> Control total del sistema
								</p>
								<p class="text-left">
									<div class="label label-primary">Nivel 2</div> Permiso para registro y actualización
								</p>
								<p class="text-left">
									<div class="label label-info">Nivel 3</div> Permiso para registro
								</p>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="radio radio-primary">
									<label>
										<input type="radio" name="Privilegio" id="optionsRadios1" value="1" <?=$usuario->getPrivilegio() == "1" ? "checked" : "" ?> checked="">
										<i class="zmdi zmdi-star"></i> &nbsp; Nivel 1
									</label>
								</div>
								<div class="radio radio-primary">
									<label>
										<input type="radio" name="Privilegio" id="optionsRadios2" value="2" <?=$usuario->getPrivilegio() == "2" ? "checked" : "" ?>>
										<i class="zmdi zmdi-star"></i> &nbsp; Nivel 2
									</label>
								</div>
								<div class="radio radio-primary">
									<label>
										<input type="radio" name="Privilegio" id="optionsRadios3" value="3" <?=$usuario->getPrivilegio() == "3" ? "checked" : "" ?>>
										<i class="zmdi zmdi-star"></i> &nbsp; Nivel 3
									</label>
								</div>
							</div>
						</div>
					</div>
				</fieldset>
				<p class="text-center" style="margin-top: 20px;">
					<button type="submit" class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-refresh"></i> Actualizar</button>
				</p>
			</form>
			<?php Utils::borrarErrores();?>	
		</div>
	</div>
</div>
<script type="text/javascript">
    
    var contraseña_confirm = document.getElementById('contraseña_confirm');
    contraseña_confirm.addEventListener('click',function(){
        document.querySelector('#contraseñas').style.display="block";
        document.querySelector('#divCambiarContraseña').style.display="none";
    });

    function valida(f){
        var ok = true;
        var pass1 = document.querySelector("#NuevaContraseña");
        var pass2 = document.querySelector("#ConfirmacionContraseña");

        if(pass1.value!=pass2.value){
            var validar_password = document.querySelector("#validar_password");
            validar_password.innerText = "Debe repetir la misma contraseña";
            ok=false;
        }
        return ok;
    }

</script>
