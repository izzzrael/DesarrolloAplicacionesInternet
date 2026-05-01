<?php
include 'config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $stmt = $conexion->prepare("DELETE FROM libros WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error al eliminar.";
    }
    $stmt->close();
}
?>