<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../models/Proyecto.php';

try {
    $proyecto = new Proyecto();
    $proyectos = [];

    if (isset($_GET['categoria']) && $_GET['categoria'] !== '') {
        $proyectos = $proyecto->filtrarPorCategoria($_GET['categoria']);
    } else {
        $proyectos = $proyecto->obtenerTodos();
    }

    foreach ($proyectos as $p) {
        echo "<h3>{$p['titulo']}</h3>";
        echo "<p>{$p['descripcion']}</p>";
        echo "<p><strong>Ubicación:</strong> {$p['ubicacion']}</p>";
        echo "<hr>";
    }
} catch (Exception $e) {
    echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
}
?>
