<?php

include '../functions/functions.php';
//echo "hola";
session_start();
if (htmlspecialchars($_POST['password']) != "" && htmlspecialchars($_POST['password2']) != "") {
    //echo " entras";
    $pass = htmlspecialchars($_POST['password']);
    $confirPass = htmlspecialchars($_POST['password2']);
    //echo $pass."     ".$confirPass;
    if ($pass === $confirPass && strlen($pass) == 6) {
        //echo "contraseñas iguales";
        //echo $_SESSION['pass'];
        $pass_hash = hash("sha256", $pass);
        updatePass($_SESSION['pass'], $pass_hash);
    } else {
        header('Location:../../pages/cambiarPass2.php?error=1');
    }
    //borramos la cookie para que vuelva al login y no pueda volver a entrar en la pagina de cambiar la contraseña
} else {
    header('Location:../../pages/cambiarPass2.php?error=1');
}
