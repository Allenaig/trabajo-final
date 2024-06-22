<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Faltas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Gestión de Faltas</h1>
    <form id="form-falta" method="post" action="guardar_falta.php">
        <label for="estudiante">Estudiante:</label>
        <select id="estudiante" name="estudiante" required>
            <!-- Aquí se rellenarán los estudiantes desde PHP -->
            <?php
                include 'conexion.php';
                $query = "SELECT * FROM estudiantes";
                $result = $conn->query($query);

                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                }

                $conn->close();
            ?>
        </select>
        <label for="fecha_falta">Fecha de la Falta:</label>
        <input type="date" id="fecha_falta" name="fecha_falta" required>
        <button type="submit">Añadir</button>
    </form>
    <hr>
    <h2>Lista de Faltas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Estudiante</th>
                <th>Fecha de la Falta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí se rellenarán las faltas desde PHP -->
            <?php
                include 'conexion.php';
                $query = "SELECT faltas.id, estudiantes.nombre AS estudiante, faltas.fecha_falta 
                          FROM faltas 
                          JOIN estudiantes ON faltas.estudiante_id = estudiantes.id";
                $result = $conn->query($query);

                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['estudiante'] . "</td>";
                    echo "<td>" . $row['fecha_falta'] . "</td>";
                    echo "<td>
                            <a href='editar_falta.php?id=" . $row['id'] . "'>Editar</a> | 
                            <a href='eliminar_falta.php?id=" . $row['id'] . "'>Eliminar</a>
                          </td>";
                    echo "</tr>";
                }

                $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
