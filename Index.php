<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" type="text/css" href="css/estilos.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <title>Proyecto Clinica</title>
</head>

<body>
  <nav class="navbar sticky-top navbar-dark bg-info navbar-expand-md shadow">
    <a class="navbar-brand" href="index.php">
      <img src="img/hospital-clinic-plus-logo-7916383C7A-seeklogo.com.png" alt="" width="30" height="30"
        class="d-inline-block align-top" />
      Clínica</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="#">Medicos</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Usuarios</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Cirugías</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Consultas</a></li>
      </ul>
    </div>
  </nav>
  <br />
  <div class="container">
    <div class="jumbotron jumbotron-fluid text-center bg-light border-info">
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
      <div class="col-md-8">
        <div class="card border-info mb-3">
          <div class="card-header">
            <h2>Formulario de registro</h2>
          </div>
          <div class="card-body">
            <form action="">
              <div class="form-group">
                <label for="text">Nombre</label>
                <input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Ej. Juan" />
              </div>
              <div class="form-group">
                <label for="Apellido">Apellido</label>
                <input type="text" name="Apellido" id="Apellido" placeholder="Ej. Perez" class="form-control" />
              </div>
              <div class="form-group">
                <label for="Edad">Edad</label>
                <input type="number" name="Edad" id="Edad" placeholder="Ej. 25" class="form-control" min="1" max="99" />
              </div>
              <label for="">Sexo</label>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" name="Sexo" value="Masculino" class="form-check-input" />M
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" name="Sexo" value="Femenino" class="form-check-input" />F
                </label>
              </div>
              <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" name="Email" id="Email" class="form-control">
              </div>
              <div class="form-group">
                <label for="Telefono">Telefono</label>
                <input type="tel" name="Telefono" id="Telefono" class="form-control" pattern="[0-9]{10}">
              </div>
              <div class="form-group">
                  <label for="Password">Password</label>
                  <input type="password" name="Password" id="Password" class="form-control">
                </div>
              <button type="reset" class="btn btn-dark">limpiar</button>
              <button type="submit" class="btn btn-dark">Enviar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>