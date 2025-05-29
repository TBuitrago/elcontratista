<?php
require_once __DIR__ . '/../controllers/listar_proyectos.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Proyectos Disponibles - ElContratista</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        .filtro { margin-bottom: 20px; }
        .proyecto { border: 1px solid #ccc; padding: 15px; margin-bottom: 15px; border-radius: 5px; }
        .proyecto h2 { margin-top: 0; }
    </style>
</head>
<body>

    <h1>Proyectos Disponibles</h1>

    <form method="get" class="filtro">
        <label for="categoria">Filtrar por tipo de proyecto:</label>
        <select name="categoria" id="categoria" onchange="this.form.submit()">
            <option value="">-- Todas las categorías --</option>
            <?php foreach ($categorias as $cat): ?>
                <option value="<?= $cat->idCategoria ?>" <?= $categoriaSeleccionada == $cat->idCategoria ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cat->nombre) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <?php if (count($proyectos) > 0): ?>
        <?php foreach ($proyectos as $p): ?>
            <div class="proyecto">
                <h2><?= htmlspecialchars($p->titulo) ?></h2>
                <p><strong>Ubicación:</strong> <?= htmlspecialchars($p->ubicacion) ?></p>
                <p><strong>Descripción:</strong> <?= nl2br(htmlspecialchars($p->descripcion)) ?></p>
                <p><strong>ID Categoría:</strong> <?= $p->idCategoria ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay proyectos disponibles en esta categoría.</p>
    <?php endif; ?>

</body>
</html>
