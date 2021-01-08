<?php
class Citas
{
    private $Id;
    private $IdUsuario;
    private $IdMedico;
    private $Especialidad;
    private $Fecha;
    private $Tipo;

    public function __construct($Id, $IdUsuario, $IdMedico, $Especialidad, $Fecha, $Tipo)
    {
        $this -> Id = $Id;
        $this -> IdUsuario = $IdUsuario;
        $this -> IdMedico = $IdMedico;
        $this -> Especialidad = $Especialidad;
        $this -> Fecha = $Fecha;
        $this -> Tipo = $Tipo;
    }

    public function setId($Id)
    {
        $this -> Id = $Id;
    }

    public function setIdUsuario($IdUsuario)
    {
        $this -> IdUsuario = $IdUsuario;
    }

    public function setIdMedico($IdMedico)
    {
        $this -> IdMedico = $IdMedico;
    }

    public function setEspecialidad($Especialidad)
    {
        $this -> Especialidad = $Especialidad;
    }
    public function setFecha($Fecha)
    {
        $this -> Fecha = $Fecha;
    }

    public function setTipo($Tipo)
    {
        $this -> Tipo = $Tipo;
    }

    public function getId()
    {
        return $this -> Id;
    }

    public function getIdUsuario()
    {
        return $this -> IdUsuario;
    }

    public function getIdMedico()
    {
        return $this -> IdMedico;
    }

    public function getEspecialidad()
    {
        return $this -> Especialidad;
    }

    public function getFecha()
    {
        return $this -> Fecha;
    }

    public function getTipo()
    {
        return $this -> Tipo;
    }
}