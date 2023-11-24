<?php

//para incluir las funciones que haya en functions.php
include '../functions/functions.php';

$dni = htmlspecialchars($_POST["dni"]);
$password = htmlspecialchars($_POST["password"]);
//echo $dni . "<br>";
//echo $password;

if ($dni != "" && $password != "") {
    $bd = conexionBD();
    $sql = consultaLogin($dni,$password);
    $users = $bd->query($sql);
    $user = $users->rowCount();
    if ($user == 1) {
        //echo "login correcto";
    } else {
        header('Location:../../pages/log_in.php?error=1');
    }
} else {
    header('Location:../../pages/log_in.php?error=1');
}
