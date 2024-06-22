<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enviar Documento PDF</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Enviar Documento PDF a Estudiante</h1>
    <form id="form-pdf" method="post" action="guardar_pdf.php" enctype="multipart/form-data">
        <label for="pdf">Seleccionar PDF:</label>
        <input type="file" id="pdf" name="pdf" accept=".pdf" required><br>

        <label for="estudiante">Seleccionar Estudiante:</label>
        <select id="estudiante" name="estudiante" required>
            <!-- Opciones para seleccionar un estudiante -->
            <option value="" disabled selected>Seleccionar Estudiante</option>
            <?php
                include 'conexion.php';
                $query = "SELECT * FROM estudiantes";
                $result = $conn->query($query);

                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                }

                $conn->close();
            ?>
        </select><br>

        <button type="submit">Enviar PDF</button>
    </form>
</body>
</html>
