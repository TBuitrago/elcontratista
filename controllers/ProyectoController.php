<?php
require_once __DIR__ . '/../models/Proyecto.php';
require_once __DIR__ . '/../models/Categoria.php';

class ProyectoController {
    
    public function listarProyectosDisponibles($idCategoria = null) {
        // Validación del parámetro
        if ($idCategoria !== null && !is_numeric($idCategoria)) {
            throw new InvalidArgumentException("La categoría debe ser un número.");
        }

        // Obtener proyectos según filtro
        $proyectos = Proyecto::obtenerProyectosDisponibles($idCategoria);
        $categorias = Categoria::obtenerTodas();

        // Devolver datos a la vista
        return [
            'proyectos' => $proyectos,
            'categorias' => $categorias,
            'categoriaSeleccionada' => $idCategoria
        ];
    }
}
