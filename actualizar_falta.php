<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $fecha = $_POST['fecha'];

    $query = "UPDATE faltas SET fecha='$fecha' WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        echo "Falta actualizada correctamente.";
    } else {
        echo "Error al actualizar la falta: " . $conn->error;
    }
} else {
    echo "Acceso no autorizado.";
}
?>
