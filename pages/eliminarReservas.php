<?php

//para incluir las funciones que haya en functions.php
include '../recurses/functions/functions.php';
//iniciamos la sesion
session_start();
//nos conectamos al base de datos atraves de la funcion
$bd = conexionBD();
//echo $_SESSION['user'];
//obtemos la fecha atraves de get
$fecha=htmlspecialchars($_GET['fecha']);
//obtemos la hora atraves de get
$hora=htmlspecialchars($_GET['hora']);
//obtenemos el dni que anteriormente hemos guardado en la sesion user
$dni=$_SESSION['user'];
//llamamos a la funcion deleteReserva y le pasamos los parametros que anteriormente hemos guardado en las variables dni, fecha, hora,
deleteReserva($dni, $fecha, $hora);