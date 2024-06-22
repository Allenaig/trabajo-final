<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Carreras</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Gestión de Carreras</h1>
    <form id="form-carrera" method="post" action="guardar_carrera.php">
        <label for="nombre">Nombre de la Carrera:</label>
        <input type="text" id="nombre" name="nombre" required>
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
        <button type="submit">Añadir</button>
    </form>
    <hr>
    <h2>Lista de Carreras</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Universidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí se rellenarán las carreras desde PHP -->
            <?php
                include 'conexion.php';
                $query = "SELECT carreras.id, carreras.nombre AS carrera, universidades.nombre AS universidad 
                          FROM carreras 
                          JOIN universidades ON carreras.universidad_id = universidades.id";
                $result = $conn->query($query);
    
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['carrera'] . "</td>";
                    echo "<td>" . $row['universidad'] . "</td>";
                    echo "<td>
                            <a href='editar_carrera.php?id=" . $row['id'] . "'>Editar</a> | 
                            <a href='eliminar_carrera.php?id=" . $row['id'] . "'>Eliminar</a>
                          </td>";
                    echo "</tr>";
                }
    
                $conn->close();
            ?>
        </tbody>
    </table>
    </body>
    </html>    