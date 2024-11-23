<?php
include_once 'Conexion.php';

class VideojuegoFacade {
    private $conexion;

    public function __construct() {
        $this->conexion = (new Conexion())->obtenerConexion();
    }

    // Iniciar sesión del usuario
    public function iniciarSesion($nombreCompleto, $clave) {
        $sql = "SELECT * FROM usuarios WHERE nombre_completo = :nombre_completo AND clave = :clave LIMIT 1";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':nombre_completo', $nombreCompleto);
        $stmt->bindParam(':clave', $clave);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear un nuevo torneo
    public function crearTorneo($nombreJuego, $participantes, $imagen) {
        $sql = "INSERT INTO torneo (nombre_juego, participantes, imagen) VALUES (:nombre_juego, :participantes, :imagen)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':nombre_juego', $nombreJuego);
        $stmt->bindParam(':participantes', $participantes);
        $stmt->bindParam(':imagen', $imagen);
        
        return $stmt->execute(); // Devuelve true si se inserta correctamente
    }

    // Obtener todos los torneos
    public function obtenerTorneos() {
        $sql = "SELECT * FROM torneo";
        $stmt = $this->conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
