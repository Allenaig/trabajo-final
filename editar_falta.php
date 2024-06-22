<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM faltas WHERE id='$id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Falta</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Editar Falta</h1>
    <form id="form-falta" method="post" action="actualizar_falta.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="fecha">Fecha de la Falta:</label>
        <input type="date" id="fecha" name="fecha" value="<?php echo $row['fecha']; ?>" required>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
<?php
    } else {
        echo "Falta no encontrada.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>
