<?php
require_once '../models/Proyecto.php';
require_once '../models/ProyectoDTO.php';

class ProyectoController {
    public function listarPorCliente($idCliente) {
        $proyecto = new Proyecto();
        return $proyecto->getAllByCliente($idCliente);
    }

    public function listarPublicados() {
        $proyecto = new Proyecto();
        return $proyecto->getPublicado();
    }

    public function filtrarProyectos($criterios) {
        $proyecto = new Proyecto();
        return $proyecto->filterByCategoria($criterios);
    }

    public function getDetalle($idProyecto) {
        $proyecto = new Proyecto();
        return $proyecto->getById($idProyecto);
    }

    public function actualizar(ProyectoDTO $dto) {
        $proyecto = new Proyecto();
        return $proyecto->update($dto);
    }

    public function eliminar($idProyecto) {
        $proyecto = new Proyecto();
        return $proyecto->delete($idProyecto);
    }
}
?>