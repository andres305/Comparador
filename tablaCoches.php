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
    <title>Comparador de coches</title>
    <link rel="stylesheet" href="styles/styleTabla.css">
    <style>
        header {
            background-color: #1f1f1f;
            padding: 20px;
            text-align: center;
            border-bottom: 2px solid #333333;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.6);
        }
        h1 {
            margin: 0;
            color: #e0e0e0;
            font-size: 2.5em;
            font-weight: 300;
            font-family: 'Fira Code', monospace;
        }
        button{
            border: 2px solid rgb(1, 20, 114);
            padding: 18px 36px;
            font-family: "Lucida Console";
            font-size: 14px;
            cursor: pointer;
            box-shadow: inset 0 0 0 0 rgb(1, 20, 114);
            -webkit-transition: ease-out 0.4s;
            -moz-transition: ease-out 0.4s;
            transition: ease-out 0.4s;
            margin-top: 20px;
            margin-left: 50px;
        }
        button:hover{
            box-shadow: inset 400px 50px 0 0 rgb(1, 20, 114);
        }
        article {
            display: inline-block;
            margin: 20px;
        }
        #container {
            text-align: center;
        }
        #formComparador {
            margin-top: 20px;
        }
    </style>
</head>
<header>
    <h1>Comparador de coches</h1>
    <a href="tablaCoches.php"><button>Catálogo</button></a>
    <a href="LoginAdmin/loginAdmin.php"><button>Modo administrador</button></a>
</header>
<body>  
    <div id="container">
    <form id="formComparador" action="Comparar/comparador.html" method="get">
    <?php 
    // Recorremos el array de coches y generamos el HTML para cada coche
    foreach($coches as $index => $coche) { ?>
        <article>
            <img src="<?php echo $coche->rutaImagen; ?>" alt="Imagen de <?php echo $coche->marca . ' ' . $coche->modelo; ?>"><br>
            <div id="txt">
            <b>Marca:</b> <?php echo $coche->marca; ?><br>
            <b>Modelo:</b> <?php echo $coche->modelo; ?><br>
            <b>País:</b> <?php echo $coche->pais; ?><br>
            <b>Precio:</b> <?php echo $coche->precio; ?>€<br>
            <b>Caballos:</b> <?php echo $coche->caballos; ?>cv<br>
            <b>Maletero:</b> <?php echo $coche->maletero; ?>L<br>
            <b>Puertas:</b> <?php echo $coche->puertas; ?><br>
            <input type="checkbox" name="coches[]" value="<?php echo $index; ?>"> Comparar<br>
            </div>
        </article>
    <?php } ?>
        <button type="submit">Comparar</button>
    </form>
    </div>
    <a href="LogIn/logout.php"><button id="btnLogout">Cerrar sesión</button></a>
</body>
</html>
