<?php
include_once 'Config.inc.php';
include_once 'Medicos.inc.php';

class RepositorioMedicos
{
    public static function obtenerTodos($conexion)
    {
        $medicos = array();
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM " .NOMBRE_DB.".medicos";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                if(count($resultado))
				{
					foreach ($resultado as $fila)
					{
						$medicos[] = new Medicos(
                            $fila['Id'], $fila['Nombre'], $fila['Apellido'], $fila['Email'], $fila['Especialidad'],
                             $fila['Cedula'], $fila['Cirujano']
                        );
                        echo "<tr>";
                        echo "<td>" .$fila['Id'] . "</td>";
                        echo "<td>" .$fila['Nombre']. "</td>";
                        echo "<td>" .$fila['Apellido'] ."</td>";
                        echo "<td>" .$fila['Email'] ."</td>";
                        echo "<td>" .$fila['Especialidad'] . "</td>";
						echo "<td>" .$fila['Cedula'] ."</td>";
						if ($fila['Cirujano'] > 0) {
							echo "<td>Si</td>";
						}
                        else {
							echo "<td>No</td>";
						}
                        echo "<td><button type='button' class='btn btn-warning btn-sm'>Modificar</button></td>";
                        echo "<td><button type='button' class='btn btn-danger btn-sm'>Eliminar</button></td>";
                        echo "</tr>";
					}
				}
				else
				{
					print("No hay medicos");
				}
            } catch (PDOException $ex) {
                print "ERROR" . $ex -> getMessage();
            }
        }
        return $medicos;
    }

    public static function insertarMedico($conexion, $medico)
	{
		$medicoInsertado = false;

		if(isset($conexion))
		{
			try {
                $sql = "INSERT INTO ".NOMBRE_DB.".medicos(Nombre, Apellido, Email, Especialidad, Cedula, Cirujano) 
                values(:nombre, :apellido, :email, :especialidad, :cedula, :cirujano)";
				$sentencia = $conexion -> prepare($sql);

                $ntemp = $medico -> getNombre();
                $atemp = $medico -> getApellido();
                $etemp = $medico -> getEmail();
                $stemp = $medico -> getEspecialidad();
                $ctemp = $medico -> getNumeroCedula();
                $itemp = $medico -> getEsCirujano();
                $sentencia -> bindParam(':nombre', $ntemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':apellido', $atemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':email', $etemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':especialidad', $stemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':cedula', $ctemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':cirujano', $itemp, PDO::PARAM_STR);

				$medicoInsertado = $sentencia -> execute();
			} catch (PDOException $ex) {
				print "Error: " . $ex -> getMessage();
			}
			return $medicoInsertado;
		}
    }
    public static function existeEmail($conexion, $email)
	{
		$existe = true;

		if(isset($conexion))
		{
			try {
				$sql = "SELECT * FROM ".NOMBRE_DB.".medicos WHERE Email = :email";
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
    public static function existeCedula($conexion, $cedula)
	{
		$existe = true;

		if(isset($conexion))
		{
			try {
				$sql = "SELECT * FROM ".NOMBRE_DB.".medicos WHERE Cedula = :cedula";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(":cedula", $cedula, PDO::PARAM_STR);
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
}