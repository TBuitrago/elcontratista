<?php
require_once __DIR__ . '/../config/Database.php';

class Proyecto {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function obtenerTodos() {
        $stmt = $this->conn->query("SELECT * FROM PROYECTO");
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function filtrarPorCategoria($categoria) {
        $stmt = $this->conn->prepare("
            SELECT P.* FROM PROYECTO P
            JOIN PROYECTO_CATEGORIA PC ON P.ID_PROYECTO = PC.PROYECTO_ID
            JOIN CATEGORIA C ON C.ID_CATEGORIA = PC.CATEGORIA_ID
            WHERE C.NOMBRE = ?
        ");
        $stmt->bind_param("s", $categoria);
        $stmt->execute();
        $result = $stmt->get_result();
        $proyectos = [];
        while ($row = $result->fetch_assoc()) {
            $proyectos[] = $row;
        }
        return $proyectos;
    }
}
