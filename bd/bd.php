<?php

class conectar{
    public static function con(){
        $conexion= new mysqli("localhost","root","","series");
        $conexion->set_charset("utf8");
        return $conexion;
    }
}







?>