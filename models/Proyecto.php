<?php
require_once __DIR__ . '/../config/Database.php';

class Proyecto {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function obtenerTodos() {
        $stmt = $this->conn->query("SELECT * FROM proyectos");
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function filtrarPorCategoria($categoria) {
        $stmt = $this->conn->prepare(
            "SELECT p.* FROM proyectos p
             JOIN proyectos_categorias pc ON p.id = pc.id_proyecto
             JOIN categorias c ON pc.id_categoria = c.id
             WHERE c.nombre = ?"
        );
        $stmt->bind_param("s", $categoria);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM proyectos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizar($id, $titulo, $descripcion, $presupuesto, $estado) {
        $stmt = $this->conn->prepare("UPDATE proyectos SET titulo = ?, descripcion = ?, presupuesto = ?, estado = ? WHERE id = ?");
        $stmt->bind_param("ssdsi", $titulo, $descripcion, $presupuesto, $estado, $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->conn->prepare("DELETE FROM proyectos WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}