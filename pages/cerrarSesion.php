<?php

session_start();
if (isset($_SESSION['user'])) {
    //echo "existe la session";
    //para borrar todas las sesiones que existan.
    session_unset();
    //para que te lleve al login
    header('Location:./log_in.php?error=0');
    //para que te lleve al index
    //header('Location:../index.php');
}

