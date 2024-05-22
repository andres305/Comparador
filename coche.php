<?php
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
?>