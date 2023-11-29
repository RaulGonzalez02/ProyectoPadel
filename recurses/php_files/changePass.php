<?php

include '../functions/functions.php';
//echo "hola";
//iniciamos sesion
session_start();
//comprobamos que los campos no estan vacios
if (htmlspecialchars($_POST['password']) != "" && htmlspecialchars($_POST['password2']) != "") {
    //echo " entras";
    $pass = htmlspecialchars($_POST['password']);
    $confirPass = htmlspecialchars($_POST['password2']);
    //echo $pass."     ".$confirPass;
    //comprobamos que ambas contraseñas coinciden y ademas que tienen una logintud mayor o igual a 6 caracteres
    if ($pass === $confirPass && strlen($pass) >= 6) {
        //echo "contraseñas iguales";
        //echo $_SESSION['pass'];
        $pass_hash = hash("sha256", $pass);
        //hacemos el update en la base de datos
        updatePass($_SESSION['pass'], $pass_hash);
    } else {
        header('Location:../../pages/cambiarPass2.php?error=1');
    }
} else {
    header('Location:../../pages/cambiarPass2.php?error=1');
}
