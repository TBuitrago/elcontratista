<?php
require_once '../controllers/ProyectoController.php';
$controller = new ProyectoController();
$proyectos = $controller->listarPorCliente("cli-001"); // Simulación de cliente autenticado
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Proyectos (Cliente)</title>
</head>
<body>
    <h1>Mis Proyectos</h1>
    <a href="selector.php">Volver</a><br><br>
    <?php foreach ($proyectos as $p): ?>
        <div style="border:1px solid #ccc;padding:10px;margin-bottom:10px;">
            <h3><?= $p['titulo'] ?></h3>
            <p><?= $p['descripcion'] ?></p>
            <p><strong>Presupuesto:</strong> $<?= number_format($p['presupuesto']) ?></p>
            <p><strong>Estado:</strong> <?= $p['estado'] ?></p>
            <form method="POST" action="../controllers/ProyectoController.php">
                <input type="hidden" name="accion" value="eliminar">
                <input type="hidden" name="id" value="<?= $p['id'] ?>">
                <button type="submit">Eliminar</button>
            </form>
        </div>
    <?php endforeach; ?>
</body>
</html>
