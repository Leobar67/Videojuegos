<?php
session_start();
if (!isset($_SESSION['nombre_completo'])) {
    header("Location: ../index.php?error=Debes iniciar sesión primero");
    exit();
}

include '../includes/VideojuegoFacade.php';

$facade = new VideojuegoFacade();
$torneos = $facade->obtenerTorneos();
$nombreCompleto = $_SESSION['nombre_completo'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuego</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bienvenido, <?php echo htmlspecialchars($nombreCompleto); ?>!</h1>
    </header>
    <main>
        <h2>Gestión de Torneos</h2>
        <button id="crearTorneoBtn">Crear Torneo</button>
        <div id="torneoForm" style="display: none;">
            <form action="../public/torneo.php" method="POST" enctype="multipart/form-data">
                <label for="nombre_juego">Nombre del Juego:</label>
                <input type="text" name="nombre_juego" required>
                <label for="participantes">Número de Participantes:</label>
                <input type="number" name="participantes" min="1" required>
                <label for="imagen">Imagen del Torneo:</label>
                <input type="file" name="imagen" accept="image/*">
                <button type="submit">Crear Torneo</button>
            </form>
        </div>
        <h3>Torneos Registrados</h3>
        <?php if (empty($torneos)): ?>
            <p>No hay torneos registrados.</p>
        <?php else: ?>
            <?php foreach ($torneos as $torneo): ?>
                <div>
                    <h4><?php echo htmlspecialchars($torneo['nombre_juego']); ?></h4>
                    <p>Participantes: <?php echo htmlspecialchars($torneo['participantes']); ?></p>
                    <?php if (!empty($torneo['imagen'])): ?>
                        <img src="data:image/jpeg;base64,<?php echo $torneo['imagen']; ?>" alt="Imagen">
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </main>
    <script>
        document.getElementById('crearTorneoBtn').addEventListener('click', () => {
            document.getElementById('torneoForm').style.display = 'block';
        });
    </script>
</body>
</html>
