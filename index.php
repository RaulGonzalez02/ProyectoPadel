<?php
    include './recurses/functions/functions.php';
    session_start();
    $_SESSION = array();
    session_destroy();
    setcookie("guardarNombre", "",time()-1);
?>
<!doctype html>
<html lang="es">
    <!-- INICIO HEAD -->
    <head>
        <title>EBOPADEL</title>
        <link rel="shortcut icon" href="assets/images/_bc7a8cfb-caf1-4ad6-b28f-bec41282544f.jpg" type="image/x-icon">
        <link rel="stylesheet" href="./css/style.css" >
    </head>
    <!-- FIN HEAD -->

    <!-- INICIO BODY -->
    <body>
        <!-- INICIO CONTAINER -->
        <div class="container">
            <img src="assets/images/_bc7a8cfb-caf1-4ad6-b28f-bec41282544f.jpg" alt="" class="container__logo">
            <h1 class="container__title">Reserva tu pista de padel</h1>
            <h2 class="container__subtitle">Vivimos el deporte contigo</h2>
            <a href="./pages/log_in.php?error=0" class="link__botones">Realiza tu reserva</a>
        </div>
        <!-- FIN CONTAINER -->
    </body>
    <!-- FIN BODY -->
</html>