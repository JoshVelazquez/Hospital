<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuarios.inc.php';
include_once 'app/Redireccion.inc.php';
if (isset($_GET['nombre']) && !empty($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
}
else {
    ob_start();
    Redireccion::redirigir("localhost/proyecto/index.php");
}
$titulo = "Registro Correcto!";
include_once 'plantillas/Declaracion.inc.php';
include_once 'plantillas/Navbar.inc.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card border-info">
                <div class="card-header">
                    <h2>Registro correcto!</h2>
                </div>
                <div class="card-body">
                    <h2>Gracias por registrarte <b><?php echo $nombre?></b>!</h2><br>
                    <a href="<?php echo LINK_LOGIN; ?>">Ir al login</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "plantillas/Cierre.inc.php";
?>