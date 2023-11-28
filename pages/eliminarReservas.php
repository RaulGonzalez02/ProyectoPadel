<?php

//para incluir las funciones que haya en functions.php
include '../recurses/functions/functions.php';
session_start();
$bd = conexionBD();
//echo $_SESSION['user'];
$fecha=htmlspecialchars($_GET['fecha']);
$hora=htmlspecialchars($_GET['hora']);
$dni=$_SESSION['user'];
deleteReserva($dni, $fecha, $hora);