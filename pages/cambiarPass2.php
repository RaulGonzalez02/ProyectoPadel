<?php
include '../recurses/functions/functions.php';
session_start();
if (!isset($_COOKIE["changeCookie"])) {
    if (htmlspecialchars($_POST['dni']) != "") {
        //echo $_POST['dni'];
        $dni = htmlspecialchars($_POST['dni']);
        $bd = conexionBD();
        $sql = consultaLogin($dni);
        $user = $bd->query($sql);
        //echo $user->rowCount();

        if ($user->rowCount() != 1) {
            header('Location:../pages/cambiarPass1.php?error=1');
        } else {
            $_SESSION['pass'] = $dni;
            setcookie("changeCookie", "1", time() + 360);
        }
    } else {
        header('Location:../pages/cambiarPass1.php?error=1');
    }
}
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
                    <form class="form" action="../recurses/php_files/changePass.php" method="POST">
                        <div class="container__form">
                            <div class="container__forms">
                                <label class="form__label" for="password">Contraseña</label>
                                <input class="form__input" type="password" name="password" id="password" placeholder="Contraseña de al menos 6 caracteres">
                            </div> 
                        </div>
                        <div class="container__form">
                            <div class="container__forms">
                                <label class="form__label" for="password">Repetir Contraseña</label>
                                <input class="form__input" type="password" name="password2" id="password2" placeholder="Repita la contraseña">
                                <?php
                                    $error = htmlspecialchars($_GET["error"]);
                                    if ($error == 1) {
                                        echo "<p class='login__error'>Error: no se ha introducido correctamente las contraseñas.<p>";
                                    }
                                ?>
                            </div> 
                        </div> 
                        <!--
                        <div class="link__login">
                            <a class="link__form" href="../index.php">Volver al Inicio</a>
                            <a class="link__form" href="../pages/log_in.php?error=0">Atrás</a>
                        </div>
                        -->
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
