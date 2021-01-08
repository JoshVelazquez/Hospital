<?php
include_once 'Plantillas/Declaracion.inc.php';
include_once 'Plantillas/Navbar.inc.php';
include_once 'app/Config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioCitas.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/Citas.inc.php';
include_once 'app/ValidadorCita.inc.php';
$titulo = "Medicos";
Conexion::abrirConexion();
if (!isset($_SESSION['nombreUsuario']) && !isset($_SESSION['idUsuario'])) {
    Redireccion::redirigir(SERVIDOR);
}
if (isset($_POST['enviar'])) {
    $validador = new validadorCita( $_POST['Fecha'], $_POST['Hora'], $_POST['Especialidad']);
        if($validador -> registroValido())
        {
            $fechaCompleta = $_POST['Fecha'] . " " . $_POST['Hora'];
            $IdMedico = RepositorioCitas::getMedico($validador -> getEspecialidad(), Conexion::getConexion());
            $cita = new Citas('', $_SESSION['idUsuario'], $IdMedico['Id'] , $validador -> getEspecialidad(), 
            $fechaCompleta, $_POST['tipo']);
            $citaInsertada = RepositorioCitas :: insertarCita(Conexion :: getConexion(), $cita);
            if ($citaInsertada) {
                Redireccion::redirigir("Citas.php");
            }
        }
}
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card border-info mb-3">
                    <div class="card-header">
                        <h2>Agendar Cita</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?php
					        echo($_SERVER['PHP_SELF'])
					        ?>" method="post">
                            <div class="form-group">
                                <label for="Especialidad">Especialidad</label>
                                <input list="Especialidades" name="Especialidad" id="Especialidad" placeholder="Ej. Pediatra" class="form-control" />
                                <datalist id="Especialidades">
                                    <option value="Medico General">
                                    <option value="Pediatra">
                                    <option value="Oftamólogo">
                                    <option value="Ginecólogo">
                                    <option value="Cardiólogo">
                                    <option value="Geriatra">
                                    <option value="Dermatólogo">
                                    <option value="Dentista">
                                </datalist>
                            </div>
                            <div class="form-radio">
                                <label for="tipo">Tipo de cita</label>
                                <br>
                                <label class="form-check-label">
                                <input type="radio" class="form-radio-input" name="tipo" value="Cirugia"> Cirugia 
                                </label>

                                <label class="form-check-label">
                                <input type="radio" class="form-radio-input" name="tipo" value="Cita"> Cita 
                                </label>
                            </div>
                            <div class="form-group">
                            <?php
                            $fecha = date("Y-m-d");
                            ?>
                            <label for="Fecha">Fecha</label>
                                <input type="date" name="Fecha" id="Fecha" min="<?php echo $fecha ?>" class="form-control" />
                            </label>
                            </div>
                            <div class="form-group">
                            <label for="Hora">Hora</label>
                                <input type="time" name="Hora" id="Hora" class="form-control" />
                            </label>
                            </div>
                            <button type="submit" class="btn btn-dark" name="enviar">Enviar</button>
                            <button type="reset" class="btn btn-dark" name="limpiar">Limpiar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-info mb-3">
                    <div class="card-header">
                        <h2>Citas</h2>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="thead-dark">
                                    <th>ID</th>
                                    <th>ID USUARIO</th>
                                    <th>ID MEDICO</th>
                                    <th>NOMBRE DOCTOR</th>
                                    <th>ESSPECIALIDAD</th>
                                    <th>FECHA</th>
                                    <th>TIPO</th>
                                </thead>
                                <tbody>
                                    <?php
                                        RepositorioCitas::mostrarTodas(Conexion::getConexion());
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
Conexion::cerrarConexion();
include_once 'Plantillas/Cierre.inc.php';
?>