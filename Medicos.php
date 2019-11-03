<?php
    include_once 'app/Conexion.inc.php';
    include_once 'app/RepositorioMedicos.inc.php';
    include_once 'app/ValidadorMedicos.inc.php';
    $titulo = "Medicos";
    include_once 'plantillas/Declaracion.inc.php';
    include_once 'plantillas/Navbar.inc.php';
    include_once 'app/Redireccion.inc.php';

    Conexion :: abrirConexion(); 
    if (isset($_POST['enviar'])) {
        if (isset($_POST["Cirujano"])) {
            $cirujano = true;
         } else {
            $cirujano = false;
         }
        $validador = new validadorMedicos($_POST['Nombre'],$_POST['Apellido'],$_POST['Email'],$_POST['Cedula'],
        $_POST['Especialidad'], $cirujano, Conexion::getConexion());
        if($validador -> registroValido())
        {
          $medico = new Medicos('', $validador -> getNombre(), $validador -> getApellido(), $validador -> getEmail(), 
          $validador -> getCedula(), $validador -> getEspecialidad(), $validador -> getEsCirujano());
          //
          $medicoInsertado = RepositorioMedicos :: insertarMedico(Conexion :: getConexion(), $medico);
          if ($medicoInsertado) {
            Redireccion::redirigir("Medicos.php");
          }
        }
      }
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 mb-3">
                <div class="card border-info">
                    <div class="card-header">
                        <h2>Agregar Medico</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?php
					echo($_SERVER['PHP_SELF'])
					?>" method="post">
                        <?php
                            if (isset($_POST['enviar'])) {
                                include_once 'plantillas/RegistroMedicoValido.inc.php';
                            } else {
                                include_once 'plantillas/RegistroMedicoVacio.inc.php';
                            }
                        ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-info">
                    <div class="card-header">
                        <h2>Medicos Actuales</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="thead-dark">
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>APELLIDO</th>
                                    <th>EMAIL</th>
                                    <th>ESPECIALIDAD</th>
                                    <th>CEDULA</th>
                                    <th>CIRUJANO</th>
                                    <th>MODIFICAR</th>
                                    <th>ELIMINAR</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $medicos = RepositorioMedicos::obtenerTodos(Conexion::getConexion());
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    Conexion :: abrirConexion(); 
    include_once "plantillas/Cierre.inc.php";
?>