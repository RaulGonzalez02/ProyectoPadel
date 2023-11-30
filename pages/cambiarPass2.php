<?php
include '../recurses/functions/functions.php';
//iniciamos sesion
session_start();
//comprobamos que existe la cookie changeCookie
if (!isset($_COOKIE["changeCookie"])) {
    //comprobamos que el campo dni tiene contenido
    if (htmlspecialchars($_POST['dni']) != "") {
        //echo $_POST['dni'];
        $dni = htmlspecialchars($_POST['dni']);
        $bd = conexionBD();
        $sql = consultaLogin($dni);
        $user = $bd->query($sql);
        //echo $user->rowCount();
        //comprobamos que la consulta devuelve 1
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
    <!--INICIO HEAD-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CHANGE PASSWORD - EBOPADEL</title>
        <link rel="stylesheet" href="../css/cambiarPass.css">
        <link rel="shortcut icon" href="../assets/images/_bc7a8cfb-caf1-4ad6-b28f-bec41282544f.jpg" type="image/x-icon">
    </head>
    <!--FIN HEAD-->
    <body>
        <!--INICIO CONTAINER-->
        <div class="container">
            <!--INICIO MAIN-->
            <main class="main">
                <!--INICIO SECTION FORM-->
                <div class="section__form1">
                    <h1 class="form__h1">Cambiar Contraseña</h1>
                    <!--INICIO FORM-->
                    <form class="form" action="../recurses/php_files/changePass.php" method="POST">
                        <!--INICIO CONTAINER FORM-->
                        <div class="container__form">
                            <!--INICIO CONTAINER FORMS-->
                            <div class="container__forms">
                                <label class="form__label">Contraseña</label>
                                <input class="form__input" type="password" name="password" id="password" placeholder="Contraseña de al menos 6 caracteres">
                            </div> 
                            <!--FIN CONTAINER FORMS-->
                        </div>
                        <!--FIN CONTAINER FORM-->
                        
                        <!--INICIO CONTAINER FORM-->
                        <div class="container__form">
                            <!--INICIO CONTAINER FORMS-->
                            <div class="container__forms">
                                <label class="form__label">Repetir Contraseña</label>
                                <input class="form__input" type="password" name="password2" id="password2" placeholder="Repita la contraseña">
                                <?php
                                    $error = htmlspecialchars($_GET["error"]);
                                    //comprobamos que error es igual a 1 y mostramos un mensaje de error
                                    if ($error == 1) {
                                        echo "<p class='login__error'>Error: no se ha introducido correctamente las contraseñas.<p>";
                                    }
                                ?>
                            </div> 
                            <!--FIN CONTAINER FORMS-->
                        </div> 
                        <!--FIN CONTAINER FORM-->
                        
                        <!--INICIO BOTTON FORM-->
                        <div class="botton__form">
                            <input type="submit" class="form__link">
                        </div>
                        <!--FIN BOTTON FORM-->
                    </form>
                    <!-- FIN FORM-->
                </div>
                <!--FIN SECTION FORM-->
                
                <!--INICIO SECTION FORM IMG-->
                <div class="section__form">
                    <img class="form__img" src="../assets/images/log_in.jpeg" alt="">
                </div>
                <!--FIN SECTION FORM IMG-->
            </main>
            <!--FIN MAIN-->
        </div>
        <!--FIN CONTAINER-->
    </body>
    <!--FIN BODY-->
</html>
