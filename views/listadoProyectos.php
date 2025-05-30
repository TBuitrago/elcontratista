<?php
require_once __DIR__ . '/../models/Proyecto.php';

$proyecto = new Proyecto();
$categoria = $_GET['categoria'] ?? '';
$proyectos = $categoria ? $proyecto->filtrarPorCategoria($categoria) : $proyecto->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Proyectos</title>
</head>
<body>
    <h1>Listado de Proyectos</h1>
    <form method="GET">
        <select name="categoria">
            <option value="">Todas las categorías</option>
            <option value="Piscinas">Piscinas</option>
            <option value="Remodelaciones">Remodelaciones</option>
            <option value="Techos">Techos</option>
        </select>
        <button type="submit">Filtrar</button>
    </form>
    <hr>
    <?php foreach ($proyectos as $p): ?>
        <h3><?= $p['titulo'] ?></h3>
        <p><?= $p['descripcion'] ?></p>
        <strong>Presupuesto:</strong> <?= $p['presupuesto'] ?><br>
        <strong>Estado:</strong> <?= $p['estado'] ?><br>
        <hr>
    <?php endforeach; ?>
</body>
</html>