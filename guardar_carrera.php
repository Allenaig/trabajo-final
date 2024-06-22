<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $universidad_id = $_POST['universidad'];

    $sql = "INSERT INTO carreras (nombre, universidad_id) VALUES ('$nombre', '$universidad_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Nueva carrera añadida correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: carreras.php");
}
?>
