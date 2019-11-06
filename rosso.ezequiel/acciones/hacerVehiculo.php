<?php
	include "AccesoDatos.php";

	$miSegundoObjeto = new stdClass();
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$horaIngreso = mktime(); 	

	$miSegundoObjeto->patente = $_GET['inputPatente'];
	$miSegundoObjeto->horaIngreso = $horaIngreso;

	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$select="INSERT INTO `vehiculosestacionados`(`patente`, `horaIngreso`) VALUES ('$miSegundoObjeto->patente','$miSegundoObjeto->horaIngreso')";
	$consulta =$objetoAccesoDato->RetornarConsulta($select);
	$consulta->execute();
	
	// $archivo = fopen('../archivos/estacionados.txt', 'a');
	// fwrite($archivo, json_encode($miSegundoObjeto)."\n");
	// fclose($archivo);
	header("Location: ../paginas/ingresoVehiculo.php?exito=exito");
?>