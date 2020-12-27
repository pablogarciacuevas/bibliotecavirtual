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

<!-- Panel nuevo cliente -->
<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO CLIENTE</h3>
        </div>
        <div class="panel-body">
            <form action="<?=base_url?>cliente<?=!isset($edit) ? '/save' : '/edit' ?>" method="POST" onsubmit="return valida(this)" >
                <input type="hidden" name="id" value="<?=$usuario->getId(); ?>" />
                <fieldset>
                    <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">DNI/CEDULA *</label>
                                    <input pattern="[0-9-]{1,30}" class="form-control" type="text" name="dni" value="<?=$usuario->getNumeroDocumento(); ?>" required="" maxlength="30">
                                    <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'dni') ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombres *</label>
                                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre" value="<?=$usuario->getNombre();?>" required="" maxlength="30">
                                    <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'nombre') ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Apellidos *</label>
                                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido" value="<?=$usuario->getApellidos();?>" required="" maxlength="30">
                                    <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'apellido') ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Teléfono</label>
                                    <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono" maxlength="15" value="<?=$usuario->getTelefono();?>">
                                    <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'telefono') ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Cargo/Ocupación *</label>
                                    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="ocupacion" required="" maxlength="30" value="<?=$usuario->getOcupacion();?>">
                                    <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'ocupacion') ?>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Dirección</label>
                                    <textarea name="direccion" class="form-control" rows="2" maxlength="100"><?=$usuario->getDireccion();?></textarea>
                                    <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'direccion') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend><i class="zmdi zmdi-key"></i> &nbsp; Datos de la cuenta</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre de usuario *</label>
                                    <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" class="form-control" type="text" name="usuario" required="" maxlength="15" value="<?=$usuario->getUsername();?>">
                                    <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'usuario') ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12" id="divCambiarContraseña" style="<?= isset($edit) ? 'display:block' : 'display:none' ?>" >
                                <a href="#" id="contraseña_confirm">Cambiar contraseña</a>
                            </div> 
                            <div id="contraseñas" style="<?= !isset($edit) ? 'display:block' : 'display:none' ?>">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Contraseña *</label>
                                        <input class="form-control" type="password" id="password1" name="password1" maxlength="70">
                                        <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'password1') ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Repita la contraseña *</label>
                                        <input class="form-control" type="password" id="password2" name="password2" maxlength="70">
                                        <div id="validar_password" class="valid_form"></div>
                                        <?php if(isset($_SESSION["errores"])) echo Utils::mostrarError($_SESSION["errores"],'password2') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">E-mail</label>
                                    <input class="form-control" type="email" name="email" maxlength="50" value="<?=$usuario->getEmail();?>">
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
                <p class="text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> <?= !isset($edit)? "Guardar" : "Actualizar"  ?> </button>
                </p>
            </form>
            <?php Utils::borrarErrores(); ?>
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
        var pass1 = document.querySelector("#password1");
        var pass2 = document.querySelector("#password2");

        if(pass1.value != pass2.value){
            var validar_password = document.querySelector("#validar_password");
            validar_password.innerText= "Debe repetir la misma contraseña";
            ok= false;
        }

        return ok;
    }

</script>