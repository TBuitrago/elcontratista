<?php
require_once '../config/Database.php';

class Proyecto {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getAllByCliente($id) {
        $stmt = $this->conn->prepare("SELECT * FROM proyectos WHERE cliente_id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getPublicado() {
        $query = "SELECT * FROM proyectos WHERE estado = 'Publicado'";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function filterByCategoria($categoria) {
        $stmt = $this->conn->prepare("SELECT p.* FROM proyectos p JOIN proyectos_categorias pc ON p.id = pc.id_proyecto WHERE pc.id_categoria = ?");
        $stmt->bind_param("s", $categoria);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM proyectos WHERE id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function update($dto) {
        try {
            $this->conn->begin_transaction();
            $stmt = $this->conn->prepare("UPDATE proyectos SET titulo=?, descripcion=?, presupuesto=?, estado=? WHERE id=?");
            $stmt->bind_param("ssdss", $dto->titulo, $dto->descripcion, $dto->presupuesto, $dto->estado, $dto->id);
            $stmt->execute();
            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollback();
            return false;
        }
    }

    public function delete($id) {
        try {
            $this->conn->begin_transaction();
            $stmt = $this->conn->prepare("DELETE FROM proyectos WHERE id = ?");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollback();
            return false;
        }
    }
}
?>