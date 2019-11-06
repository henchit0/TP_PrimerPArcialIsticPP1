<?php  
  include "../acciones/session.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../img/icon.ico">
    <title>Login</title>
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
        include "../componentes/header.php"
      ?>
    </header>
    <!-- Begin page content -->
    <main role="main" class="container">

      <form action="../acciones/hacerLogin.php" class="form-signin">
      <div class="text-center mb-4">
        <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>
        <?php  
          if (isset($_GET['error'])) 
          {
            if ($_GET['error'] == "camposvacios") {
              echo '<p>Llena todos los campos!</p>';
            }
            else if ($_GET['error'] == "passwordincorrecto") 
            {
              echo '<p>La contraseña es incorrecta!</p>';
            }
            else if ($_GET['error'] == "usuarioincorrecto") 
            {
              echo '<p>El usuario no existe!</p>';
            }
            else if ($_GET['error'] == "contraseñaincorrecta") 
            {
              echo '<p>Contraseña incorrecta!</p>';
            }
          }
          else if (isset($_SESSION['idDeUsuario']))
          {
            echo '<p>Bienvenido!</p>';
          } else '<p>Llena los campos.</p>';
        
        ?>
      </div>
        <input type="text" name="inputUsuario" class="form-control" placeholder="Usuario"autofocus>
        <input type="password" name="inputPassword" class="form-control" placeholder="Password">
      <div class="checkbox mb-3">
        
      </div>
      <button class="btn btn-lg btn-primary btn-block" name="login-submit" type="submit">Ingresar</button>      
    </form>
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
