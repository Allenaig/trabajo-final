<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $estudiante_id = $_POST['estudiante'];
    $descripcion = $_POST['descripcion'];
    $fecha_entrega = $_POST['fecha_entrega'];

    $sql = "INSERT INTO tareas (estudiante_id, descripcion, fecha_entrega) VALUES ('$estudiante_id', '$descripcion', '$fecha_entrega')";

    if ($conn->query($sql) === TRUE) {
        echo "Nueva tarea añadida correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: tareas.php");
}
?>
