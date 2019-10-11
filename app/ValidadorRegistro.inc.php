<?php
include_once 'RepositorioUsuarios.inc.php';
class ValidadorRegistro{
    private $Nombre;
    private $Apellido;
	private $Email;
	private $Password;

    private $ErrorNombre;
    private $ErrorApellido;
    private $ErrorEmail;
    private $ErrorPassword;

    private $AvisoInicio;
    Private $AvisoCierre;

    public function __construct($Nombre, $Apellido, $Email, $Password,$Conexion)
    {
		$this -> Nombre = "";
		$this -> Apellido = "";
		$this -> Email = "";
		$this -> Password = "";
        $this -> ErrorNombre = $this -> valNombre($Nombre);
        $this -> ErrorEmail = $this -> valEmail($Conexion, $Email);
        $this -> ErrorApellido = $this -> valApellido($Apellido);
        $this -> ErrorPassword = $this -> valPassword($Password);
        $this -> AvisoInicio = "<br><div class='alert alert-danger'>";
		$this -> AvisoCierre = "</div>";
    }

    private function variableIniciada($variable)
    {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
        
    }
    private function valNombre($nombre)
	{
		if (!$this -> variableIniciada($nombre)) {
			return "Debes escribir un nombre usuario";
		}
		else{
			$this -> Nombre = $nombre;
		}
		if (strlen($nombre) > 45) {
			return "El nombre no puede ser mas grande de 45 caracteres";
		}
		return "";
    }
    private function valApellido($apellido)
	{
		if (!$this -> variableIniciada($apellido)) {
			return "Debes escribir un apellido";
		}
		else{
			$this -> Apellido = $apellido;
		}
		if (strlen($apellido) > 45) {
			return "El apellido no puede ser mas grande de 45 caracteres";
		}
		return "";
    }
    private function valEmail($conexion, $email)
	{
		if (!$this -> variableIniciada($email)) {
			return "Debes escribir un email";
		}
		else{
			$this -> Email = $email;
		}
		if (RepositorioUsuarios :: existeEmail($conexion, $email)) {
			return "Este email ya esta en uso, por favor prueba otro email";
		}
		return "";
    }
    private function valPassword($clave)
	{
		if (!$this -> variableIniciada($clave)) {
			return "Debes escribir una contraseña";
		}
    }
    public function mostrarNombre()
	{
		if ($this -> Nombre != "") {
			echo 'value="' . $this -> Nombre . '"';
		}
	}
	public function mostrarErrorNombre()
	{
		if ($this -> ErrorNombre != "") {
			echo $this -> AvisoInicio . $this -> ErrorNombre . $this -> AvisoCierre;
		}
    }
    public function mostrarApellido()
	{
		if ($this -> Apellido != "") {
			echo 'value="' . $this -> Apellido . '"';
		}
	}
	public function mostrarErrorApellido()
	{
		if ($this -> ErrorApellido != "") {
			echo $this -> AvisoInicio . $this -> ErrorApellido . $this -> AvisoCierre;
		}
	}
	public function mostrarEmail()
	{
		if ($this -> Email != "") {
			echo 'value="' . $this -> Email . '"';
		}
	}
	public function mostrarErrorEmail()
	{
		if ($this -> ErrorEmail != "") {
			echo $this -> AvisoInicio . $this -> ErrorEmail . $this -> AvisoCierre;
		}
    }
    public function mostrarPasword()
	{
		if ($this -> Password != "") {
			echo 'value="' . $this -> Password . '"';
		}
	}
	public function mostrarErrorPassword()
	{
		if ($this -> ErrorPassword != "") {
			echo $this -> AvisoInicio . $this -> ErrorPassword . $this -> AvisoCierre;
		}
    }
    public function registroValido()
	{
		if ($this -> ErrorNombre == "" && $this -> ErrorApellido == "" && $this -> ErrorEmail == "" && $this -> ErrorPassword == "") {
			return true;
		}
		else
		{
			return false;
		}
	}
	public function getNombre()
	{
		return $this -> Nombre;
	}
	public function getApellido()
	{
		return $this -> Apellido;
	}
	public function getEmail()
	{
		return $this -> Email;
	}
	public function getPassword()
	{
		return $this -> Nombre;
	}
}