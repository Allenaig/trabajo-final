<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    $query = "UPDATE universidades SET nombre='$nombre' WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        echo "Universidad actualizada correctamente.";
    } else {
        echo "Error al actualizar la universidad: " . $conn->error;
    }
} else {
    echo "Acceso no autorizado.";
}
?>
