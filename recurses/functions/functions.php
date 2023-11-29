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

function consultaLogin($dni) {
    $sql = "select nombre, apellidos, contraseña from jugadores where dni='$dni'";
    return $sql;
}

function aniadirUser($name, $lastname, $dni, $phone, $email, $password) {
    $bd = conexionBD();

    // Comprobar si el usuario ya existe por su DNI
    $sql = "SELECT dni FROM jugadores WHERE dni='$dni'";
    $user = $bd->query($sql);
    $result = $user->rowCount();

    if ($result) {
        // El usuario ya existe, redirigir con un mensaje de error
        header('Location:../../pages/register.php?error=2');
    } else {

        // Insertar el nuevo usuario con la contraseña cifrada en la base de datos
        $ins = "INSERT INTO jugadores (dni, nombre, apellidos, telefono, contraseña, email) VALUES ('$dni', '$name', '$lastname', '$phone', '$password', '$email')";

        $resultIns = $bd->query($ins);

        if ($resultIns) {
            header('Location: ../../pages/log_in.php?error=1');
        }
    }
}

function consultaReservas($dni) {
    $bd = conexionBD();
    $sql = "select cod_pista, fecha, hora from jugadores_pista where dni='$dni'";
    $select = $bd->query($sql);
    return $select;
}

function deleteReserva($dni, $fecha, $hora) {
    $bd = conexionBD();
    $sql = "delete from jugadores_pista where dni='$dni' and fecha='$fecha' and hora='$hora'";
    $delete = $bd->query($sql);
    if ($delete) {
        header('Location: ../../pages/principal.php');
    }
}

function updatePass($dni, $pass) {
    $bd = conexionBD();
    $sql = "update jugadores set contraseña='$pass' where dni='$dni'";
    $update = $bd->query($sql);
    if ($update) {
        header('Location: ../../pages/log_in.php?error=0');
    }
}
