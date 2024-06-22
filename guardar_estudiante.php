<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $universidad_id = $_POST['universidad'];
    $carrera_id = $_POST['carrera'];

    // Manejo de la imagen
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
    $imagen = basename($_FILES["imagen"]["name"]);

    $sql = "INSERT INTO estudiantes (nombre, dni, imagen, universidad_id, carrera_id) 
            VALUES ('$nombre', '$dni', '$imagen', '$universidad_id', '$carrera_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo estudiante añadido correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: estudiantes.php");
}
?>
