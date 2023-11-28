<?php
//para incluir las funciones que haya en functions.php
include '../recurses/functions/functions.php';
session_start();
if(!isset($_SESSION['user'])){
    
$dni = htmlspecialchars($_POST["dni"]);
$password = htmlspecialchars($_POST["password"]);
//echo $dni . "<br>";
//echo $password;

if ($dni != "" && $password != "") {
    $bd = conexionBD();
    $sql = consultaLogin($dni, $password);
    $users = $bd->query($sql);
    $user = $users->rowCount();
    $name;
    //echo $user;
    foreach ($users as $u) {
        $name = $u['nombre'];
    }
    //comprueba que la consulta nos ha devuelto solo una 1 fila que es la que indica que no hay ningun usuario repetido.
    if ($user == 1) {
        //echo "login correcto";
        //crea la cookie para almacenar el nombre del usuario que expira en 20 dias
        setcookie("guardarNombre", $name, time() + 20 * 24 * 60 * 60);
        $_SESSION['user'] = $dni;
    } else {
        header('Location:./log_in.php?error=1');
    }
} else {
    header('Location:./log_in.php?error=1');
}
}else{
    $name=$_COOKIE['guardarNombre'];
}
?>
<!doctype html>
<html lang="es">
    <head>
        <title>EBOPADEL</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <!-- Link to Bootstrap CSS library hosted on a CDN with integrity and crossorigin attributes -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/principal.css" />
    </head>
    <body>
        <div class="container">
            <h1 class="principal__title">Bienvenido <?php echo ucfirst($name) ?></h1>
            <h2 class="h2__reservas">RESERVAS</h2>
            <section class="reservas__section">
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
                                                        <h1 class='modal-title fs-5' id='exampleModalLabel'>Modal title</h1>
                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                    </div>
                                                    <div class='modal-body'>¿Esta seguro que quiere elimanar la reserva seleccionada? Si esta seguro pulse confirmar, si no
                                                        lo esta pulse cancelar.
                                                    </div>
                                                    <div class='modal-footer'>
                                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                                    <a href='./eliminarReservas.php?fecha=" . $reserva['fecha'] . "&hora=" . $reserva['hora'] . "' class='btn btn-primary'>Confirmar</a>
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
            </section>
            <section class="section__botones">
                <!-- El enlace a reserva nos llevara a la pagina reserva donde tendremos un select en el que seleccionaremos el mes, una vez seleccionado el mes nos mostrara un calendario con los dias
                que hay ya reservados que nos los mostrara en gris, tendros debajo unos inputs donde introduciremos el dia que queremos reservar la pista, cuando todo eso este listo pondremos 
                el dia en gris,tambien tendra un boton para volver a la pagina principal.-->
                <a class="link__botones" href="./aniadirReservas.php">Reservar</a><br>

                <!--Nos llevara al fichero cerrarSesion donde borra la cookie y nos volvera llevar al index.php -->
                <a class="link__botones" href="./cerrarSesion.php">Cerrar sesion</a><br>
                <!-- <a class="link__botones" href="./eliminarReservas.php">Eliminar</a> -->
            </section>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    </body>
</html>