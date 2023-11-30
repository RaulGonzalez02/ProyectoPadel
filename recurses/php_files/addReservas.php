<?php

    //para incluir las funciones que haya en functions.php
    include '../functions/functions.php';
    
    session_start();
    $actual = date("Y-n-d");
    
    if(isset($_POST['pista']) && isset($_POST['fecha']) && isset($_POST['hora'])){
        //recojo los datos del select de pistas
        $cod_pista = htmlspecialchars($_POST['pista']);

        //recojo los datos de la fecha del calendario
        $fecha = htmlspecialchars($_POST['fecha']);

        //recojo los datos del input de las horas
        $hora = htmlspecialchars($_POST['hora']);

        $dni = $_SESSION['user'];
        
        if($actual <= $fecha){
            insertHoras($dni, $cod_pista, $fecha, $hora);
        }else{
            header("Location: ../../pages/aniadirReservas.php?error=2");
        }
        
        
    }else{
        
        header("Location: ../../pages/aniadirReservas.php?error=1");
    }
    
    
    
    
    

?>
