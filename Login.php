<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuarios.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSesion.inc.php';

if(ControlSesion::sesionIniciada())
{
    Redireccion::redirigir(SERVIDOR);
}
if (isset($_POST['login'])) {
  Conexion::abrirConexion();
  
  $validador = new ValidadorLogin($_POST['email'], $_POST['password'], Conexion::getConexion());
  
  if ($validador -> obtenerError() === '' &&
          !is_null($validador -> obtenerUsuario())) {
      ControlSesion::iniciarSesion(
              $validador -> obtenerUsuario() -> getId(),
              $validador -> obtenerUsuario() -> getNombre());
      Redireccion::redirigir(SERVIDOR);
  }
  
  Conexion::cerrarConexion();
}
$titulo = "Login";
include_once 'plantillas/Declaracion.inc.php';
include_once 'plantillas/Navbar.inc.php';
?>
<div class="container">
    <div  class="row">
        <div class="col-md-6">
        <div class="card border-info mb-3">
          <div class="card-header">
            <h2>Intrucciones</h2>
          </div>
          <div class="card-body">
            <p class="text-justify">
              Ingresa tu correo electronico y tu contraseña.
            </p>
          </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="card border-info mb-3">
          <div class="card-header">
            <h2>Datos</h2>
          </div>
          <div class="card-body">
            <form action="<?php echo LINK_LOGIN; ?>" method="post">
                <div class="form-group">
                    <label for="text">Email</label>
                    <input type="email" name="email" placeholder="Ej. JuanPerez@gmail.com" class="form-control" <?php
                        if (isset($_POST['login']) && isset($_POST['email']) && !empty($_POST['email'])) {
                            echo 'value="' . $_POST["email"] . '"';
                        } ?>>
                </div>
                <div class="form-group">
                    <label for="text">Contraseña</label>
                    <input type="password" name="password" placeholder="******" class="form-control">
                </div>
                <?php
                  if (isset($_POST['login'])) {
                    $validador -> mostrarError();
                  }
                ?>
                <button type="reset" class="btn btn-dark" name="limpiar">limpiar</button>
                <button type="submit" class="btn btn-dark" name="login">Enviar</button>
            </form>
          </div>
        </div>
        </div>
    </div>
</div>
<?php
include_once "plantillas/Cierre.inc.php";
?>