<?php
	include "AccesoDatos.php";
	$precioFraccion = 100;	
	$contadorFraccion = 0;
	$borrar = false;

	
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$horaSalida = mktime(); 

	$checkPatente = $_GET['inputPatente'];

	if (empty($checkPatente)) 
	{
		header("Location: ../paginas/facturarVehiculo.php?error=campovacio");
		exit();
	}
	else
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select * from vehiculosestacionados");
        $consulta->execute();     
        $datos= $consulta->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($datos);
        // die();

        foreach ($datos as $vehiculo) 
        {

			if ($vehiculo['patente'] == $checkPatente) 
			{	
				$borrar = true;

				//$horaSalida = strtotime($horaSalida);
				$diffSegundos = $horaSalida - $vehiculo['horaIngreso'];
				$diffAlternativo = $diffSegundos;

				while ($diffAlternativo >= 3600) 
				{			
					if ($diffAlternativo >= 3600) 
					{
						$contadorFraccion++;
						$diffAlternativo = $diffAlternativo - 3600;
						
					}
					else if ($diffAlternativo >= 1800)
					{
						$contadorFraccion++;
					}					
				}
				$resultado = $contadorFraccion * $precioFraccion;

				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$select="DELETE FROM vehiculosestacionados WHERE patente = $checkPatente";
				$borrar =$objetoAccesoDato->RetornarConsulta($select);
				$borrar->execute();

				

				header("Location: ../paginas/facturarVehiculo.php?cobrar=".$resultado."&ingreso=".$vehivulo['horaIngreso']."&salida=".$horaSalida."&estadia=".$contadorFraccion);
				// $objetoHistorico->patente = $objetoPatente;
				// $objetoHistorico->horaIngreso = $horaEntrada;
				// $objetoHistorico->horaSalida = $horaSalida;
				// $objetoHistorico->totalCobrado = $resultado;

        	}

		}
	}

	

		// while(!feof($archivo)) 
		// {
		// 	$objeto = json_decode(fgets($archivo));

		// 	$objetoPatente = $objeto->patente;
		// 	$horaEntrada = $objeto->horaIngreso;

		// 		fwrite($historico, json_encode($objetoHistorico)."\n");


		// 		header("Location: ../paginas/facturarVehiculo.php?cobrar=".$resultado."&ingreso=".$horaEntrada."&salida=".$horaSalida."&estadia=".$contadorFraccion);
		// 		exit();
		// 	}
		// 	else
		// 	{
		// 		header("Location: ../paginas/facturarVehiculo.php?error=patentenoexiste");
		// 	}
  //     	}

      	

   //   	if ($borrar) 
   //   	{

   //   		$archOriginal = fopen('../archivos/estacionados.txt', 'a');
			// $archTemporal = fopen('../archivos/estacionados.tmp', 'a');

			// $probandoPatente = "fff444";

			// $reemplazarOriginal = false;

			// while (!feof($archOriginal)) 
			// {

			//   	$registroJson = fgets($archOriginal);

			// 	if (stristr($registroJson->patente,$probandoPatente)) 
			// 	{

			// 	    $registroJson = "";	
			// 	    $reemplazarOriginal = true;
			// 	}
			// 	fputs($archTemporal, $registroJson);
			// }

			// fclose($archOriginal); 
			// close($archTemporal);

			// if ($reemplazarOriginal) 
			// {
			// 	// var_dump($diffSegundos)
			//  //  			die();
			//     rename('../archivos/estacionados.tmp', 'estacionados.txt');
			// } else unlink('estacionados.tmp');
		?>