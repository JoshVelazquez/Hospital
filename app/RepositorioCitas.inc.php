<?php
include_once "app/Citas.inc.php";

class RepositorioCitas
{
    public function obtenerTodas($conexion)
    {
        $citas = array();
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM " .NOMBRE_DB.".citas";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                if(count($resultado))
				{
					foreach ($resultado as $fila)
					{
						$citas[] = new Citas(
							$fila['id'], $fila['idUsuario'], $fila['idMedico'], $fila['fecha'], $fila['tipo']
						);
					}
				}
				else
				{
					print("No hay citas");
				}
            } catch (PDOException $ex) {
                print "ERROR" . $ex -> getMessage();
            }
        }
        return $citas;
    }
    public static function insertarCita($conexion, $cita)
	{
		$citaInsertada = false;

		if(isset($conexion))
		{
			try {
				$sql = "INSERT INTO ".NOMBRE_DB.".citas(IdUsuario, IdMedico, Especialidad, Fecha, Tipo) values(:idusuario, :idmedico, :especialidad, :fecha, :tipo)";
				$sentencia = $conexion -> prepare($sql);

                $utemp = $cita -> getIdUsuario();
				$mtemp = $cita -> getIdMedico();
				$etemp = $cita -> getEspecialidad();
				$ftemp = $cita -> getFecha();
				$ttemp = $cita -> getTipo();
                $sentencia -> bindParam(':idusuario', $utemp, PDO::PARAM_STR);
				$sentencia -> bindParam(':idmedico', $mtemp, PDO::PARAM_STR);
				$sentencia -> bindParam(':especialidad', $etemp, PDO::PARAM_STR);
				$sentencia -> bindParam(':fecha', $ftemp, PDO::PARAM_STR);
				$sentencia -> bindParam(':tipo', $ttemp, PDO::PARAM_STR);

				$citaInsertada = $sentencia -> execute();
			} catch (PDOException $ex) {
				print "Error: " . $ex -> getMessage();
			}
			return $citaInsertada;
		}
	}

	public static function mostrarTodas($conexion)
	{
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM " .NOMBRE_DB.".citas";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                if(count($resultado))
				{
					foreach ($resultado as $fila)
					{
                        echo "<tr>";
                        echo "<td>" .$fila['Id'] . "</td>";
                        echo "<td>" .$fila['IdUsuario']. "</td>";
						echo "<td>" .$fila['IdMedico'] ."</td>";
						$sql = "SELECT Nombre, Apellido FROM " .NOMBRE_DB. ".medicos WHERE Id =". $fila['IdMedico'];
						$sentencia = $conexion -> prepare($sql);
						$sentencia -> execute();
						$medico = $sentencia -> fetch();
						echo "<td>".$medico['Nombre']." ".$medico['Apellido']."</td>";
						echo "<td>".$fila['Especialidad']."</td>";
                        echo "<td>" .$fila['Fecha'] ."</td>";
                        echo "<td>" .$fila['Tipo'] . "</td>";
					}
				}
				else
				{
					print("No hay citas");
				}
            } catch (PDOException $ex) {
                print "ERROR" . $ex -> getMessage();
            }
        }
	}

	public static function getMedico($Especialidad, $conexion)
	{
		$Medico = null;
		if (isset($conexion)) {
			try {
				$sql = "SELECT * FROM " . NOMBRE_DB . ".medicos WHERE Especialidad = :especialidad AND Activo=1";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> bindParam(':especialidad', $Especialidad, PDO::PARAM_STR);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();
				if (count($resultado)) {
					$indice = array_rand($resultado, 1);
					$medico = $resultado[$indice];
				}
				else {
					$sql = "SELECT * FROM " . NOMBRE_DB . ".medicos WHERE Especialidad = Medico General";
					$sentencia = $conexion -> prepare($sql);
					$sentencia -> execute();
					$resultado = $sentencia -> fetchAll();
					$indice = array_rand($resultado, 1);
					$medico = $resultado[$indice];
				}
			} catch (PDOException $ex) {
				print "ERROR" . $ex -> getMessage();
			}
			return $medico;
		}
	}
}