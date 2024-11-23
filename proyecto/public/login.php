<?php
session_start();
include '../includes/VideojuegoFacade.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreCompleto = $_POST['nombre_completo'] ?? '';
    $clave = $_POST['clave'] ?? '';

    if (!empty($nombreCompleto) && !empty($clave)) {
        $facade = new VideojuegoFacade();
        $usuario = $facade->iniciarSesion($nombreCompleto, $clave);

        if ($usuario) {
            $_SESSION['nombre_completo'] = $usuario['nombre_completo'];
            header("Location: videojuego.php");
        } else {
            header("Location: ../index.php?error=Nombre o contraseña incorrectos");
        }
    } else {
        header("Location: ../index.php?error=Por favor, completa todos los campos");
    }
}
?>
