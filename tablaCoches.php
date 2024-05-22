<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: LogIn/login.php");
    exit();
}

include_once "base_de_datos.php";
include_once "coche.php";

// Utilizamos el método getAll de la clase Coche para obtener todos los coches
$coches = Coche::getAll($base_de_datos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de ejemplo</title>
    <link rel="stylesheet" href="styles/styleTabla.css">
</head>
<body>
    <div id="container">
    <?php 
    // Recorremos el array de coches y generamos el HTML para cada coche
    foreach($coches as $coche) { ?>
        <article>
            <img src="<?php echo $coche->rutaImagen; ?>"><br>
            <div id="txt">
            <b>Marca:</b> <?php echo $coche->marca; ?><br>
            <b>Modelo:</b> <?php echo $coche->modelo; ?><br>
            <b>País:</b> <?php echo $coche->pais; ?><br>
            <b>Precio:</b> <?php echo $coche->precio; ?>€<br>
            <b>Caballos:</b> <?php echo $coche->caballos; ?>cv<br>
            <b>Maletero:</b> <?php echo $coche->maletero; ?>L<br>
            <b>Puertas:</b> <?php echo $coche->puertas; ?><br>
            </div>
        </article>
    <?php } ?>
    </div>
    <a href="LogIn/logout.php"><button id="btnLogout">Cerrar sesión</button></a>
</body>
</html>