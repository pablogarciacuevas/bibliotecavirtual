<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?=base_url?>/css/main.css">
	<link rel="stylesheet" href="<?=base_url?>/css/style.css">
</head>
<body>
	<!--comenta esta parte si no hay usuarios aun en el sistema -->
 	<?php Utils::verificarSiExisteLaSession(); ?> 