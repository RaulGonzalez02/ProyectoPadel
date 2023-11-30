<?php
include '../recurses/functions/functions.php';

?>
<!DOCTYPE html>
<html lang="en">
    <!-- INICIO HEAD -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CHANGE PASSWORD - EBOPADEL</title>
        <link rel="stylesheet" href="../css/cambiarPass.css">
        <link rel="shortcut icon" href="../assets/images/_bc7a8cfb-caf1-4ad6-b28f-bec41282544f.jpg" type="image/x-icon">
    </head>
    <!--FIN HEAD-->
    
    <!--INICIO BODY-->
    <body>
        <!-- INICIO CONTAINER-->
        <div class="container">
            <!--INICIO MAIN-->
            <main class="main">
                <!--INICIO SECTION FORM1-->
                <div class="section__form1">
                    <h1 class="form__h1">Cambiar Contraseña</h1>
                    <!--INICIO FOMR-->
                    <form class="form" action="./cambiarPass2.php?error=0" method="POST">
                        <!--INICIO CONTAINER FORM-->
                        <div class="container__form">
                            <!--INICIO CONTAINER FORMS-->
                            <div class="container__forms">
                                <label class="form__label" >Introduzca su DNI</label>
                                <input class="form__input" type="text" name="dni" id="dni" placeholder="DNI">
                                <?php
                                    $error = htmlspecialchars($_GET["error"]);
                                    //si error es igual a 1 mostramos mensaje de error
                                    if ($error == 1) {
                                        echo "<p class='login__error'>Error: el dni no es correcto<p>";
                                    }
                                ?>
                            </div>
                            <!--FIN CONTAINER FORMS-->
                        </div>
                        <!--FIN CONTAINER FORM-->
                        
                        <!--INICIO LINK LOGIN-->
                        <div class="link__login">
                            <a class="link__form" href="../index.php">Volver al Inicio</a>
                            <a class="link__form" href="../pages/log_in.php?error=0">Atrás</a>
                        </div>
                        <!--FIN LINK LOGIN-->
                        
                        <!-- INICIO BOTTON FORM-->
                        <div class="botton__form">
                            <input type="submit" class="form__link">
                        </div>
                        <!--FIN BOTTON FORM-->
                    </form>
                    <!--FIN FORM-->
                </div>
                <!--FIN SECTION FORM-->
                
                <!--INICIO SECTION FORM IMG-->
                <div class="section__form">
                    <img class="form__img" src="../assets/images/log_in.jpeg" alt="">
                </div>
                <!--FIN SECTION FORM-->
            </main>
            <!--FIN MAIN-->
        </div>
        <!--FIN CONTAINER-->
    </body>
    <!--FIN BODY-->
</html>

