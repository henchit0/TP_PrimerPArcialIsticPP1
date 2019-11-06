<?php
	session_start();
	include "AccesoDatos.php";

	$checkUsuario = $_GET['inputUsuario'];
	$checkPassword = $_GET['inputPassword'];
	$booUsuario = 0;
	$booPassword = 0;

	if (empty($checkUsuario) || empty($checkPassword)) 
	{
		header("Location: ../login.php?error=camposvacios");
		exit();
	}
	else
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario");
		$consulta->execute();			
		$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);		
		// var_dump($datos);
		// die();

		foreach ($datos as $usuario ) 
		{
			// var_dump($usuario );
			// echo "su nombre es".$usuario["nombre"];
			// echo "<br>";
		
			if ($usuario['nombre'] == $checkUsuario) 
			{	
				$booUsuario = 1;
				if ($usuario['clave'] == $checkPassword)
				{
					$_SESSION['idDeUsuario'] = $checkUsuario;
					$_SESSION['perfil'] = $usuario['perfil'];
					$_SESSION['horaIngreso'] = mktime();
					header("Location: ../paginas/login.php");
					exit();
				}			
			}
		 	
		}	
		if ($booUsuario == 0) {
			header("Location: ../paginas/login.php?error=usuarioincorrecto");
			fclose($archivo);
			exit();
		}
		else 
	    {
			header("Location: ../paginas/login.php?error=contraseñaincorrecta");
			fclose($archivo);
			exit();
		}

	}	
	header("Location: ../paginas/login.php");
	exit();
?>