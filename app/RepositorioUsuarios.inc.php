<?php
include_once 'Usuarios.inc.php';
include_once "Config.inc.php";
class RepositorioUsuarios
{
    public function obtenerTodos($conexion)
    {
        $usuarios = array();
        if (isset($conexion)) {
            try {
                include_once "Usuarios.inc.php";
                $sql = "SELECT * FROM " .NOMBRE_DB.".usuarios";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                if(count($resultado))
				{
					foreach ($resultado as $fila)
					{
						$usuarios[] = new Usuarios(
							$fila['id'], $fila['nombre'], $fila['apellido'], $fila['email'], $fila['password']
						);
					}
				}
				else
				{
					print("No hay usuarios");
				}
            } catch (PDOException $ex) {
                print "ERROR" . $ex -> getMessage();
            }
        }
        return $usuarios;
    }
    public static function insertarUsuario($conexion, $usuario)
	{
		$usuarioInsertado = false;

		if(isset($conexion))
		{
			try {
				$sql = "INSERT INTO ".NOMBRE_DB.".usuarios(Nombre, Apellido, Email, Password) values(:nombre, :apellido, :email, :password)";
				$sentencia = $conexion -> prepare($sql);

                $ntemp = $usuario -> getNombre();
                $atemp = $usuario -> getApellido();
				$etemp = $usuario -> getEmail();
				$ptemp = $usuario -> getPassword();
                $sentencia -> bindParam(':nombre', $ntemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':apellido', $atemp, PDO::PARAM_STR);
				$sentencia -> bindParam(':email', $etemp, PDO::PARAM_STR);
				$sentencia -> bindParam(':password', $ptemp, PDO::PARAM_STR);

				$usuarioInsertado = $sentencia -> execute();
			} catch (PDOException $ex) {
				print "Error: " . $ex -> getMessage();
			}
			return $usuarioInsertado;
		}
	}
    public static function existeEmail($conexion, $email)
	{
		$existe = true;

		if(isset($conexion))
		{
			try {
				$sql = "SELECT * FROM ".NOMBRE_DB.".usuarios WHERE Email = :email";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(":email", $email, PDO::PARAM_STR);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if(count($resultado))
				{
					$existe = true;
				}
				else {
					$existe = false;
				}
			} catch (PDOException $ex) {
				print "Error: " . $ex -> getMessage();
			}
			return $existe;
		}
    }
    public static function obtenerUsuarioEmail($conexion, $email)
	{
		$usuario = null;

		if (isset($conexion)) {
			try {
				include_once "Usuarios.inc.php";

				$sql = "SELECT * FROM " .NOMBRE_DB. ".usuarios WHERE Email = :email";

				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(":email", $email, PDO::PARAM_STR);
				$sentencia -> execute();
				$resultado = $sentencia -> fetch();
				if (!empty($resultado)) {
					$usuario = new Usuarios($resultado['Id'],
						$resultado['Nombre'],
						$resultado['Apellido'],
						$resultado['Email'],
						$resultado['Password']);
				}
			} catch (PDOException $ex) {
				print "Error" . $ex -> getMessage();
			}
		}
		return $usuario;
	}
}