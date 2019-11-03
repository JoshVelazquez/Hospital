<?php
  include_once "app/Config.inc.php";
  include_once "app/ControlSesion.inc.php";
?>
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
      <ul class="navbar-nav navbar-left">
        <li class="nav-item"><a class="nav-link" href="Medicos.php">Medicos</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Cirugías</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Consultas</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php
        if (ControlSesion::sesionIniciada()) {
      ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo ' ' . $_SESSION['nombreUsuario']; ?>
        </a>
        <div class="dropdown-menu border-info" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Agendar Cita</a>
          <a class="dropdown-item" href="#">Citas Pasadas</a>
          <a class="dropdown-item" href="<?php echo LINK_LOGOUT; ?>">Cerrar Sesion</a>
        </div>
      </li>
      <?php
        }
        else {
        ?>
        <li class="nav-item"><a class="nav-link" href="<?php echo LINK_LOGIN; ?>">Login</a></li>
        <?php
          }
        ?>
      </ul>
    </div>
  </nav>
  <br />