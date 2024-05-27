<?php
if(!isset($_GET["idCoche"])) exit();
$idCoche = $_GET["idCoche"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM coches WHERE idCoche = ?;");
$resultado = $sentencia->execute([$idCoche]);
if($resultado === TRUE) echo "Eliminado correctamente";
else echo "Algo salió mal";
?>