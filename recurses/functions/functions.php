<?php

function conexionBD() {
    $cadena_conexion = "mysql:dbname=padel;host=127.0.0.1";
    $usuario = "root";
    $clave = "";
    
    try{
        $bd=new PDO($cadena_conexion,$usuario,$clave);
        return true;
    } catch (Exception $ex) {
        return false;
    }
}
