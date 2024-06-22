<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Tareas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Gestión de Tareas</h1>
    <form id="form-tarea" method="post" action="guardar_tarea.php" enctype="multipart/form-data">
        <label for="nombre">Nombre de la Tarea:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="descripcion">Descripción de la Tarea:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>
        <label for="pdf">Importar PDF con la Descripción:</label>
        <input type="file" id="pdf" name="pdf" accept=".pdf" required>
        <label for="fecha_limite">Fecha Límite:</label>
        <input type="date" id="fecha_limite" name="fecha_limite" required>
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
        <button type="submit">Añadir</button>
    </form>
    <hr>
    <h2>Lista de Tareas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>PDF</th>
                <th>Fecha Límite</th>
                <th>Estudiante</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí se rellenarán las tareas desde PHP -->
            <?php
                include 'conexion.php';
                $query = "SELECT tareas.id, tareas.nombre, tareas.descripcion, tareas.pdf_url, tareas.fecha_limite, 
                          estudiantes.nombre AS estudiante 
                          FROM tareas 
                          JOIN estudiantes ON tareas.estudiante_id = estudiantes.id";
                $result = $conn->query($query);

                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['descripcion'] . "</td>";
                    echo "<td><a href='" . $row['pdf_url'] . "' target='_blank'>Ver PDF</a></td>";
                    echo "<td>" . $row['fecha_limite'] . "</td>";
                    echo "<td>" . $row['estudiante'] . "</td>";
                    echo "<td>
                            <a href='editar_tarea.php?id=" . $row['id'] . "'>Editar</a> | 
                            <a href='eliminar_tarea.php?id=" . $row['id'] . "'>Eliminar</a>
                          </td>";
                    echo "</tr>";
                }

                $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
