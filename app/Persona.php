<?php
class Persona
{
    private $Id;
    private $Nombre;
    private $Apellido;
    private $Edad;
    private $Sexo;
    private $Correo;
    private $Telefono;
    private $Password;

    public function __construct($Id, $Nombre, $Apellido, $Edad, $Sexo, $Correo, $Telefono, $Password)
    {
        $this -> Id = $Id;
        $this -> Nombre = $Nombre;
        $this -> Apellido = $Apellido;
        $this -> Edad = $Edad;
        $this -> Sexo = $Sexo;
        $this -> Correo = $Correo;
        $this -> Telefono = $Telefono;
        $this -> Password = $Password;
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
    public function setEdad($Edad)
    {
        $this -> Edad = $Edad;
    }
    public function setSexo($Sexo)
    {
        $this -> Sexo = $Sexo;
    }
    public function setCorreo($Correo)
    {
        $this -> Correo = $Correo;
    }
    public function setTelefono($Telefono)
    {
        $this -> Telefono = $Telefono;
    }
    public function setPassword($Password)
    {
        $this -> Password = $Password;
    }
    public function getID()
    {
        return $this -> Id;
    }
    public function getNombre()
    {
        return $this -> Nombre;
    }
    public function setApellido()
    {
        return $this -> Apellido;
    }
    public function getEdad()
    {
        return $this -> Edad;
    }
    public function getSexo()
    {
        return $this -> Sexo;
    }
    public function getCorreo()
    {
        return $this -> Correo;
    }
    public function getTelefono()
    {
        return $this -> Telefono;
    }
    public function getPassword()
    {
        return $this -> Password;
    }
}
