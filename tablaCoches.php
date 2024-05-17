<?php
// Definimos la clase Coche que representa la estructura de un coche en la base de datos
class Coche {
    public $rutaImagen;
    public $marca;
    public $modelo;
    public $pais;
    public $precio;
    public $caballos;
    public $maletero;
    public $puertas;

    // Constructor de la clase Coche para inicializar sus propiedades
    public function __construct($rutaImagen, $marca, $modelo, $pais, $precio, $caballos, $maletero, $puertas) {
        $this->rutaImagen = $rutaImagen;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->pais = $pais;
        $this->precio = $precio;
        $this->caballos = $caballos;
        $this->maletero = $maletero;
        $this->puertas = $puertas;
    }

    // Método estático para obtener todos los coches de la base de datos
    public static function getAll($base_de_datos) {
        // Consulta SQL para seleccionar todos los registros de la tabla 'coches'
        $sql = "SELECT * FROM coches;";
        // Ejecutamos la consulta
        $stmt = $base_de_datos->query($sql);
        // Obtenemos los resultados como objetos
        $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
        $coches = [];

        // Recorremos cada resultado y creamos una instancia de Coche
        foreach ($resultado as $row) {
            $coches[] = new Coche(
                $row->rutaImagen,
                $row->marca,
                $row->modelo,
                $row->pais,
                $row->precio,
                $row->caballos,
                $row->maletero,
                $row->puertas
            );
        }

        // Devolvemos un array de objetos Coche
        return $coches;
    }
}

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

// Utilizamos el método getAll de la clase Coche para obtener todos los coches
$coches = Coche::getAll($base_de_datos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de ejemplo</title>
    <style>
        /* Estilos para la tabla y el contenido */
        table, th, td {
            border: 1px solid black;
        }
        img {
            width: 220px;
            height: 150px;
            padding-bottom: 10px;
        }
        body {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            background-color: rgb(194, 194, 194);
        }
        article {
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
    <?php 
    // Recorremos el array de coches y generamos el HTML para cada coche
    foreach($coches as $coche) { ?>
        <article>
            <img src="<?php echo $coche->rutaImagen; ?>"><br>
            Marca: <?php echo $coche->marca; ?><br>
            Modelo: <?php echo $coche->modelo; ?><br>
            País: <?php echo $coche->pais; ?><br>
            Precio: <?php echo $coche->precio; ?>€<br>
            Caballos: <?php echo $coche->caballos; ?>cv<br>
            Maletero: <?php echo $coche->maletero; ?>L<br>
            Puertas: <?php echo $coche->puertas; ?><br>
        </article>
    <?php } ?>
</body>
</html>
