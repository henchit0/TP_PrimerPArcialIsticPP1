<?php  
  include "../acciones/session.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../img/icon.ico">
    <title>Historico Vehiculos</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/sticky-footer-navbar.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/floating-labels.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <?php  
        include "../componentes/header.php";
      ?>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
    	<div>
      	<h2>Listado Historico de vehiculos</h2>
      <table>
          <tr>
            <th>&nbspPatente&nbsp</th>
            <th>&nbspFecha Ingreso&nbsp</th>
            <th>&nbspFecha Salida&nbsp</th>
            <th>&nbspTotal Cobrado&nbsp</th>
          </tr>
			<?php
      error_reporting(0);
			$archivo = fopen("../archivos/historicoFacturados.txt", "r") or die("Imposible abrir el archivo");
			while(!feof($archivo)) 
			{
		 		$objeto = json_decode(fgets($archivo));
        if (!$objeto == "") {
          echo "<tr>";
          echo "<td>".$objeto->patente."</td>   <td>".date("d-m-y H:i",$objeto->horaIngreso)."</td>   <td>".date("d-m-y H:i",$objeto->horaSalida)."</td>   <td>&nbsp&nbsp".$objeto->totalCobrado."</td></tr>";
        }
			}
			fclose($archivo);
			?>      
		</div>
 	</main>
    <footer class="footer">
      <?php  
        include "../componentes/footer.php";
      ?>
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
