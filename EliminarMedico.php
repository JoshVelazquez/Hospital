<?php
include_once 'app/Conexion.inc.php';
include_once 'app/Config.inc.php';
include_once 'app/RepositorioMedicos.inc.php';
include_once 'app/Redireccion.inc.php';
if ($_GET['id']) {
    $id = $_GET['id'];
    if (Conexion :: getConexion() == false) {
        Conexion::abrirConexion();
    }
    $conexion = Conexion::getConexion();
    if (isset($conexion)) {
        try {
            $sql = "UPDATE ".NOMBRE_DB.".medicos SET Activo=0 WHERE Id=:id";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> bindParam(":id",$id, PDO::PARAM_STR);
            $sentencia -> execute();
        } catch (PDOException $ex) {
            print "Error: " . $ex -> getMessage();
        }
        Redireccion::redirigir(LINK_MEDICOS);
    }    
}
?>