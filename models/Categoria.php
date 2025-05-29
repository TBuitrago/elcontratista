<?php
require_once __DIR__ . '/../config/Database.php';

class Categoria {
    public $idCategoria;
    public $nombre;

    public static function obtenerTodas() {
        $conn = Database::getConnection();

        $stmt = $conn->prepare("SELECT * FROM categorias ORDER BY nombre ASC");
        $stmt->execute();
        $result = $stmt->get_result();
        $categorias = [];

        while ($row = $result->fetch_assoc()) {
            $categoria = new Categoria();
            $categoria->idCategoria = $row['idCategoria'];
            $categoria->nombre = $row['nombre'];
            $categorias[] = $categoria;
        }

        $stmt->close();
        return $categorias;
    }
}
