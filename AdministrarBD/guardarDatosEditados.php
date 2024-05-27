<?php

#Salir si alguno de los datos no está presente
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

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$idCoche = $_POST["idCoche"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$pais = $_POST["pais"];
$precio = $_POST["precio"];
$caballos = $_POST["caballos"];
$maletero = $_POST["maletero"];
$puertas = $_POST["puertas"];

$sentencia = $base_de_datos->prepare("UPDATE coches SET marca = ?, modelo = ?, pais = ?, precio = ?, caballos = ?, maletero = ?, puertas = ? WHERE idCoche = ?;");
$resultado = $sentencia->execute([$marca, $modelo, $pais, $precio, $caballos, $maletero, $puertas, $idCoche]); # Pasar en el mismo orden de los ?
if($resultado === TRUE) echo "Cambios guardados";
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del coche";
?>