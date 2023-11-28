<?php

//para incluir las funciones que haya en functions.php
include '../functions/functions.php';
session_start();
if(isset($_POST['delete'])){
    $delete= htmlspecialchars($_POST['delete']);
    $fecha_hora= explode(' ', $delete);
    //echo $fecha_hora[1];
    //echo $_SESSION['user'];
    eliminarReserva($fecha_hora[0], $fecha_hora[1], $_SESSION['user']);
}else{
    header('Location:../../pages/eliminarReservas.php');
}