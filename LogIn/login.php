<?php
session_start();
include_once "../base_de_datos.php";

// Verifica si la solicitud se realizó mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene el nombre de usuario y la contraseña del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepara la consulta SQL para seleccionar el usuario con el nombre de usuario proporcionado
    $sql = "SELECT * FROM usuarios WHERE username = ?";
    $stmt = $base_de_datos->prepare($sql);
    // Obtiene el resultado de la consulta como un array asociativo
    $stmt->execute([$username]);
    // Obtiene el resultado de la consulta como un array asociativo
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica si se encontró un usuario y si la contraseña proporcionada es correcta
    if ($user && password_verify($password, $user['password'])) {
        // Almacena el ID del usuario y el nombre de usuario en las variables de sesión
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        // Redirige al usuario a la página tablaCoches.php después de un inicio de sesión exitoso
        header("Location: ../tablaCoches.php");
        exit();
    } else {
        // Muestra un mensaje de error si el usuario no se encuentra o la contraseña es incorrecta
        echo "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../styles/styleLogin.css">
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form method="POST" action="login.php">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Iniciar sesión</button>
    </form>
    <p>¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a></p>
</body>
</html>