<?php

include_once "Usuarios.inc.php";

class Medicos extends Usuarios
{
    private $NumeroCedula;
    private $Especialidad;

    public function __construct($Id, $Nombre, $Apellido, $Correo,
     $Password, $NumeroCedula, $Especialidad)
    {
        parent::__construct($Id, $Nombre, $Apellido, $Correo, $Password);
        $this -> NumeroCedula = $NumeroCedula;
        $this -> Especialidad = $Especialidad;
    }
    public function setNumeroCedula($NumeroCedula)
    {
        $this -> NumeroCedula = $NumeroCedula;
    }
    public function setEspecialidad($Especialidad)
    {
        $this -> Especialidad = $Especialidad;
    }
    public function getNumeroCedula()
    {
        return $this -> NumeroCedula;
    }
    public function getEspecialidad()
    {
        return $this -> Especialidad;
    }
}
