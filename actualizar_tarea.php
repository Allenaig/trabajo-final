<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $estudiante_id = $_POST['estudiante'];
    $descripcion = $_POST['descripcion'];
    $fecha_entrega = $_POST['fecha_entrega'];

    $sql = "UPDATE tareas SET estudiante_id='$estudiante_id', descripcion='$descripcion', fecha_entrega='$fecha_entrega' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Tarea actualizada correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: tareas.php");
}
?>
