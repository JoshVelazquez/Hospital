<?php
class Redireccion
{
    public static function redirigir($url)
    {
        header('location:'.$url, true,301);
        ob_end_flush();
        exit();
    }
}