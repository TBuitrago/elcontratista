<?php
class Database {
    private static $conn;

    public static function getConnection() {
        if (!self::$conn) {
            $env = parse_ini_file(__DIR__ . '/../config.env.php');
            $host = $env['DB_HOST'];
            $db   = $env['DB_NAME'];
            $user = $env['DB_USER'];
            $pass = $env['DB_PASS'];
            self::$conn = new mysqli($host, $user, $pass, $db);
            if (self::$conn->connect_error) {
                die("Conexión fallida: " . self::$conn->connect_error);
            }
        }
        return self::$conn;
    }
}