<?php
require_once __DIR__ . '/controllers/ProyectoController.php';

// Obtener parámetro de categoría (GET)
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : null;

$controller = new ProyectoController();
$data = $controller->listarProyectosDisponibles($categoria);

// Variables para la vista
$proyectos = $data['proyectos'];
$categorias = $data['categorias'];
$categoriaSeleccionada = $data['categoriaSeleccionada'];

// Mostrar vista
require_once __DIR__ . '/views/listadoProyectos.php';
