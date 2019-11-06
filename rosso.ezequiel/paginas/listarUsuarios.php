<?php  
  include "../acciones/session.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../img/icon.ico">
    <title>Lista de Usuarios</title>
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
      <?php 
      if (isset($_SESSION['idDeUsuario'])) 
      {
        ?>      
    	<div>
      	<h2>Listado de usuarios</h2>
      	<ol>
			<?php

        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario");
        $consulta->execute();     
        $datos= $consulta->fetchAll(PDO::FETCH_ASSOC);    
        // var_dump($datos);
        // die();

        foreach ($datos as $usuario ) 
        {
          // var_dump($usuario );
          echo "<li>Usuario: ".$usuario["nombre"];
          echo "<br>";
        }      
			?>
		</ol>
		</div>
    <?php 
     }
     ?>
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