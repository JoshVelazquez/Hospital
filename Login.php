<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuarios.inc.php';
include_once 'app/Redireccion.inc.php';
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
            <form action="Login.php">
                <div class="form-group">
                    <label for="text">Nombre</label>
                    <input type="text" name="nombre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="text">Nombre</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button type="reset" class="btn btn-dark" name="limpiar">limpiar</button>
                <button type="submit" class="btn btn-dark" name="enviar">Enviar</button>
            </form>
          </div>
        </div>
        </div>
    </div>
</div>
<?php
include_once "plantillas/Cierre.inc.php";
?>