<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Estacionamiento</title>

     <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/floating-labels.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Rosso</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-iconx|"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="registro.php">Registrate</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ingresoVehiculo.php">Ingresar Vehiculo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="facturarVehiculo.php">Facturar Vehiculo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listarUsuarios.php">Listar Usuarios</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="historicoVehiculos.php">Listar Vehiculos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="historicoVehiculos.php">Historial Vehiculos</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
    	<div>
      	<h2>Listado de vehiculos</h2>
      	<ol>
			<?php
      error_reporting(0);
        date_default_timezone_set('America/Argentina/Buenos_Aires');

			$archivo = fopen("acciones/estacionados.txt", "r") or die("Imposible abrir el archivo");
			while(!feof($archivo)) 
			{
		 		$objeto = json_decode(fgets($archivo));
        if (!$objeto == "") {
          echo "<li>Patente: ".$objeto->patente." Fecha de ingreso: ".date("d-m-y H:i",$objeto->horaIngreso)."</li>";
        }
			}
			fclose($archivo);
			?>
		</ol>
		</div>
 	</main>

    <footer class="footer">
      
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
