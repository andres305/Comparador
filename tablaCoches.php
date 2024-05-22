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
            Marca: <?php echo $coche->marca; ?><br>
            Modelo: <?php echo $coche->modelo; ?><br>
            País: <?php echo $coche->pais; ?><br>
            Precio: <?php echo $coche->precio; ?>€<br>
            Caballos: <?php echo $coche->caballos; ?>cv<br>
            Maletero: <?php echo $coche->maletero; ?>L<br>
            Puertas: <?php echo $coche->puertas; ?><br>
        </article>
    <?php } ?>
    </div>
    <p><a href="LogIn/logout.php">Cerrar sesión</a></p>
</body>
</html>