<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../models/Proyecto.php';
$proyecto = new Proyecto();

$categoria = $_GET['categoria'] ?? null;
$proyectos = $categoria ? $proyecto->filtrarPorCategoria($categoria) : $proyecto->obtenerTodos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Proyectos</title>
</head>
<body>
    <h1>Proyectos disponibles</h1>
    <form method="GET" action="">
        <label for="categoria">Filtrar por categoría:</label>
        <select name="categoria" id="categoria">
            <option value="">-- Todas --</option>
            <option value="Piscinas">Piscinas</option>
            <option value="Patios Residenciales">Patios Residenciales</option>
        </select>
        <button type="submit">Filtrar</button>
    </form>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Título</th>
            <th>Cliente</th>
            <th>Descripción</th>
            <th>Presupuesto</th>
            <th>Categoría</th>
        </tr>
        <?php foreach ($proyectos as $p): ?>
        <tr>
            <td><?= htmlspecialchars($p['TITULO']) ?></td>
            <td><?= htmlspecialchars($p['CLIENTE_ID']) ?></td>
            <td><?= htmlspecialchars($p['DESCRIPCION']) ?></td>
            <td><?= number_format($p['PRESUPUESTO'], 0, ',', '.') ?> USD</td>
            <td><?= htmlspecialchars($categoria ?? 'Todas') ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
