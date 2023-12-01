<?php
    //borramos la cookie changeCookie
    setcookie("changeCookie", "", time() - 1);
?>
<!DOCTYPE html>
<html lang="en">
    <!-- INICIO head -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LOG IN - EBOPADEL</title>
        <link rel="stylesheet" href="../css/log_in.css">
        <link rel="shortcut icon" href="../assets/images/_bc7a8cfb-caf1-4ad6-b28f-bec41282544f.jpg" type="image/x-icon">
    </head>
    <!-- FIN HEAD -->

    <!-- INICIO BODY -->
    <body>
        <!-- INICIO CONTAINER -->
        <div class="container">
            <!-- INICIO MAIN -->
            <main class="main">
                <!-- INICIO SECTION FORM 1 -->
                <section class="section__form1">
                    <h1 class="form__h1">Iniciar Sesión</h1>
                    <!-- INICIO FORM-->
                    <form class="form" action="./principal.php" method="POST">
                        <!-- INICIO CONTAINER FORM-->
                        <div class="container__form">
                            <!-- INICIO CONTAINER FORMS-->
                            <div class="container__forms">
                                <label class="form__label" for="dni">DNI</label>
                                <input class="form__input" type="text" name="dni" id="dni" placeholder="DNI">
                            </div>
                            <!-- FIN CONTAINER FORMS-->
                        </div>
                        <!-- FIN CONTAINER FORM-->

                        <!-- INICIO CONTAINER FORM-->
                        <div class="container__form">
                            <!-- INICIO CONTAINER FORMS-->
                            <div class="container__forms">
                                <label class="form__label" for="password">Contraseña</label>
                                <input class="form__input" type="password" name="password" id="password" placeholder="Contraseña">
                                <?php
                                    $error = htmlspecialchars($_GET["error"]);
                                    //si error es 1 mostramos mensaje de error
                                    if ($error == 1) {
                                        echo "<p class='login__error'>Error: usuario o contraseña incorrecta<p>";
                                    } else if ($error == 2) {
                                        echo "<p class='login__resgiter'>Usuario Registrado<p>";
                                    }
                                ?>
                            </div> 
                            <!-- FIN CONTAINER FORMS-->
                        </div>
                        <!-- FIN CONTAINER FORM-->

                        <!--INICIO LINK LOGIN-->
                        <div class="link__login">
                            <a class="link__form" href="../index.php">Volver al Inicio</a>
                            <a class="link__form" href="../pages/cambiarPass1.php?error=0">He olvidado la contraseña</a>
                            <a class="link__form" href="../pages/register.php?error=0">No tengo cuenta</a>
                        </div>
                        <!--FIN LINK LOGIN-->

                        <!--INICIO BOTTON FORM-->
                        <div class="botton__form">
                            <input type="submit" class="form__link">
                        </div>
                        <!--FIN BOTTON FORM-->
                    </form>
                    <!-- FIN FORM-->
                </section>
                <!-- FIN SECTION FORM 1 -->
                <!-- INICIO SECTION FORM  -->
                <div class="section__form">
                    <img class="form__img" src="../assets/images/log_in.jpeg" alt="">
                </div>
                <!-- FIN SECTION FORM -->
            </main>
            <!-- FIN MAIN -->
        </div>
        <!-- INICIO CONTAINER -->
    </body>
    <!-- FIN BODY -->
</html>