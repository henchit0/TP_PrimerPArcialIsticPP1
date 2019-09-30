<?php
	$miSegundoObjeto = new stdClass();

	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$horaIngreso = mktime(); 	

	$miSegundoObjeto->patente = $_GET['inputPatente'];
	$miSegundoObjeto->horaIngreso = $horaIngreso;

	
	$archivo = fopen('estacionados.txt', 'a');
	fwrite($archivo, json_encode($miSegundoObjeto)."\n");
	fclose($archivo);
	header("Location: ../ingresoVehiculo.php?exito=exito");
?>