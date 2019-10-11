<?php
class Usuarios
{
    private $Id;
    private $Nombre;
    private $Apellido;
    private $Email;
    private $Password;

    public function __construct($Id, $Nombre, $Apellido, $Email,  $Password)
    {
        $this -> Id = $Id;
        $this -> Nombre = $Nombre;
        $this -> Apellido = $Apellido;
        $this -> Email = $Email;
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
    public function setEmail($Email)
    {
        $this -> Email = $Email;
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
        return $this -> Password;
    }
}
