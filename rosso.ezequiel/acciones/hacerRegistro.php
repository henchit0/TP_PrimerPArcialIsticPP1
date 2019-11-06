<?php
	include "AccesoDatos.php";

	$miObjeto = new stdClass();
	$miObjeto->usuario = $_GET['inputUsuario'];
	$miObjeto->password = $_GET['inputPassword'];
	$miObjeto->perfil = $_GET['perfilRegistro'];


	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$select="INSERT INTO usuario (nombre, clave, perfil) VALUES ('$miObjeto->usuario','$miObjeto->password','$miObjeto->perfil')";
	$consulta =$objetoAccesoDato->RetornarConsulta($select);
	$consulta->execute();

	// $archivo = fopen('../archivos/usuarios.txt', 'a');
	// fwrite($archivo, json_encode($miObjeto)."\n");
	// fclose($archivo);
	header("Location: ../paginas/registro.php?exito=exito");
?> 