<?php

    //para incluir las funciones que haya en functions.php
    include '../functions/functions.php';
    //inicializamos las variables
    $name = htmlspecialchars($_POST["name"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $dni = htmlspecialchars($_POST["dni"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    //ciframos la contraseña
    $pass = hash("sha256", $password);
    //comprobamos que todos los campos estan completados
    if ($name != "" && $lastname != "" && $dni != "" && $phone != "" && $email != "" && $pass != "") {
        //echo "campos completados";
        $bd = conexionBD();
        if ($bd != null) {
            aniadirUser($name, $lastname, $dni, $phone, $email, $pass);
        } else {
            header('Location:../../pages/register.php?error=1');
        }
    } else {
        header('Location:../../pages/register.php?error=1');
    }
?>