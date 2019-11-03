<?php
include_once "RepositorioUsuarios.inc.php";
include_once "Usuarios.inc.php";


class ValidadorLogin
{
    private $Usuario;
    private $Error;

    public function __construct($email, $password, $conexion)
    {
        $this -> Error = "";

        if (!$this -> variableIniciada($email) || !$this -> variableIniciada($password)) {
            $this -> Usuario = null;
            $this -> Error = "Debes introducir tu email y tu contrasaña";
        } else {
            $this -> Usuario = RepositorioUsuarios::obtenerUsuarioEmail($conexion, $email);

            if (is_null($this -> Usuario) || !password_verify($password, $this -> Usuario -> getPassword())) {
                $this -> Error = "Datos incorrectos";
            }
        }
    }

    private function variableIniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerUsuario() {
        return $this -> Usuario;
    }

    public function obtenerError() {
        return $this -> Error;
    }

    public function mostrarError() {
        if ($this -> Error !== '') {
            echo "<br><div class='alert alert-danger' role='alert'>";
            echo $this -> Error;
            echo "</div>";
        }
    }
}

