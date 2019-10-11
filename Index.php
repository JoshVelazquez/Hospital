<?php
  include_once "Plantillas/Declaracion.inc.php";
  include_once "Plantillas/Navbar.inc.php";
  include_once "app/Conexion.inc.php";
  include_once "app/ValidadorRegistro.inc.php";
  include_once "app/Redireccion.inc.php";

  if (isset($_POST['enviar'])) {
    Conexion :: abrirConexion(); 
    $validador = new validadorRegistro($_POST['Nombre'],$_POST['Apellido'],$_POST['Email'],$_POST['Password'], Conexion::getConexion());
    if($validador -> registroValido())
    {
      $usuario = new Usuarios('', $validador -> getNombre(), $validador -> getApellido(), $validador -> getEmail(), password_hash($validador -> getPassword(), PASSWORD_DEFAULT));
      $usuarioInsertado = RepositorioUsuarios :: insertarUsuario(Conexion :: getConexion(), $usuario);
      if ($usuarioInsertado) {
        Redireccion::redirigir("RegistroCorrecto.php" ."?nombre=" . $usuario ->getNombre());
      }
    }
    Conexion :: cerrarConexion();
  }
  
?>
  <div class="container">
    <div class="jumbotron jumbotron-fluid text-center bg-info rounded">
      <div class="container">
        <h2 class="display-4">Clínica Velázquez</h2>
        <p class="lead">Lo principal es su salud</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/20024.jpg" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
              <img src="img/249336_1.jpg" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
              <img src="img/271885_1.jpg" class="d-block w-100" alt="..." />
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
    <br />
    <div class="row">
      <div class="col-md-6">
        <div class="card border-info mb-3">
          <div class="card-header">
            <h2>Intrucciones</h2>
          </div>
          <div class="card-body">
            <p class="text-justify">
              Para unirte al blog introduce tu nombre, apellido, tu correo el cual debe de ser real ya que lo
              necesitaras para gestionar tu cuenta
              y contraseña, se recomienda que la contraseña tenga letras, numeros y caracteres especiales.
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card border-info mb-3">
          <div class="card-header">
            <h2>Formulario de registro</h2>
          </div>
          <div class="card-body">
            <form action="<?php
					echo($_SERVER['PHP_SELF'])
					?>" method="post">
              <?php
              if (isset($_POST['enviar'])) {
                include_once 'plantillas/RegistroValido.inc.php';
              } else {
                include_once 'plantillas/RegistroVacio.inc.php';
              }
              ?>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.60065680463!2d-103.30526843559895!3d20.645128156140846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b3b7cf9feb79%3A0x45d091a761f9f3a1!2sIMSS%20Hospital%20General%20de%20Zona%2014!5e0!3m2!1ses-419!2smx!4v1569426130731!5m2!1ses-419!2smx"
        width="1200" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
  </div>
  <br>
  <!-- Footer -->
  <footer class="page-footer font-small bg-dark text-white pt-4">
    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">
      <!-- Grid row -->
      <div class="row">
        <!-- Grid column -->
        <div class="text-center col-md-12 mt-md-0 mt-3">
          <!-- Content -->
          <h5 class="text-uppercase">Joshua Stefano velázquez Sánchez</h5>
          <p>Programación para internet.</p>
          <p>Código: 213396132</p>
          <p>Universidad de Guadalajara</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </footer>
<?php
include_once "Plantillas/Cierre.inc.php";
?>