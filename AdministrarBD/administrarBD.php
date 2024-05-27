<?php
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM coches;");
$coches = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Administrar Base de Datos</title>
	<link rel="stylesheet" href="../styles/styleAdministrar.css">
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Marca</th>
				<th>Modelo</th>
				<th>País</th>
				<th>Precio</th>
				<th>Caballos</th>
				<th>Maletero</th>
				<th>Puertas</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($coches as $coches){ ?>
			<tr>
				<td><?php echo $coches->idCoche ?></td>
				<td><?php echo $coches->marca ?></td>
				<td><?php echo $coches->modelo ?></td>
				<td><?php echo $coches->pais ?></td>
				<td><?php echo $coches->precio ?></td>
				<td><?php echo $coches->caballos ?></td>
				<td><?php echo $coches->maletero ?></td>
				<td><?php echo $coches->puertas ?></td>
				<td><a href="<?php echo "editar.php?idCoche=" . $coches->idCoche?>">Editar</a></td>
				<td><a href="<?php echo "eliminar.php?idCoche=" . $coches->idCoche?>">Eliminar</a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>