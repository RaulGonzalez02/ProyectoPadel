<?php
    
    //INICIAMOS UNA SESIÓN
    session_start();

    //echo "existe la session";
    //para borrar todas las sesiones que existan.
    $_SESSION = array();
    session_destroy();
    //para que te lleve al login
    header('Location:./log_in.php?error=0');
    setcookie("guardarNombre", "",time()-1);
    //para que te lleve al index
        //header('Location:../index.php');

?>
