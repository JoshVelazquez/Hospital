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
                $sql = "SELECT * FROM " .NOMBRE_DB.".medicos WHERE Activo=1";
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
					}
				}
				else
				{
					print("No hay medicos");
				}
				return $resultado;
            } catch (PDOException $ex) {
                print "ERROR" . $ex -> getMessage();
            }
        }
    }
	public static function mostrarTodos($conexion)
	{
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM " .NOMBRE_DB.".medicos WHERE Activo=1";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                if(count($resultado))
				{
					foreach ($resultado as $fila)
					{
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
						
						echo "<td><a href='ModificarMedico.php?id=".$fila['Id']."' 
						class='btn btn-warning btn-sm'>Modificar</a></td>";
						echo "<td><a href='EliminarMedico.php?id=".$fila['Id']."' 
						class='btn btn-danger btn-sm'>Eliminar</a></td>";
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
	public static function modificarMedico($conexion, $medico)
	{
		$modificado = false;
		if (isset($conexion)) {
			try {
				$sql = "UPDATE ".NOMBRE_DB.".medicos SET Nombre=:nombre, Apellido=:apellido, Email=:email
				Especialidad:especialidad, Cedula=:cedula, Cirujano:=cirujano WHERE Id=:id";
				$sentencia = $conexion -> prepare($sql);
				$dtemp = $medico -> getId();
				$ntemp = $medico -> getNombre();
                $atemp = $medico -> getApellido();
                $etemp = $medico -> getEmail();
                $stemp = $medico -> getEspecialidad();
                $ctemp = $medico -> getNumeroCedula();
				$itemp = $medico -> getEsCirujano();
				$sentencia -> bindParam(':id', $dtemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':nombre', $ntemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':apellido', $atemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':email', $etemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':especialidad', $stemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':cedula', $ctemp, PDO::PARAM_STR);
				$sentencia -> bindParam(':cirujano', $itemp, PDO::PARAM_STR);

				$modificado = $sentencia -> execute();
			} catch (PDOException $ex) {
				print "Error: " . $ex -> getMessage();
			}
			return $modificado;
		}
	}
	public static function eliminarMedico($conexion, $id)
	{
		$eliminado = false;
		if (isset($conexion)) {
			try {
				$sql = "UPDATE ".NOMBRE_DB.".medicos SET Activo=0 WHERE Id=:id";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(":id",$id, PDO::PARAM_STR);
				$eliminado = $sentencia -> execute();
			} catch (PDOException $ex) {
				print "Error: " . $ex -> getMessage();
			}
			return $eliminado;
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
	public static function existeEmailModificar($conexion, $email, $id)
	{
		$existe = true;

		if(isset($conexion))
		{
			try {
				$sql = "SELECT * FROM ".NOMBRE_DB.".medicos WHERE Email = :email AND Id != :id";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(":email", $email, PDO::PARAM_STR);
				$sentencia -> bindParam(":id", $id, PDO::PARAM_STR);
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
	public static function existeCedulaModificar($conexion, $cedula, $id)
	{
		$existe = true;

		if(isset($conexion))
		{
			try {
				$sql = "SELECT * FROM ".NOMBRE_DB.".medicos WHERE Cedula = :cedula AND Id != :id";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(":cedula", $cedula, PDO::PARAM_STR);
				$sentencia -> bindParam(":id", $id, PDO::PARAM_STR);
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