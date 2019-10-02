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

		for ($i=0; $i < length($archivo) ; $i++) 
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
				header("Location: ../facturarVehiculo.php?cobrar=".$resultado."&ingreso=".$horaEntrada."&salida=".$horaSalida);
				unset($archivo[i]);
				fclose($archivo);
				exit();
			}
			else
			{
				header("Location: ../facturarVehiculo.php?error=patentenoexiste");
			}
      	}
      	//if ($borrar) {
      	//	$lear = fopen("estacionados.txt", "r");
      	//	foreach ($lear as $key => $value) 
      	//	{      					
      	//		if (in_array('Dispatched', $value, true)) 
      	//		{
    	//			unset($status[$key]);
          //  	}
            //$status = json_encode($status);
      	}
?>