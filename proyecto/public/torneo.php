<?php
include '../includes/VideojuegoFacade.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreJuego = $_POST['nombre_juego'] ?? '';
    $participantes = $_POST['participantes'] ?? 0;
    $imagen = $_FILES['imagen']['tmp_name'] ?? null;

    if (!empty($nombreJuego) && $participantes > 0) {
        $imagenBase64 = $imagen ? base64_encode(file_get_contents($imagen)) : null;

        $facade = new VideojuegoFacade();
        if ($facade->crearTorneo($nombreJuego, $participantes, $imagenBase64)) {
            header("Location: videojuego.php?mensaje=Torneo creado con éxito");
        } else {
            header("Location: videojuego.php?error=Error al crear el torneo");
        }
    } else {
        header("Location: videojuego.php?error=Completa todos los campos correctamente");
    }
}
?>
