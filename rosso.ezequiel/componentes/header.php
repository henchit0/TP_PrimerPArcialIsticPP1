<!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Rosso</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-iconx|"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                  <a class="nav-link" href="/rosso.ezequiel/index.php">Home <span class="sr-only">(current)</span></a>          
            </li>

            <?php 
              if (isset($_SESSION['idDeUsuario']) && $_SESSION['perfil'] == 'admin')
              {
             ?>
                <li class="nav-item">
                  <a class="nav-link" href="/rosso.ezequiel/paginas/ingresoVehiculo.php">Ingresar Vehiculo</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/rosso.ezequiel/paginas/facturarVehiculo.php">Facturar Vehiculo</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/rosso.ezequiel/paginas/listarVehiculos.php">Listar Vehiculos</a>
                </li>
                   
                <li class="nav-item">
                  <a class="nav-link" href="/rosso.ezequiel/paginas/listarUsuarios.php">Listar Usuarios</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/rosso.ezequiel/paginas/historicoVehiculos.php">Historial Vehiculos</a>
                </li>
        
                <li class="nav-item">
                  <a class="nav-link" href="/rosso.ezequiel/acciones/hacerLogout.php">Logout</a>
                </li>
              <?php 
              }
              elseif (isset($_SESSION['idDeUsuario']) && $_SESSION['perfil'] == 'cajero') 
              {                
              ?>            
                <li class="nav-item">
                  <a class="nav-link" href="/rosso.ezequiel/paginas/ingresoVehiculo.php">Ingresar Vehiculo</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/rosso.ezequiel/paginas/facturarVehiculo.php">Facturar Vehiculo</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/rosso.ezequiel/paginas/listarVehiculos.php">Listar Vehiculos</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/rosso.ezequiel/acciones/hacerLogout.php">Logout</a>
                </li>
              <?php  
              }
              else
              {
              ?>
                <li class="nav-item">
                  <a class="nav-link" href="/rosso.ezequiel/paginas/registro.php">Registrate</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/rosso.ezequiel/paginas/login.php">Login</a>
                </li>
              <?php 
              }
              ?>
           
          </ul>
          <!-- <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form> -->
        </div>
      </nav>