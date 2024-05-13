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
		width: 220px;
		height: 150px;
		padding-bottom: 10px;
	}
	body{
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		background-color: gray;
	}
	article{
		margin: 20px;
		padding-bottom: 10px;
		text-align: center;
		border: solid black;
		font: message-box;
		background-color: white;
	}
	</style>
</head>
<body>
			
	<?php foreach($coches as $coches){ ?>
		<article>
			<img src="<?php echo $coches->rutaImagen ?>"><br>
		 	Marca: <?php echo $coches->marca ?><br>
			Modelo: <?php echo $coches->modelo ?><br>
			País: <?php echo $coches->pais ?><br>
			Precio: <?php echo $coches->precio ?>€<br>
			Caballos: <?php echo $coches->caballos ?>cv<br>
			Maletero: <?php echo $coches->maletero ?>L<br>
			Puertas: <?php echo $coches->puertas ?><br>
		</article>
	<?php } ?>
		
	
</body>
</html>