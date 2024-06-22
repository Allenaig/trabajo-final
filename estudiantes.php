<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Estudiantes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Gestión de Estudiantes</h1>
    <form id="form-estudiante" method="post" action="guardar_estudiante.php" enctype="multipart/form-data">
        <label for="nombre">Nombre del Estudiante:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" required>
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/jpeg" required>
        <label for="universidad">Universidad:</label>
        <select id="universidad" name="universidad" required>
            <!-- Aquí se rellenarán las universidades desde PHP -->
            <?php
                include 'conexion.php';
                $query = "SELECT * FROM universidades";
                $result = $conn->query($query);

                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                }

                $conn->close();
            ?>
        </select>
        <label for="carrera">Carrera:</label>
        <select id="carrera" name="carrera" required>
            <!-- Aquí se rellenarán las carreras desde PHP -->
            <?php
                include 'conexion.php';
                $query = "SELECT * FROM carreras";
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
    <h2>Lista de Estudiantes</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Universidad</th>
                <th>Carrera</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí se rellenarán los estudiantes desde PHP -->
            <?php
                include 'conexion.php';
                $query = "SELECT estudiantes.id, estudiantes.nombre, estudiantes.dni, estudiantes.imagen, 
                          universidades.nombre AS universidad, carreras.nombre AS carrera 
                          FROM estudiantes 
                          JOIN universidades ON estudiantes.universidad_id = universidades.id 
                          JOIN carreras ON estudiantes.carrera_id = carreras.id";
                $result = $conn->query($query);

                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['dni'] . "</td>";
                    echo "<td>" . $row['universidad'] . "</td>";
                    echo "<td>" . $row['carrera'] . "</td>";
                    echo "<td><img src='uploads/" . $row['imagen'] . "' alt='Imagen de " . $row['nombre'] . "' width='50'></td>";
                    echo "<td>
                            <a href='editar_estudiante.php?id=" . $row['id'] . "'>Editar</a> | 
                            <a href='eliminar_estudiante.php?id=" . $row['id'] . "'>Eliminar</a>
                          </td>";
                    echo "</tr>";
                }

                $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
