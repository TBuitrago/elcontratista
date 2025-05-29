<?php
class Database {
    private static $host = 'localhost';
    private static $dbName = 'u729801655_elcontratista';
    private static $username = 'u729801655_tomas';
    private static $password = 'BDDELCONTRATISTA2025med@OO';
    private static $conn;

    public static function getConnection() {
        if (!self::$conn) {
            self::$conn = new mysqli(self::$host, self::$username, self::$password, self::$dbName);
            if (self::$conn->connect_error) {
                die("Conexión fallida: " . self::$conn->connect_error);
            }
        }
        return self::$conn;
    }
}
