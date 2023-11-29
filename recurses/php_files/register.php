<?php

    //para incluir las funciones que haya en functions.php
    include '../functions/functions.php';

    $name = htmlspecialchars($_POST["name"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $dni = htmlspecialchars($_POST["dni"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    
    $pass = hash("sha256", $password);

    if ($name != "" && $lastname != "" && $dni != "" && $phone != "" && $email != "" && $pass != "") {
        //echo "campos completados";
        $bd= conexionBD();
        aniadirUser($name, $lastname, $dni, $phone, $email, $pass);

    } else {
        header('Location:../../pages/register.php?error=1');
    }
?>