<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LOG IN - EBOPADEL</title>
        <link rel="stylesheet" href="../css/log_in.css">
        <link rel="shortcut icon" href="../assets/images/_bc7a8cfb-caf1-4ad6-b28f-bec41282544f.jpg" type="image/x-icon">
    </head>
    <body>
        <div class="container">
            <main class="main">
                <section class="section__form1">
                    <h1 class="form__h1">Iniciar Sesión</h1>
                    <form class="form" action="./principal.php" method="POST">
                        <div class="container__form">
                            <div class="container__forms">
                                <label class="form__label" for="dni">DNI</label>
                                <input class="form__input" type="text" name="dni" id="dni" placeholder="DNI">
                            </div>
                        </div>
                        <div class="container__form">
                            <div class="container__forms">
                                <label class="form__label" for="password">Contraseña</label>
                                <input class="form__input" type="password" name="password" id="password" placeholder="Contraseña">
                                <?php
                                    $error = htmlspecialchars($_GET["error"]);
                                    if ($error == 1) {
                                        echo "<p class='login__error'>Error: usuario o contraseña incorrecta<p>";
                                    }
                                ?>
                            </div> 
                        </div>
                        <div class="link__login">
                            <a class="link__form" href="../index.php">Volver al Inicio</a>
                            <a class="link__form" href="../pages/register.php?error=0">No tengo cuenta todavía</a>
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
