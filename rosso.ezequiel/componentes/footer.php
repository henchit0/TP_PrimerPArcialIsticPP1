<?php 
if(isset($_SESSION['idDeUsuario']))
{//solo muestra el menu si estas con la variable de sesión instaciada
?>
	<div class="container">
	  <span class="text-muted">Bienvenido <?php echo $_SESSION['idDeUsuario'];?></span>  
	  <span class="text-muted">Hora de ingreso <?php echo date("d-m-y H:i",$_SESSION['horaIngreso']) ?></span>
	</div>
	<?php 
	  }
	  else
	  {
	?>
	  <div class="container">
	    <span class="text-muted">Bienvenidos al Estacionamiento Rosso</span>  
	  </div>
	<?php
}
?>