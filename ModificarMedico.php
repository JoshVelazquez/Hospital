<?php
include_once 'app/Conexion.inc.php';
include_once 'app/Config.inc.php';
include_once 'app/RepositorioMedicos.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'Plantillas/Declaracion.inc.php';
include_once 'Plantillas/Navbar.inc.php';
include_once 'app/ValidadorMedicos.inc.php';
if ($_GET['id']) {
    $id = $_GET['id'];
    if (Conexion :: getConexion() == false) {
        Conexion::abrirConexion();
    }
    $conexion = Conexion::getConexion();
    if (isset($conexion)) {
        try {
            $sql = "SELECT * FROM ".NOMBRE_DB.".medicos WHERE Id=:id";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> bindParam(":id",$id, PDO::PARAM_STR);
            $sentencia -> execute();
            $resultado = $sentencia -> fetch();
            $nombre = $resultado['Nombre'];
            $apellido = $resultado['Apellido'];
            $email = $resultado['Email'];
            $especialidad = $resultado['Especialidad'];
            $cedula = $resultado['Cedula'];
            $cirujano =$resultado['Cirujano'];

        } catch (PDOException $ex) {
            print "Error: " . $ex -> getMessage();
        }
    }
}

if (isset($_POST['enviar'])) {
    if (Conexion :: getConexion() == false) {
        Conexion::abrirConexion();
    }
    $conexion = Conexion::getConexion();
    if (isset($conexion)) {
        try {
            if (isset($_POST["Cirujano"])) {
                $cirujano = true;
             } else {
                $cirujano = false;
             }
            $validador = new ValidadorMedicos($id, $_POST['Nombre'],$_POST['Apellido'],$_POST['Email'],$_POST['Cedula'],
            $_POST['Especialidad'], $cirujano, $conexion);
            if ($validador -> registroValido()) {
                $sql = "UPDATE ".NOMBRE_DB.".medicos SET Nombre=:nombre, Apellido=:apellido, Email=:email,
                Cedula=:cedula, Especialidad=:especialidad, Cirujano=:cirujano WHERE Id=:id";
                $sentencia = $conexion -> prepare($sql);
                $ntemp = $_POST['Nombre'];
                $atemp = $_POST['Apellido'];
                $etemp = $_POST['Email'];
                $stemp = $_POST['Especialidad'];
                $ctemp = $_POST['Cedula'];
                
                $sentencia -> bindParam(':nombre', $ntemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':apellido', $atemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':email', $etemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':especialidad', $stemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':cedula', $ctemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':cirujano', $cirujano, PDO::PARAM_STR);
                $sentencia -> bindParam(":id",$id, PDO::PARAM_STR);
                $sentencia -> execute();
                Redireccion::redirigir(LINK_MEDICOS);
            }
        } catch (PDOException $ex) {
            print "Error: " . $ex -> getMessage();
        }
    }    
}
?>
<div class="container">
    <div class="row">  
        <div class="col-md-10">
            <div class="card border-info mb-3">
                <div class="card-header">
                <h2>Formulario de Modificacion</h2>
                </div>
                <div class="card-body">
                    <form action="ModificarMedico.php?id=<?php echo $_GET['id'] ?>" method="post">
                    <?php
                        if (isset($_POST['enviar'])) {
                            include_once 'plantillas/ModificarMedicoValido.inc.php';
                        } else {
                            include_once 'plantillas/ModificarMedicoVacio.inc.php';
                        }
                    ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include_once 'Plantillas/Cierre.inc.php';
?>