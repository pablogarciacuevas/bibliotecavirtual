<!DOCTYPE html>
<html lang="es">
<head>
	<title>LogIn</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?=base_url?>/css/main.css">
</head>
<body>
<div class="full-box login-container cover">
	<form action="<?=base_url?>usuario/logining" method="POST" onsubmit="return valida(this)" autocomplete="off" class="logInForm">
		<p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
		<p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>
		<div class="form-group label-floating">
			<label class="control-label" for="UserName">Usuario</label>
			<input class="form-control" id="UserName" name="username" type="text">
			<p class="help-block">Escribe tú nombre de usuario</p>
		</div>
		<div class="form-group label-floating">
			<label class="control-label" for="UserPass">Contraseña</label>
			<input class="form-control" id="UserPass" name="password" type="password">
			<p class="help-block">Escribe tú contraseña</p>
		</div>
		<div class="form-group text-center">
			<input type="submit" value="Iniciar sesión" class="btn btn-info" style="color: #FFF;">
			<?php if(isset($_SESSION["error"]) && $_SESSION["error"]!=null) 
				echo '<div id="msj_back" class="valid_form">' . $_SESSION["error"] . '</div>';  
				$_SESSION["error"]=null;
			?>
			<div id="mensaje" class="valid_form"></div>
		</div>
	</form>
</div>
<script type='text/javascript'>

	function valida(f){
		var result = true;
		var user = document.querySelector('#UserName');
		var pass = document.querySelector('#UserPass');
		var mensaje = document.querySelector("#mensaje");
		var msj_back = document.getElementById("msj_back");

		msj_back.innerHTML="";

		if(user.value.trim()==''){
			mensaje.innerText = "Falta completar usuario";
			result=false;
		}

		if(pass.value.trim()=='' && result){
			mensaje.innerText = "Falta completar password";
			result=false;
		}

		return result;
	}

</script>