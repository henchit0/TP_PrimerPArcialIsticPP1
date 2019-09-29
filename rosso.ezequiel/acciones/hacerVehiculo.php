<?php
	$miSegundoObjeto = new stdClass();

	$horaIngreso = time(); 
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$horaIngreso= date ('H:i', $horaIngreso);


	$miSegundoObjeto->patente = $_GET['inputPatente'];
	$miSegundoObjeto->horaIngreso = $horaIngreso;

	
	$archivo = fopen('estacionados.txt', 'a');
	fwrite($archivo, json_encode($miSegundoObjeto)."\n");
	fclose($archivo);
	header("Location: ../ingresoVehiculo.php?exito=exito");
?>