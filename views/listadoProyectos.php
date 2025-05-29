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
} catch (Exception $e) {
    die("<p style='color:red;'>Error: " . $e->getMessage() . "</p>");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Proyectos</title>
</head>
<body>
    <h1>Proyectos Disponibles</h1>
    <form method="GET" action="">
        <label for="categoria">Filtrar por tipo de proyecto:</label>
        <select name="categoria" id="categoria">
            <option value="">-- Selecciona una categoría --</option>
            <option value="cat-piscinas">Piscinas</option>
            <option value="cat-remodelaciones">Remodelaciones</option>
            <option value="cat-techos">Techos</option>
        </select>
        <button type="submit">Filtrar</button>
    </form>
    <hr>
    <?php foreach ($proyectos as $p): ?>
        <h3><?= htmlspecialchars($p['titulo']) ?></h3>
        <p><?= htmlspecialchars($p['descripcion']) ?></p>
        <p><strong>Ubicación:</strong> <?= htmlspecialchars($p['ubicacion']) ?></p>
        <hr>
    <?php endforeach; ?>
</body>
</html>
