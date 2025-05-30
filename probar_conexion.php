<?php
require_once 'config/Database.php';

$conn = Database::getConnection();

if ($conn) {
    echo "Conexión exitosa!";
} else {
    echo "Fallo en la conexión.";
}
?>