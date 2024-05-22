<?php
include_once "../base_de_datos.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (username, password) VALUES (?, ?)";
    $stmt = $base_de_datos->prepare($sql);

    if ($stmt->execute([$username, $password])) {
        echo "Usuario registrado exitosamente";
    } else {
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
    <form method="POST" action="register.php">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Registrarse</button>
    </form>
    <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
</body>
</html>
