<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM coches;");
$coches = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Tabla de ejemplo</title>
	<style>
	table, th, td {
	    border: 1px solid black;
	}
	img{
		width: 100px;
	}
	#cajas{
		display: grid;
		grid-template-columns: repeat(3, 1fr);
		
	}
	</style>
</head>
<body>
			
	<?php foreach($coches as $coches){ ?>
		<div id="cajas">
			<?php echo $coches->idCoche ?>
			<?php echo $coches->marca ?>
			<?php echo $coches->modelo ?>
			<?php echo $coches->pais ?>
			<?php echo $coches->precio ?>€
			<?php echo $coches->caballos ?>cv
			<?php echo $coches->maletero ?>L
			<?php echo $coches->puertas ?>
			<img src="<?php echo $coches->rutaImagen ?>">
		</div>
	<?php } ?>
		
	
</body>
</html>