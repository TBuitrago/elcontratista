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
    <title>Proyectos Disponibles</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        form {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-bottom: 40px;
        }

        select, button {
            padding: 10px;
            font-size: 16px;
        }

        button {
            background-color: #2c7be5;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1a5fb4;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 20px;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            margin-top: 0;
            color: #2c3e50;
        }

        .card p {
            margin: 8px 0;
            color: #555;
        }

        .card .label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Proyectos Disponibles</h1>

    <form method="GET" action="">
        <label for="categoria">Filtrar por categoría:</label>
        <select name="categoria" id="categoria">
            <option value="">-- Todas --</option>
            <option value="Piscinas" <?= $categoria === 'Piscinas' ? 'selected' : '' ?>>Piscinas</option>
            <option value="Patios Residenciales" <?= $categoria === 'Patios Residenciales' ? 'selected' : '' ?>>Patios Residenciales</option>
        </select>
        <button type="submit">Filtrar</button>
    </form>

    <div class="cards">
        <?php foreach ($proyectos as $p): ?>
        <div class="card">
            <h3><?= htmlspecialchars($p['TITULO']) ?></h3>
            <p><span class="label">Cliente:</span> <?= htmlspecialchars($p['CLIENTE_ID']) ?></p>
            <p><span class="label">Descripción:</span> <?= htmlspecialchars($p['DESCRIPCION']) ?></p>
            <p><span class="label">Presupuesto:</span> $<?= number_format($p['PRESUPUESTO'], 0, ',', '.') ?> USD</p>
            <p><span class="label">Estado:</span> <?= htmlspecialchars($p['ESTADO']) ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
