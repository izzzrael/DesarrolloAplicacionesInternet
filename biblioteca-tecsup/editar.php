<?php
include 'config/database.php';

$id = $_GET['id'];

$stmt = $conexion->prepare("SELECT * FROM libros WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$libro = $resultado->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $anio = $_POST['anio'];
    $url_recurso = $_POST['url_recurso'];
    $especialidad = $_POST['especialidad'];
    $editorial = $_POST['editorial'];


    $stmt_update = $conexion->prepare("UPDATE libros SET titulo=?, autor=?, anio=?, url_recurso=?, especialidad=?, editorial=? WHERE id=?");
    $stmt_update->bind_param("ssisssi", $titulo, $autor, $anio, $url_recurso, $especialidad, $editorial, $id);
    
    if ($stmt_update->execute()) {
        header("Location: index.php");
        exit();
    }
    $stmt_update->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2>Editar Libro</h2>
    <form action="editar.php?id=<?= $libro['id'] ?>" method="POST">
        <div class="mb-3"><label>Título:</label> <input type="text" name="titulo" value="<?= htmlspecialchars($libro['titulo']) ?>" class="form-control" required></div>
        <div class="mb-3"><label>Autor:</label> <input type="text" name="autor" value="<?= htmlspecialchars($libro['autor']) ?>" class="form-control" required></div>
        <div class="mb-3"><label>Año:</label> <input type="number" name="anio" value="<?= htmlspecialchars($libro['anio']) ?>" class="form-control" required></div>
        <div class="mb-3"><label>URL del Recurso:</label> <input type="url" name="url_recurso" value="<?= htmlspecialchars($libro['url_recurso']) ?>" class="form-control" required></div>
        <div class="mb-3"><label>Especialidad:</label> <input type="text" name="especialidad" value="<?= htmlspecialchars($libro['especialidad']) ?>" class="form-control" required></div>
        <div class="mb-3"><label>Editorial:</label> <input type="text" name="editorial" value="<?= htmlspecialchars($libro['editorial']) ?>" class="form-control" required></div>
        <button type="submit" class="btn btn-warning">Actualizar Libro</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>