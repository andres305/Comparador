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
	<style>
		#btn{
    		border: 2px solid rgb(1, 20, 114);
    		padding: 18px 36px;
    		font-family: "Lucida Console";
    		font-size: 14px;
    		cursor: pointer;
    		box-shadow: inset 0 0 0 0 rgb(1, 20, 114);
    		-webkit-transition: ease-out 0.4s;
    		-moz-transition: ease-out 0.4s;
    		transition: ease-out 0.4s;
		}
		#btn:hover{
    		box-shadow: inset 400px 50px 0 0 rgb(1, 20, 114);
		}
	</style>
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
			</tr>
		</thead>
		<tbody>
			<?php foreach($coches as $coches){ ?>
			<tr>
				<td><?php echo $coches->idCoche ?></td>
				<td><?php echo $coches->marca ?></td>
				<td><?php echo $coches->modelo ?></td>
				<td><?php echo $coches->pais ?></td>
				<td><?php echo $coches->precio ?>€</td>
				<td><?php echo $coches->caballos ?>cv</td>
				<td><?php echo $coches->maletero ?>L</td>
				<td><?php echo $coches->puertas ?></td>
				<td><a href="<?php echo "editar.php?idCoche=" . $coches->idCoche?>">Editar</a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<a href="../tablaCoches.php"><button id="btn">Salir</button></a>
</body>
</html>