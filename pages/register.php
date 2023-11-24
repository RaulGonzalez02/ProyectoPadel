<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>REGISTER - EBOPADEL</title>
        <link rel="stylesheet" href="../css/register.css">
        <link rel="shortcut icon" href="../assets/images/_bc7a8cfb-caf1-4ad6-b28f-bec41282544f.jpg" type="image/x-icon">
    </head>
    <body>
        <div class="container">
            <main class="main">
                <section class="section__form">
                    <img class="form__img" src="../assets/images/register.jpeg" alt="">
                </section>
                <section class="section__form1">
                    <h1 class="form__h1">Registro</h1>
                    <form class="form" action="../recurses/php_files/register.php" method="post">
                        <div class="container__form">
                            <div class="container__forms">
                                <label class="form__label" for="name">Nombre</label>
                                <input class="form__input" type="text" name="name" id="name" placeholder="Nombre">
                            </div>
                            <div class="container__forms">
                                <label class="form__label" for="lastname">Apellidos</label>
                                <input class="form__input" type="text" name="lastname" id="lastname" placeholder="Apellidos">
                            </div>
                        </div>
                        <div class="container__form">
                            <div class="container__forms">
                                <label class="form__label" for="dni">DNI</label>
                                <input class="form__input" type="text" name="dni" id="dni" placeholder="DNI">
                            </div>
                            <div class="container__forms">
                                <label class="form__label" for="phone">Número de teléfono</label>
                                <input class="form__input" type="text" name="phone" id="phone" placeholder="Teléfono">
                            </div>
                        </div>
                        <div class="container__form">
                            <div class="container__forms">
                                <label class="form__label" for="email">Correo</label>
                                <input class="form__input" type="email" name="email" id="email" placeholder="Email">
                            </div>
                            <div class="container__forms">
                                <label class="form__label" for="password">Contraseña</label>
                                <input class="form__input" type="password" name="password" id="password" placeholder="Contraseña">
                            </div> 
                        </div>
                        <?php
                        $error = htmlspecialchars($_GET["error"]);
                        if ($error == 1) {
                            echo "<p class='register__error'>Error: complete todos los campos<p>";
                        } else if ($error == 2) {
                            echo "<p class='register__error'>Error: usuario ya registrado<p>";
                        }
                        ?>
                        <div class="link__login">
                            <a class="link__form" href="../pages/log_in.php?error=0">Ya estoy registrado</a>
                        </div>
                        <div class="botton__form">
                            <input type="submit" class="form__link">
                        </div>
                    </form>
                </section>
            </main>
        </div>
    </body>
</html>
