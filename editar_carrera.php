<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM carreras WHERE id='$id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Carrera</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Editar Carrera</h1>
    <form id="form-carrera" method="post" action="actualizar_carrera.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="nombre">Nombre de la Carrera:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
<?php
    } else {
        echo "Carrera no encontrada.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>
