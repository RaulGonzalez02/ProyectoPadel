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
        <link rel="shortcut icon" href="../assets/images/_bc7a8cfb-caf1-4ad6-b28f-bec41282544f.jpg" type="image/x-icon">
        <link rel="stylesheet" href="../css/style.css" />
    </head>
    <body>
        <div class="container">
            <h1 class="principal__title">Bienvenido <?php echo ucfirst(htmlspecialchars($_COOKIE['guardarNombre'])) ?></h1>
            
            <!-- El enlace a reserva nos llevara a la pagina reserva donde tendremos un select en el que seleccionaremos el mes, una vez seleccionado el mes nos mostrara un calendario con los dias
            que hay ya reservados que nos los mostrara en gris, tendros debajo unos inputs donde introduciremos el dia que queremos reservar la pista, cuando todo eso este listo pondremos 
            el dia en gris,tambien tendra un boton para volver a la pagina principal.-->
            <a href="./aniadirReservas.php">Reservar</a><br>

            <!-- El enlace nos llevara a la pagina consultas donde mostraremos una tabla con todas las reservas que tiene ese usuario -->
            <a href="./consulReservas.php">Consultar reservas</a><br>

            <!-- El enlace nos llevara a la pagina eleminar donde nos saldra una tabla como la de consultar con unos checkbox para selecionar el que queremos borrar -->
            <a href="./eliminarReservas.php">Eliminar reservas</a><br>

            <!--Nos llevara al fichero cerrarSesion donde borra la cookie y nos volvera llevar al index.php -->
            <a href="./cerrarSesion.php">Cerrar sesion</a><br>
        </div>
    </body>
</html>