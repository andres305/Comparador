<?php
if(!isset($_GET["idCoche"])) exit();
$idCoche = $_GET["idCoche"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM coches WHERE idCoche = ?;");
$sentencia->execute([$idCoche]);
$coches = $sentencia->fetch(PDO::FETCH_OBJ);
if($coches === FALSE){
	#No existe
	echo "¡No existe coche con ese ID!";
	exit();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Base de Datos</title>
	<style>
		body {
    		font-family: Arial, sans-serif;
			color: white;
    		background-image: url(../img/fondo.png);
     		background-size: cover;
    		background-position: center; 
    		background-repeat: no-repeat; 
    		background-attachment: fixed;
    		margin: 0;
    		padding: 20px;
		}
	</style>
</head>
<body>
	<form method="post" action="guardarDatosEditados.php">
		<!-- Ocultamos el ID para que el usuario no pueda cambiarlo -->
		<input type="hidden" name="idCoche" value="<?php echo $coches->idCoche; ?>">
		
		<label">URL Imagen:</label>
		<br>
		<input value="<?php echo $coches->rutaImagen ?>" name="rutaImagen" required type="text" id="rutaImagen">
		<br><br>
		<label>Marca:</label>
		<br>
		<input value="<?php echo $coches->marca ?>" name="marca" required type="text" id="marca">
		<br><br>
		<label>Modelo:</label>
		<br>
		<input value="<?php echo $coches->modelo ?>" name="modelo" required type="text" id="modelo">
		<br><br>
		<label>País:</label>
		<br>
		<input value="<?php echo $coches->pais ?>" name="pais" required type="text" id="pais">
		<br><br>
		<label>Precio:</label>
		<br>
		<input value="<?php echo $coches->precio ?>" name="precio" required type="number" id="precio">
		<br><br>
		<label>Caballos:</label>
		<br>
		<input value="<?php echo $coches->caballos ?>" name="caballos" required type="number" id="caballos">
		<br><br>
		<label>Maltero:</label>
		<br>
		<input value="<?php echo $coches->maletero ?>" name="maletero" required type="number" id="maletero">
		<br><br>
		<label>Puertas:</label>
		<br>
		<input value="<?php echo $coches->puertas ?>" name="puertas" required type="number" id="puertas">
		<br><br>
		<br><br><input type="submit" value="Guardar cambios">
	</form>
</body>
</html>