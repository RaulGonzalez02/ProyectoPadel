<?php
include '../recurses/functions/functions.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CHANGE PASSWORD - EBOPADEL</title>
        <link rel="stylesheet" href="../css/cambiarPass.css">
        <link rel="shortcut icon" href="../assets/images/_bc7a8cfb-caf1-4ad6-b28f-bec41282544f.jpg" type="image/x-icon">
    </head>
    <body>
        <div class="container">
            <main class="main">
                <section class="section__form1">
                    <h1 class="form__h1">Cambiar Contraseña</h1>
                    <form class="form" action="./cambiarPass2.php?error=0" method="POST">
                        <div class="container__form">
                            <div class="container__forms">
                                <label class="form__label" for="password">Introduzca su DNI</label>
                                <input class="form__input" type="text" name="dni" id="dni" placeholder="DNI">
                                <?php
                                    $error = htmlspecialchars($_GET["error"]);
                                    if ($error == 1) {
                                        echo "<p class='login__error'>Error: el dni no es correcto<p>";
                                    }
                                ?>
                            </div>
                        </div>
                        <!-- 
                        <div class="container__form">
                            <div class="container__forms">
                                <label class="form__label" for="password">Contraseña</label>
                                <input class="form__input" type="password" name="password" id="password" placeholder="Contraseña">
                            </div> 
                        </div>
                        <div class="container__form">
                            <div class="container__forms">
                                <label class="form__label" for="password">Repetir Contraseña</label>
                                <input class="form__input" type="password" name="password2" id="password2" placeholder="Contraseña">
                            </div> 
                        </div> -->

                        <div class="link__login">
                            <a class="link__form" href="../index.php">Volver al Inicio</a>
                            <a class="link__form" href="../pages/log_in.php?error=0">Atrás</a>
                        </div>
                        <div class="botton__form">
                            <input type="submit" class="form__link">
                        </div>
                    </form>
                </section>
                <section class="section__form">
                    <img class="form__img" src="../assets/images/log_in.jpeg" alt="">
                </section>
            </main>
        </div>
    </body>
</html>
</html>
