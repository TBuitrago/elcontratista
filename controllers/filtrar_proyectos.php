<?php
require_once '../config/Database.php';
require_once '../models/Proyecto.php';

if (isset($_GET['categoria'])) {
    $categoria = $_GET['categoria'];

    $proyecto = new Proyecto();
    $resultados = $proyecto->filtrarPorCategoria($categoria);

    echo json_encode($resultados);
} else {
    echo json_encode(['error' => 'Categoría no especificada.']);
}
