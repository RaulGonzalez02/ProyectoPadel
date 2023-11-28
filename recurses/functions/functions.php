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
        $sql = "select nombre, apellidos  from jugadores where contraseña='$pass' and dni='$dni'";
        return $sql;
    }

    function aniadirUser($name, $lastname, $dni, $phone, $email, $password){
        $bd = conexionBD();

        // Comprobar si el usuario ya existe por su DNI
        $sql = "SELECT dni FROM jugadores WHERE dni='$dni'";
        $user = $bd->query($sql);
        $result = $user->rowCount();

        if($result) {
            // El usuario ya existe, redirigir con un mensaje de error
            header('Location:../../pages/register.php?error=2');
        } else {
            // Generar el hash de la contraseña
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insertar el nuevo usuario con la contraseña cifrada en la base de datos
            $ins = "INSERT INTO jugadores (dni, nombre, apellidos, telefono, contraseña, email) VALUES ('$dni', '$name', '$lastname', '$phone', '$hashedPassword', '$email')";

            $resultIns = $bd->query($ins);

            if($resultIns){
                 header('Location: ../../pages/log_in.php?error=2');
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
?>