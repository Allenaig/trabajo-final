<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tareas WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Tarea eliminada correctamente";
    } else {
        echo "Error al eliminar la tarea: " . $conn->error;
    }

    $conn->close();
    header("Location: tareas.php");
}
?>
