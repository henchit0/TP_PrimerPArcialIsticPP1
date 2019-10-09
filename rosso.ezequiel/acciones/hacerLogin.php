<?php
	
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
		$archivo = fopen("usuarios.txt", "r") or die("Imposible arbrir el archivo");
	
		while(!feof($archivo)) 
		{
			$objeto = json_decode(fgets($archivo));
			if ($objeto->usuario == $checkUsuario) 
			{	
				$booUsuario = 1;
				if ($objeto->password == $checkPassword)
				{
					header("Location: ../login.php?exito=signup");
					fclose($archivo);
					exit();
				}			
			}
		 	
		}	
		if ($booUsuario == 0) {
			header("Location: ../login.php?error=usuarioincorrecto");
			fclose($archivo);
			exit();
		}
		else 
	    {
			header("Location: ../login.php?error=contraseñaincorrecta");
			fclose($archivo);
			exit();
		}

		fclose($archivo);
	}	
	header("Location: ../login.php");
	exit();
?>