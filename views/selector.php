<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Selector de Rol</title></head>
<body>
    <h2>Seleccione su rol</h2>
    <form method="GET" action="">
        <select name="rol" onchange="location.href=this.value">
            <option value="proyectos_cliente.php">Cliente</option>
            <option value="proyectos_contratista.php">Contratista</option>
        </select>
    </form>
</body>
</html>