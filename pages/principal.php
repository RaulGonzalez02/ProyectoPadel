<?php
//para incluir las funciones que haya en functions.php
include '../recurses/functions/functions.php';

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
        session_start();
        $_SESSION['user'] = $dni;
    } else {
        header('Location:./log_in.php?error=1');
    }
} else {
    header('Location:./log_in.php?error=1');
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
            <h1 class="principal__title">Bienvenido <?php echo ucfirst(htmlspecialchars($_COOKIE['guardarNombre'])) ?></h1>
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
                      <tr>
                        <th scope="row">1</th>
                        <td>25/04/2023</td>
                        <td>18:00</td>
                        <td><a href=""><i class="fa-solid fa-x eliminar"></i></a></td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>25/04/2023</td>
                        <td>19:00</td>
                        <td><a href=""><i class="fa-solid fa-x eliminar"></i></a></td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>25/04/2023</td>
                        <td>20:00</td>
                        <td><a href=""><i class="fa-solid fa-x eliminar"></i></a></td>
                      </tr>
                    </tbody>
                  </table>
            </section>
            <section class="section__botones">
            <!-- El enlace a reserva nos llevara a la pagina reserva donde tendremos un select en el que seleccionaremos el mes, una vez seleccionado el mes nos mostrara un calendario con los dias
            que hay ya reservados que nos los mostrara en gris, tendros debajo unos inputs donde introduciremos el dia que queremos reservar la pista, cuando todo eso este listo pondremos 
            el dia en gris,tambien tendra un boton para volver a la pagina principal.-->
            <a class="link__botones" href="../pages/aniadirReservas.php">Reservar</a><br>

            <!--Nos llevara al fichero cerrarSesion donde borra la cookie y nos volvera llevar al index.php -->
            <a class="link__botones" href="./cerrarSesion.php">Cerrar sesion</a><br>
            </section>
        </div>
    </body>
</html>