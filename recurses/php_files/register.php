<?php

    //para incluir las funciones que haya en functions.php
    include '../functions/functions.php';

    $name = htmlspecialchars($_POST["name"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $dni = htmlspecialchars($_POST["dni"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    if ($name != "" && $lastname != "" && $dni != "" && $phone != "" && $email != "" && $password != "") {
        //echo "campos completados";
        $bd= conexionBD();
        aniadirUser($name, $lastname, $dni, $phone, $email, $password);

    } else {
        header('Location:../../pages/register.php?error=1');
    }
?>