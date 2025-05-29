<?php
require_once '../config/Database.php';

class Proyecto {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function obtenerTodos() {
        $stmt = $this->conn->query("SELECT * FROM proyectos");
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function filtrarPorCategoria($idCategoria) {
        $stmt = $this->conn->prepare(
            "SELECT p.*
             FROM proyectos p
             JOIN proyectos_categorias pc ON p.id = pc.id_proyecto
             WHERE pc.id_categoria = ?"
        );
        $stmt->bind_param("s", $idCategoria);
        $stmt->execute();
        $result = $stmt->get_result();

        $proyectos = [];
        while ($row = $result->fetch_assoc()) {
            $proyectos[] = $row;
        }
        return $proyectos;
    }
}
