<?php

class ValidadorCita
{
    private $Fecha;
    private $Hora;
    private $Especialidad;

    private $ErrorFecha;
    private $ErrorHora;
    private $ErrorEspecialidad;

    private $AvisoInicio;
    Private $AvisoCierre;

    public function __construct($Fecha, $Hora, $Especialidad)
    {
        $this -> Fecha = "";
        $this -> Hora = "";
        $this -> Especialidad = "";
        $this -> ErrorFecha = $this -> valFecha($Fecha);
        $this -> ErrorHora = $this -> valHora($Hora);
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

    private function valFecha($Fecha)
    {
        if (!$this -> variableIniciada($Fecha)) {
			return "Debes escribir una fecha";
        }
        else {
            $this -> Fecha = $Fecha;
        }
        return "";
    }

    private function valHora($Hora)
    {
        if (!$this -> variableIniciada($Hora)) {
			return "Debes escribir una hora";
        }
        else {
            $this -> Hora = $Hora;
        }
        return "";
    }

    private function valEspecialidad($Especialidad)
    {
        if (!$this -> variableIniciada($Especialidad)) {
			return "Debes escribir una especialidad";
        }
        else {
            $this -> Especialidad = $Especialidad;
        }
        return "";
    }

    public function registroValido()
	{
        if ($this -> ErrorFecha == "" && $this -> ErrorHora == "" && $this -> ErrorEspecialidad == "" ) {
			return true;
		}
		else
		{
			return false;
		}
	}

    public function getFecha()
    {
        return $this -> Fecha;
    }

    public function getHora()
    {
        return $this -> Hora;
    }

    public function getEspecialidad()
    {
        return $this -> Especialidad;
    }
}