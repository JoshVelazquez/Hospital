<?php

class ValidadorMedicos
{
    private $Nombre;
    private $Apellido;
    private $Email;
    private $Cedula;
    private $Especialidad;
    private $Cirujano;

    private $ErrorNombre;
    private $ErrorApellido;
    private $ErrorEmail;
    private $ErrorCedula;
    private $ErrorEspecialidad;

    private $AvisoInicio;
    Private $AvisoCierre;

    public function __construct($Nombre, $Apellido, $Email, $Cedula, $Especialidad, $Cirujano, $Conexion)
    {
        $this -> Nombre = "";
		$this -> Apellido = "";
        $this -> Email = "";
        $this -> Cedula = "";
        $this -> Especialidad = "";
        $this -> Cirujano = $Cirujano;
        $this -> ErrorNombre = $this -> valNombre($Nombre);
        $this -> ErrorEmail = $this -> valEmail($Conexion, $Email);
        $this -> ErrorApellido = $this -> valApellido($Apellido);
        $this -> ErrorCedula = $this -> valCedula($Conexion, $Cedula);
        $this -> ErrorEspecialidad = $this -> valEspecialidad($Especialidad);
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
			return "Debes escribir un nombre";
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
		if (RepositorioMedicos :: existeEmail($conexion, $email)) {
			return "Este email ya esta en uso, por favor prueba otro email";
		}
		return "";
    }
    private function valCedula($conexion, $cedula)
    {
        if (!$this -> variableIniciada($cedula)) {
			return "Debes escribir una cedula valida";
		}
		else{
			$this -> Cedula = $cedula;
		}
		if (strlen($cedula) != 10) {
			return "La cedula deben ser 10 caracteres exactos";
        }
        if(RepositorioMedicos :: existeCedula($conexion, $cedula))
        {
            return "Esta cedula ya esta registrada por favor pruebe otra";
        }
		return "";
    }
    private function valEspecialidad($Especialidad)
    {
        if (!$this -> variableIniciada($Especialidad)) {
			return "Debes escribir una especialidad valida";
        }
        else {
            $this -> Especialidad = $Especialidad;
        }
        return "";
    }
    public function mostrarErrorNombre()
	{
		if ($this -> ErrorNombre != "") {
			echo $this -> AvisoInicio . $this -> ErrorNombre . $this -> AvisoCierre;
		}
    }
    public function mostrarErrorApellido()
	{
		if ($this -> ErrorApellido != "") {
			echo $this -> AvisoInicio . $this -> ErrorApellido . $this -> AvisoCierre;
		}
    }
    public function mostrarErrorEmail()
	{
		if ($this -> ErrorEmail != "") {
			echo $this -> AvisoInicio . $this -> ErrorEmail . $this -> AvisoCierre;
		}
    }
    public function mostrarErrorCedula()
	{
		if ($this -> ErrorCedula != "") {
			echo $this -> AvisoInicio . $this -> ErrorCedula . $this -> AvisoCierre;
		}
    }
    public function mostrarErrorEspecialidad()
	{
		if ($this -> ErrorEspecialidad != "") {
			echo $this -> AvisoInicio . $this -> ErrorEspecialidad . $this -> AvisoCierre;
		}
    }
    public function registroValido()
	{
        if ($this -> ErrorNombre == "" && $this -> ErrorApellido == "" && $this -> ErrorEmail == "" 
        && $this -> ErrorCedula == "" && $this -> ErrorEspecialidad == "") {
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
	public function getCedula()
	{
		return $this -> Cedula;
    }
    public function getEspecialidad()
    {
        return $this -> Especialidad;
    }
    public function getEsCirujano()
    {
        return $this -> Cirujano;
    }
}