sdsdcsdcsdcsdcsdcsd<?php
include 'config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $anio = $_POST['anio'];
    $url_recurso = $_POST['url_recurso'];
    $especialidad = $_POST['especialidad'];
    $editorial = $_POST['editorial'];

    $stmt = $conexion->prepare("INSERT INTO libros (titulo, autor, anio, url_recurso, especialidad, editorial) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $titulo, $autor, $anio, $url_recurso, $especialidad, $editorial);
    
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2>Agregar Nuevo Libro</h2>
    <form action="crear.php" method="POST">
        <div class="mb-3"><label>Titulo:</label> <input type="text" name="titulo" class="form-control" required></div>
        <div class="mb-3"><label>Autor:</label> <input type="text" name="autor" class="form-control" required></div>
        <div class="mb-3"><label>Año:</label> <input type="number" name="anio" class="form-control" required></div>
        <div class="mb-3"><label>URL del Recurso:</label> <input type="url" name="url_recurso" class="form-control" required></div>
        <div class="mb-3"><label>Especialidad:</label> <input type="text" name="especialidad" class="form-control" required></div>
        <div class="mb-3"><label>Editorial:</label> <input type="text" name="editorial" class="form-control" required></div>
        <button type="submit" class="btn btn-success">Guardar Libro</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>