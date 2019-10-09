<?php
	$miObjeto = new stdClass();
	$miObjeto->usuario = $_GET['inputUsuario'];
	$miObjeto->password = $_GET['inputPassword'];
	$archivo = fopen('usuarios.txt', 'a');
	fwrite($archivo, json_encode($miObjeto)."\n");
	fclose($archivo);
	header("Location: ../registro.php?exito=exito");
?> 