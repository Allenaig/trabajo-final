<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];

    $sql = "INSERT INTO universidades (nombre) VALUES ('$nombre')";

    if ($conn->query($sql) === TRUE) {
        echo "Nueva universidad añadida correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: universidades.php");
}
?>
