<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $estudiante_id = $_POST['estudiante'];
    $fecha_falta = $_POST['fecha_falta'];

    $sql = "INSERT INTO faltas (estudiante_id, fecha_falta) VALUES ('$estudiante_id', '$fecha_falta')";

    if ($conn->query($sql) === TRUE) {
        echo "Nueva falta añadida correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: faltas.php");
}
?>
