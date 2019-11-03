<?php

include_once "Usuarios.inc.php";

class Medicos
{
    private $Id;
    private $Nombre;
    private $Apellido;
    private $Email;
    private $NumeroCedula;
    private $Especialidad;
    private $Cirujano;

    public function __construct($Id, $Nombre, $Apellido, $Email,
     $NumeroCedula, $Especialidad, $Cirujano)
    {
        $this -> Id = $Id;
        $this -> Nombre = $Nombre;
        $this -> Apellido = $Apellido;
        $this -> Email = $Email;
        $this -> NumeroCedula = $NumeroCedula;
        $this -> Especialidad = $Especialidad;
        $this -> Cirujano = $Cirujano;
    }
    public function setID($Id)
    {
        $this -> Id = $Id;
    }
    public function setNombre($Nombre)
    {
        $this -> Nombre = $Nombre;
    }
    public function setApellido($Apellido)
    {
        $this -> Apellido = $Apellido;
    }
    public function setEmail($Email)
    {
        $this -> Email = $Email;
    }
    public function getID()
    {
        return $this -> Id;
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
    public function setNumeroCedula($NumeroCedula)
    {
        $this -> NumeroCedula = $NumeroCedula;
    }
    public function setEspecialidad($Especialidad)
    {
        $this -> Especialidad = $Especialidad;
    }
    public function setEsCirujano($Cirujano)
    {
        $this -> Cirujano = $Cirujano;
    }
    public function getEsCirujano()
    {
        return $this -> Cirujano;
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
