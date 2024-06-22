<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM estudiantes WHERE id='$id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Estudiante</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Editar Estudiante</h1>
    <form id="form-estudiante" method="post" action="actualizar_estudiante.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="nombre">Nombre del Estudiante:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>
        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" value="<?php echo $row['dni']; ?>" required>
        <label for="universidad">Universidad:</label>
        <select id="universidad" name="universidad" required>
            <?php
                $query_universidades = "SELECT * FROM universidades";
                $result_universidades = $conn->query($query_universidades);

                while($row_universidad = $result_universidades->fetch_assoc()) {
                    $selected = ($row_universidad['id'] == $row['universidad_id']) ? 'selected' : '';
                    echo "<option value='" . $row_universidad['id'] . "' " . $selected . ">" . $row_universidad['nombre'] . "</option>";
                }
            ?>
        </select>
        <label for="carrera">Carrera:</label>
        <select id="carrera" name="carrera" required>
            <?php
                $query_carreras = "SELECT * FROM carreras";
                $result_carreras = $conn->query($query_carreras);

                while($row_carrera = $result_carreras->fetch_assoc()) {
                    $selected = ($row_carrera['id'] == $row['carrera_id']) ? 'selected' : '';
                    echo "<option value='" . $row_carrera['id'] . "' " . $selected . ">" . $row_carrera['nombre'] . "</option>";
                }
            ?>
        </select>
        <label for="foto">Foto del Estudiante (.jpg):</label>
        <input type="file" id="foto" name="foto" accept=".jpg">
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
<?php
    } else {
        echo "Estudiante no encontrado.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>
