<?php  
  include "../acciones/session.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../img/icon.ico">
    <title>Facturar Vehiculo</title>
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
      <form action="../acciones/hacerFacturar.php" class="form-signin">
      <div class="text-center mb-4">
        <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Facturar vehículo</h1>
      </div>
        <?php 
        if (isset($_GET['exito']))
        {        
            echo '<p>Vehiculo facturado!</p>'; 
        }
        else if (isset($_GET['cobrar'])) 
        { 
          $aPagar = $_GET['cobrar'];
          $ingreso = $_GET['ingreso'];
          $salida = $_GET['salida'];
          $estadia = $_GET['estadia'];

          echo "<p>Fecha de ingreso: ".date("d-m-y H:i",$ingreso)."</p><br>";
          echo "<p>Fecha de salida: ".date("d-m-y H:i",$salida)."</p><br>";
          echo "<p>Cantidad de horas de estadia: ".$estadia."</p><br>";
          echo "<p>Total a pagar: $".$aPagar."</p><br>";
        }
        else if (isset($_GET['error'])) 
        {
          echo '<p>No existe un vehiculo con esa patente!</p>';  
        }
        ?>         
        <input type="text" name="inputPatente" class="form-control" placeholder="patente" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Facturar</button>
      
    </form> 
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