<?php
require_once __DIR__ . '/../config/Database.php';

class Proyecto {
    public $idProyecto;
    public $titulo;
    public $descripcion;
    public $idCategoria;
    public $ubicacion;
    public $estado;

    public static function obtenerProyectosDisponibles($idCategoria = null) {
        $conn = Database::getConnection();

        if ($idCategoria) {
            $stmt = $conn->prepare("SELECT * FROM proyectos WHERE idCategoria = ? AND estado = 'publicado'");
            $stmt->bind_param("i", $idCategoria);
        } else {
            $stmt = $conn->prepare("SELECT * FROM proyectos WHERE estado = 'publicado'");
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $proyectos = [];

        while ($row = $result->fetch_assoc()) {
            $proyecto = new Proyecto();
            $proyecto->idProyecto = $row['idProyecto'];
            $proyecto->titulo = $row['titulo'];
            $proyecto->descripcion = $row['descripcion'];
            $proyecto->idCategoria = $row['idCategoria'];
            $proyecto->ubicacion = $row['ubicacion'];
            $proyecto->estado = $row['estado'];
            $proyectos[] = $proyecto;
        }

        $stmt->close();
        return $proyectos;
    }
}
