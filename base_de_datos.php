<?php
// Datos de conexión a la base de datos
$contraseña = "";
$usuario = "root";
$nombre_base_de_datos = "comparador";

try {
    // Intentamos crear una instancia de PDO para la conexión a la base de datos
    $base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
} catch (Exception $e) {
    // Si ocurre un error, mostramos un mensaje
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>