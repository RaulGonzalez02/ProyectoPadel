<?php
    //para incluir las funciones que haya en functions.php
    include '../recurses/functions/functions.php';
    //inicio de la sesion
    session_start();
    //comprobamos que no existe la sesion user
    if (!isset($_SESSION['user'])) {
        $dni = htmlspecialchars($_POST["dni"]);
        $password = htmlspecialchars($_POST["password"]);
        //comprobamos que los campos dni y password no esten vacios
        if ($dni != "" && $password != "") {
            //ciframos la contraseña
            $pass_hash = hash("sha256", $password);
            //nos conectamos a la base de datos
            $bd = conexionBD();
            //guardamos la sentencia sql para luego utilizarla
            $users = consultaLogin($dni);
            if (gettype($users) == null) {
                header('Location: ../pages/log_in.php?error=1');
            } else {
                $user=$users->rowCount();
            }

            //Comprueba que la consulta nos ha devuelto solo una 1 fila que es la que indica que no hay ningun usuario repetido.
            if ($user == 1) {
                $name;
                $hashed_password;
                //Sacamos del usuario su contraseña cifrada
                foreach ($users as $u) {
                    $name = $u['nombre'];
                    $hashed_password = $u['contraseña'];
                }
                //verificamos la contraseña introducida en el login con la cifrada con la funcion la verifica
                if ($pass_hash == $hashed_password) {

                    //Echo "login correcto";
                    //Crea la cookie para almacenar el nombre del usuario que expira en 20 dias
                    setcookie("guardarNombre", $name, time() + 20 * 24 * 60 * 60);
                    //crea la sesion user donde almacenamos el dni
                    $_SESSION['user'] = $dni;
                }
                //si la contraseña que nos ha pasado no coincide con la de la base de datos lo redericcionamos al login
                else {
                    header('Location: ../pages/log_in.php?error=1');
                }
            }
            //si la consulta nos devuelve más o menos lineas que no sea 1 lo redericcionamos al login
            else {
                header('Location: ../pages/log_in.php?error=1');
            }
        }
        //si los campos estan vacios lo redericcionamos al login
        else {
            header('Location:../pages/log_in.php?error=1');
        }
    }
    //si la sesion urser existe guardamos el nombre del usuario en la cookie
    else {
        $name = htmlspecialchars($_COOKIE['guardarNombre']);
    }
?>

<!doctype html>
<html lang="es">
    <!-- INICIO HEAD -->
    <head>
        <title>PRINCIPAL - EBOPADEL</title>
        <link rel="shortcut icon" href="../assets/images/_bc7a8cfb-caf1-4ad6-b28f-bec41282544f.jpg" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <!-- Link to Bootstrap CSS library hosted on a CDN with integrity and crossorigin attributes -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/principal.css" />
    </head>
    <!-- FIN HEAD -->
    <!-- INICIO BODY -->
    <body>
        <!-- INICIO CONTAINER -->
        <div class="container">
            <h1 class="principal__title">Bienvenido/a <?php echo ucfirst($name) ?></h1>
            <h2 class="h2__reservas">RESERVAS</h2>
            <!-- INICIO SECTION -->
            <div class="reservas__section">
                <!-- INICIO TABLA -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Pista</th>
                            <th scope="col">Día</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Cancelar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $reservas = consultaReservas($_SESSION['user']);
                            if ($reservas->rowCount() > 0) {
                                $fila = 1;
                                foreach ($reservas as $reserva) {
                                    echo "<tr>";
                                    echo "<th scope='row'>" . $reserva['cod_pista'] . "</th>";
                                    echo "<td>" . $reserva['fecha'] . "</td>";
                                    echo "<td>" . $reserva['hora'] . "</td>";
                                    echo "<td><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                                                <i class='fa-solid fa-x eliminar'></i>
                                            </button>
                                            <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Eliminar Reserva</h1>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                        </div>
                                                        <div class='modal-body'>¿Esta seguro que quiere elimanar la reserva seleccionada? Si esta seguro pulse confirmar, si no
                                                            lo esta pulse cancelar.
                                                        </div>
                                                        <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                                        <a href='./eliminarReservas.php?fecha=" . $reserva['fecha'] . "&hora=" . $reserva['hora'] . "&cod_pista=" . $reserva['cod_pista'] . "' class='btn btn-primary'>Confirmar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr>";
                                echo "<th scope='row' colspan='4'>No tiene ninguna reserva</th>";

                                echo "</tr>";
                            }
                        ?>

                </table>
                <!-- FIN TABLA -->
            </div>
            <!-- FIN SECTION -->
            <!-- INICIO SECTION BOTONES -->
            <div class="section__botones">
                <!-- El enlace a reserva nos llevara a la pagina reserva donde tendremos un select en el que seleccionaremos el mes, una vez seleccionado el mes nos mostrara un calendario con los dias
                que hay ya reservados que nos los mostrara en gris, tendros debajo unos inputs donde introduciremos el dia que queremos reservar la pista, cuando todo eso este listo pondremos 
                el dia en gris,tambien tendra un boton para volver a la pagina principal.-->
                <a class="link__botones" href="./aniadirReservas.php">Reservar</a><br>
                <!--Nos llevara al fichero cerrarSesion donde borra la cookie y nos volvera llevar al index.php -->
                <a class="link__botones" href="./cerrarSesion.php">Cerrar sesion</a><br>
            </div>
            <!-- FIN SECTION BOTONES -->
        </div>
        <!-- FIN CONTAINER -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
    <!-- FIN BODY -->

</html>