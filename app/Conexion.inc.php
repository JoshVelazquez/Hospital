<?php

class Conexion
{
    private static $Conexion;

    public static function abrirConexion()
    {
        if(!isset(self::$Conexion))
        {
            try
            {
                include_once 'Config.inc.php';
                self::$Conexion = new PDO("mysql:host=".NOMBRE_SERVIDOR."; dname=".NOMBRE_DB,NOMBRE_USUARIO);
                self::$Conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$Conexion -> exec("SET CHARACTER SET utf8");
            } catch (PDOException $ex) {
                echo "Conexion fallida: " . $ex -> getMessage() . "<br>";
            }
        }
    }
    public static function cerrarConexion()
    {
        if (isset(self::$Conexion)) {
            self::$Conexion = null;
        }
    }
    public static function getConexion()
    {
        return self::$Conexion;
    }
}