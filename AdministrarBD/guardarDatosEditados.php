<?php

//Salir si alguno de los datos no está presente
if(
	!isset($_POST["idCoche"]) ||
	!isset($_POST["marca"]) || 
	!isset($_POST["modelo"]) || 
	!isset($_POST["pais"]) || 
	!isset($_POST["precio"]) || 
	!isset($_POST["caballos"]) || 
	!isset($_POST["maletero"]) || 
	!isset($_POST["puertas"]) 
) exit();

//Si todo va bien, se ejecuta esta parte del código...

include_once "../base_de_datos.php";
$idCoche = $_POST["idCoche"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$pais = $_POST["pais"];
$precio = $_POST["precio"];
$caballos = $_POST["caballos"];
$maletero = $_POST["maletero"];
$puertas = $_POST["puertas"];
$rutaImagen = $_POST["rutaImagen"];

$sentencia = $base_de_datos->prepare("UPDATE coches SET marca = ?, modelo = ?, pais = ?, precio = ?, caballos = ?, maletero = ?, puertas = ?, rutaImagen = ? WHERE idCoche = ?;");
$resultado = $sentencia->execute([$marca, $modelo, $pais, $precio, $caballos, $maletero, $puertas, $rutaImagen, $idCoche]); 
if($resultado === TRUE) echo "Cambios guardados";
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del coche";

// Leer el contenido actual del archivo JSON
$json_file = '../json/coches.json';
if (file_exists($json_file)) {
    $contenido_actual = file_get_contents($json_file);
    $datos_json = json_decode($contenido_actual, true);
    if ($datos_json === null) {
        $datos_json = array();
    }
} else {
    $datos_json = array();
}

// Nuevos datos a agregar/actualizar
$nuevos_datos = array(
    "idCoche" => $idCoche,
    "marca" => $marca,
    "modelo" => $modelo,
    "pais" => $pais,
    "precio" => $precio,
    "caballos" => $caballos,
    "maletero" => $maletero,
    "puertas" => $puertas,
	"rutaImagen" => $rutaImagen
);

// Buscar el coche en el array y actualizar sus datos
$encontrado = false;
foreach ($datos_json as &$coche) {
    if ($coche['idCoche'] == $idCoche) {
        $coche = $nuevos_datos;
        $encontrado = true;
    }
}

// Si el coche no se encontró, agregarlo al array
if (!$encontrado) {
    $datos_json[] = $nuevos_datos;
}

// Guardar el contenido actualizado de vuelta en el archivo JSON
$nuevo_contenido = json_encode($datos_json, JSON_PRETTY_PRINT);
file_put_contents($json_file, $nuevo_contenido);
header("Location: administrarBD.php")
?>