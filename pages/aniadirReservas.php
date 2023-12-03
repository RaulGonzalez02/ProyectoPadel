<?php
    //para incluir las funciones que haya en functions.php
    include '../recurses/functions/functions.php';

    //creamos una sesion
    session_start();
    //comprobamos si existe un usuario y lo guardamos en una variable
    if (isset($_SESSION['user'])) {
        $name = $_COOKIE['guardarNombre'];
    } else {
        header('Location: ../pages/log_in.php?error=1');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <!-- INICIO HEAD -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RESERVAR - EBOPADEL</title>
        <link rel="stylesheet" href="../css/reservar.css">
        <link rel="shortcut icon" href="../assets/images/_bc7a8cfb-caf1-4ad6-b28f-bec41282544f.jpg" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <!-- Link to Bootstrap CSS library hosted on a CDN with integrity and crossorigin attributes -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <!-- FIN HEAD -->
    
    <!-- INICIO BODY -->
    <body>
        <!-- INICIO CONTAINER -->
        <div class="container">
            <!-- INICIO MAIN -->
            <main class="main">
                <div class="container__flex">
                    <!-- INICIO IMAGENES PISTA -->
                    <section class="section__pistas">
                        <div class="alert alert-success alert-dismissible fade show alert__container" role="alert">
                            <h2 class="h2__horarios">Reservas Pistas de Padel</h2>
                            <p class="p__horarios">Para reservar, es necesario estar registrado.</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="container__pistascentral">
                            <div class="container__pistas">
                                <img class="img__pistas" src="../assets/images/pistas-padel.jpg" alt="">
                                <img class="img__pistas" src="../assets/images/pistas-padel.jpg" alt="">
                            </div>
                            <div class="container__pistas">
                                <img class="img__pistas" src="../assets/images/pistas-padel.jpg" alt="">
                                <img class="img__pistas" src="../assets/images/pistas-padel.jpg" alt="">
                            </div>
                        </div>
                    </section>
                    <!-- FIN IMAGENES PISTA -->
                    
                    <!-- CONTENEDOR FORMULARIO RESERVAS -->
                    <section class="section__horarios">
                        <h2 class="h2__horarios">Horarios disponibles</h2>
                        <!-- INICIO FORMULARIO -->
                        <form class="form" action="../recurses/php_files/addReservas.php" method="POST">
                            <div class="form__select">
                                <!-- INPUT FECHA -->
                                <input class="select" type="date" name="fecha" id="fecha">
                                <!-- SELECT PISTA -->
                                <select class="select" name="pista" id="pista">
                                    <option value="selecc" disabled selected>Selecciona Pista</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <!-- FORMULARIO HORAS -->
                            <div class="form__reservas">
                                <div class="container__text">
                                    <input name="hora" type="radio" value="17:00:00">
                                    <label class="p__horarios p__horarios--hora">17:00</label>
                                </div>
                            </div>
                            <div class="form__reservas">
                                <div class="container__text">
                                    <input name="hora" type="radio" value="18:00:00">
                                    <label class="p__horarios p__horarios--hora">18:00</label>
                                </div>
                            </div>
                            <div class="form__reservas">
                                <div class="container__text">
                                    <input name="hora" type="radio" value="19:00:00">
                                    <label class="p__horarios p__horarios--hora">19:00</label>
                                </div>
                            </div>
                            <div class="form__reservas">
                                <div class="container__text">
                                    <input name="hora" type="radio" value="20:00:00">
                                    <label class="p__horarios p__horarios--hora">20:00</label>
                                </div>
                            </div>
                            <div class="form__reservas">
                                <div class="container__text">
                                    <input name="hora" type="radio" value="21:00:00">
                                    <label class="p__horarios p__horarios--hora">21:00</label>
                                </div>
                            </div>
                            <div class="form__reservas">
                                <div class="container__text">
                                    <input name="hora" type="radio" value="22:00:00">
                                    <label class="p__horarios p__horarios--hora">22:00</label>
                                </div>
                            </div>
                            <!-- ERRORES -->
                            <?php
                                if (isset($_GET["error"])) {
                                    $error = htmlspecialchars($_GET["error"]);
                                    if ($error == 1) {
                                        echo "<p class='login__error'>Complete todos los campos.<p>";
                                    } else if ($error == 2) {
                                        echo "<p class='login__error'>Fecha incorrecta.<p>";
                                    } else if ($error == 3) {
                                        echo "<p class='login__error'>Pista Ocupada. Por favor, introduzca una nueva.<p>";
                                    }
                                }
                            ?>
                            <!-- BOTÓN DE RESERVAR -->
                            <div class="form__button">
                                <button class="link__reserva" type="submit">Reservar</button>
                            </div>    
                        </form>
                        <!-- FIN FORMULARIO -->
                    </section>
                </div>
                <!-- BOTONES DE VOLVER -->
                <div class="section__botones">
                    <a class="link__botones" href="principal.php">Volver</a>
                    <a class="link__botones" href="./cerrarSesion.php">Cerrar Sesión</a>
                </div>
            </main>
        </div>
    </body>
</html>

