<?php

	$precioFraccion = 100;	
	$contadorFraccion = 0;
	$borrar = false;

	
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$horaSalida = mktime(); 

	$checkPatente = $_GET['inputPatente'];

	if (empty($checkPatente)) 
	{
		header("Location: ../facturarVehiculo.php?error=campovacio");
		exit();
	}
	else
	{
		$archivo = fopen("estacionados.txt", "r") or die("Imposible arbrir el archivo");
		$historico = fopen("historicoFacturados.txt", "w");	
		$objetoHistorico = new stdClass();


		while(!feof($archivo)) 
		{
			$objeto = json_decode(fgets($archivo));

			$objetoPatente = $objeto->patente;
			$horaEntrada = $objeto->horaIngreso;

			if ($objetoPatente == $checkPatente) 
			{	

				$borrar = true;

				//$horaSalida = strtotime($horaSalida);
				$diffSegundos = $horaSalida - $horaEntrada;
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

				$objetoHistorico->patente = $objetoPatente;
				$objetoHistorico->horaIngreso = $horaEntrada;
				$objetoHistorico->horaSalida = $horaSalida;
				$objetoHistorico->totalCobrado = $resultado;
				fwrite($historico, json_encode($objetoHistorico)."\n");


				header("Location: ../facturarVehiculo.php?cobrar=".$resultado."&ingreso=".$horaEntrada."&salida=".$horaSalida."&estadia=".$contadorFraccion);
					fclose($archivo);
				exit();
			}
			else
			{
				header("Location: ../facturarVehiculo.php?error=patentenoexiste");
			}
      	}

      	fclose($archivo);
      	fclose($historico);

//      	if ($borrar) 
//      	{
//
//      		$archOriginal = fopen('estacionados.txt', 'r');
//			$archTemporal = fopen('estacionados.tmp', 'w');
//
//			$probandoPatente = "	1";
//
//			$reemplazarOriginal = false;
//
//			while (!feof($archOriginal)) 
//			{
//
//			  	$registroJson = fgets($archOriginal);
//
//				if (stristr($registroJson->patente,$probandoPatente)) 
//				{
//
//				    $registroJson = "";	
//				    $reemplazarOriginal = true;
//				}
//				fputs($archTemporal, $registroJson);
//			}
//
//			fclose($archOriginal); 
//			close($archTemporal);
//
//			if ($reemplazarOriginal) 
//			{
				//var_dump($diffSegundos)
			  	//		die();
//			    rename('estacionados.tmp', 'estacionados.txt');
//			} else unlink('estacionados.tmp');
		}
		
?>	