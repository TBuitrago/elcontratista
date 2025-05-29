<?php
class Database {
    private static $conn;

    public static function getConnection() {
        if (!self::$conn) {
            $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/config/config.env.php");

            if (!$config) {
                die("No se pudo cargar el archivo de configuración.");
            }

            $host = $config['DB_HOST'];
            $db   = $config['DB_NAME'];
            $user = $config['DB_USER'];
            $pass = $config['DB_PASS'];

            // Crear conexión
            self::$conn = new mysqli($host, $user, $pass, $db);
            if (self::$conn->connect_error) {
                die("Conexión fallida: " . self::$conn->connect_error);
            }
        }
        return self::$conn;
    }
}
