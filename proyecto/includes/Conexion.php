<?php
class Conexion {
    private $host = 'localhost';    // Cambiar a tu host si es diferente
    private $usuario = 'root';      // Tu usuario de base de datos
    private $clave = '';            // Tu clave de base de datos
    private $baseDatos = 'videajuegos'; // Nombre de tu base de datos
    private $conexion = null;

    // Método para obtener la conexión
    public function obtenerConexion() {
        if ($this->conexion == null) {
            try {
                $this->conexion = new PDO(
                    "mysql:host={$this->host};dbname={$this->baseDatos}",
                    $this->usuario,
                    $this->clave
                );
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error al conectar con la base de datos: " . $e->getMessage());
            }
        }
        return $this->conexion;
    }
}
?>
