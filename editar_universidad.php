<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM universidades WHERE id='$id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Universidad</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Editar Universidad</h1>
    <form id="form-universidad" method="post" action="actualizar_universidad.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="nombre">Nombre de la Universidad:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
<?php
    } else {
        echo "Universidad no encontrada.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>
