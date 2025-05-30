<?php
require_once '../controllers/ProyectoController.php';
$controller = new ProyectoController();
$proyectos = $controller->listarPublicados();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Explorar Proyectos (Contratista)</title>
</head>
<body>
    <h1>Proyectos Publicados</h1>
    <a href="selector.php">Volver</a><br><br>
    <form method="GET" action="">
        <label>Filtrar por categoría:</label>
        <select name="categoria">
            <option value="">-- Todas --</option>
            <option value="cat-piscinas">Piscinas</option>
            <option value="cat-remodelaciones">Remodelaciones</option>
        </select>
        <button type="submit">Filtrar</button>
    </form><br>
    <?php foreach ($proyectos as $p): ?>
        <div style="border:1px solid #ccc;padding:10px;margin-bottom:10px;">
            <h3><?= $p['titulo'] ?></h3>
            <p><?= $p['descripcion'] ?></p>
            <p><strong>Ubicación:</strong> <?= $p['ubicacion'] ?? 'N/A' ?></p>
            <p><strong>Cliente:</strong> <?= $p['cliente_id'] ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>
