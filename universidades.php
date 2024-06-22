<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Universidades</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Gestión de Universidades</h1>
    <form id="form-universidad" method="post" action="guardar_universidad.php">
        <label for="nombre">Nombre de la Universidad:</label>
        <input type="text" id="nombre" name="nombre" required>
        <button type="submit">Añadir</button>
    </form>
    <hr>
    <h2>Lista de Universidades</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí se rellenarán las universidades desde PHP -->
            <?php
                include 'conexion.php';
                $query = "SELECT * FROM universidades";
                $result = $conn->query($query);
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>
                            <a href='editar_universidad.php?id=" . $row['id'] . "'>Editar</a> | 
                            <a href='eliminar_universidad.php?id=" . $row['id'] . "'>Eliminar</a>
                          </td>";
                    echo "</tr>";
                }
                $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
