<?php

	$precioFraccion = 100;
	
	$horaSalida = time(); 
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$horaSalida= date ('H:i', $horaSalida);

	$checkPatente = $_GET['inputPatente'];


	if (empty($checkPatente)) 
	{
		header("Location: ../facturarVehiculo.php?error=campovacio");
		exit();
	}
	else
	{
		$archivo = fopen("estacionados.txt", "r") or die("Imposible arbrir el archivo");
	
		while(!feof($archivo)) 
		{
			$objeto = json_decode(fgets($archivo));

			if ($objeto->patente == $checkPatente) 
			{
      			$horaEntrada = $objeto->hora;

      			$dateTime1 = date_create($horaEntrada);
      			$dateTime2 = date_create($horaSalida);
      			$interval = date_diff($dateTime1, $dateTime2);

      			echo "<p> El vehiculo estuvo estacionado <br>".$interval->format('%h hs:%i min <br></p>'); 
      			$porHora = $interval->format('%hhs') * $precioFraccion;
      			echo "El precio por hora es de: $".$precioFraccion."<br>";
      			echo "<p>Total a pagar: $".$porHora."</p>";

      			}
		}
	}

	
?>