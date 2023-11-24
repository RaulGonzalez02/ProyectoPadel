<?php

function conexionBD() {
    $cadena_conexion = 'mysql:dbname=padel;host=127.0.0.1';
    $usuario = 'root';
    $clave = '';

    try {
        //Se crea la conexión con la base de datos
        $bd = new PDO($cadena_conexion, $usuario, $clave);
        // Opcional en MySQL, dependiendo del controlador 
        // de base de datos puede ser obligatorio
        //$bd->closeCursor();
        //echo "Conexión establecida";
        //Se cierra la conexión
        return $bd;
    } catch (Exception $e) {
        echo "Error con la base de datos: " . $e->getMessage();
    }
}

function consultaLogin($dni, $pass){
    $sql = "select nombre, apellidos  from jugador where contraseña='$pass' and dni='$dni'";
    return $sql;
}

function aniadirUser($name,$lastname,$dni,$phone,$email,$password){
    $bd= conexionBD();
    $sql= "select dni from jugador where dni='$dni'";
    $user=$bd->query($sql);
    $result=$user->rowCount();
    if($result){
       header('Location:../../pages/register.php?error=2');
    }else{
        $ins="insert into jugador (dni,nombre,apellidos,telefono,contraseña,email) values ('$dni','$name','$lastname','$phone','$password','$email')";
        $resultIns=$bd->query($ins);
        if($resultIns){
            echo "insert correcto";
        }
    }
}

function calendarioDiasMes($mes){
    $diasMes=[];
    if($mes==2){
        for($i=1;$i<=28;$i++){
            $diasMes[$i]=$i;
        }
    }
}