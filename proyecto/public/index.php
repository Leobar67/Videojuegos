<?php
session_start();
if (isset($_SESSION['nombre_completo'])) {
    header("Location: public/videojuego.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="public/login.php" method="POST">
        <label for="nombre_completo">Nombre Completo:</label>
        <input type="text" name="nombre_completo" required>
        <label for="clave">Contraseña:</label>
        <input type="password" name="clave" required>
        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>
