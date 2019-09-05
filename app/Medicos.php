<?php

include_once "Persona.php";

class Medicos extends Persona
{
    private $NumeroCedula;
    private $Especialidad;

    public function __construct($Id, $Nombre, $Apellido, $Edad, $Sexo, $Correo,
     $Telefono, $Password, $NumeroCedula, $Especialidad)
    {
        parent::__construct($Id, $Nombre, $Apellido, $Edad, $Sexo, $Correo, $Telefono, $Password);
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
