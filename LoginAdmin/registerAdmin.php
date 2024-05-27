<?php
include_once "../base_de_datos.php";

// Verifica si la solicitud se realizó mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene el nombre de usuario y la contraseña del formulario
    $username = $_POST['username'];
    
    // Genera el hash de la contraseña proporcionada
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Prepara la consulta SQL para insertar un nuevo usuario en la base de datos
    $sql = "INSERT INTO administradores (username, password) VALUES (?, ?)";
    $stmt = $base_de_datos->prepare($sql);

    // Ejecuta la consulta con el nombre de usuario y la contraseña hash
    if ($stmt->execute([$username, $password])) {
        // Muestra un mensaje de éxito si el usuario se registró correctamente
        echo "Usuario registrado exitosamente";
    } else {
        // Muestra un mensaje de error si ocurrió algún problema al registrar el usuario
        echo "Error al registrar usuario";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="../styles/styleLogin.css">
</head>
<body>
    <h2>Registrarse</h2>
    <form method="POST" action="registerAdmin.php">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Registrarse</button>
    </form>
</body>
</html>
