<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarea</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Editar Tarea</h1>
    <?php
        include 'conexion.php';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM tareas WHERE id='$id'";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <form id="form-tarea" method="post" action="actualizar_tarea.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <label for="estudiante">Estudiante:</label>
                    <select id="estudiante" name="estudiante" required>
                        <?php
                            $query_estudiantes = "SELECT * FROM estudiantes";
                            $result_estudiantes = $conn->query($query_estudiantes);

                            while($estudiante = $result_estudiantes->fetch_assoc()) {
                                echo "<option value='" . $estudiante['id'] . "' " . ($estudiante['id'] == $row['estudiante_id'] ? 'selected' : '') . ">" . $estudiante['nombre'] . "</option>";
                            }
                        ?>
                    </select>
                    <label for="descripcion">Descripción de la Tarea:</label>
                    <textarea id="descripcion" name="descripcion" required><?php echo $row['descripcion']; ?></textarea>
                    <label for="fecha_entrega">Fecha de Entrega:</label>
                    <input type="date" id="fecha_entrega" name="fecha_entrega" value="<?php echo $row['fecha_entrega']; ?>" required>
                    <button type="submit">Actualizar</button>
                </form>
                <?php
            } else {
                echo "No se encontró la tarea.";
            }
        }
        $conn->close();
    ?>
</body>
</html>
