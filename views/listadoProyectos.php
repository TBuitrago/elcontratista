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

    <?php
    require_once '../models/Proyecto.php';

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
    ?>
</body>
</html>
