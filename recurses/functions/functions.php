<?php

/**
 * Funcion para conectarnos a la base de datos
 * 
 * @return \PDO
 */
function conexionBD() {
    $cadena_conexion = 'mysql:dbname=padel;host=127.0.0.1';
    $usuario = 'root';
    $clave = '';

    try {
        //Se crea la conexión con la base de datos
        $bd = new PDO($cadena_conexion, $usuario, $clave);
        return $bd;
    } catch (Exception $e) {
        echo "Error con la base de datos: " . $e->getMessage();
    }
}

/**
 * Funcion que nos devuelve una sentencia sql en este caso un select
 * 
 * @param string $dni variable de tipo de cadena
 * @return string nos devuelve una sentencia sql para un select
 */
function consultaLogin($dni) {
    $sql = "select nombre, apellidos, contraseña from jugadores where dni='$dni'";
    return $sql;
}

/**
 * Funcion que nos hace una inserccion en la base de datos en este caso un usuario
 * 
 * @param string $name nombre del usuario
 * @param string $lastname apellido del usuario 
 * @param string $dni dni del usuario clave primaria
 * @param string $phone telefono del usuario
 * @param string $email email del usuario
 * @param string $password contraseña cifrada del usuario
 */
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

/**
 * Funcion que nos devuelve una sentencia sql, en este caso un select
 * 
 * @param string $dni dni del usuario que queremos ver de la base de datos
 * @return string nos devuelve la sentencia sql
 */
function consultaReservas($dni) {
    $bd = conexionBD();
    $sql = "select cod_pista, fecha, hora from jugadores_pista where dni='$dni'";
    $select = $bd->query($sql);
    return $select;
}

/**
 * Funcion que hace una eliminacion en la base de datos, delete
 * 
 * @param string $dni dni del usuario para poder eliminar la reserva
 * @param string $fecha fecha de la reserva que vamos a eliminar
 * @param string $hora hora de la reserva que vamo a eliminar
 */
function deleteReserva($dni, $fecha, $hora) {
    $bd = conexionBD();
    $sql = "delete from jugadores_pista where dni='$dni' and fecha='$fecha' and hora='$hora'";
    $delete = $bd->query($sql);
    if ($delete) {
        header('Location: ../../pages/principal.php');
    }
}

/**
 * Funcion que hace una modificación en la base de datos, update
 * 
 * @param string $dni dni del usuario que queremos modificar
 * @param string $pass contraseña cifrada que vamos a modificar
 */
function updatePass($dni, $pass) {
    $bd = conexionBD();
    $sql = "update jugadores set contraseña='$pass' where dni='$dni'";
    $update = $bd->query($sql);
    if ($update) {
        header('Location: ../../pages/log_in.php?error=0');
    }
}
