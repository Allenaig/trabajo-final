<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["pdf"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "El archivo ya existe.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["pdf"]["size"] > 5000000) { // 5MB
        echo "El archivo es demasiado grande.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($fileType != "pdf") {
        echo "Solo se permiten archivos PDF.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Error al subir el archivo.";
    } else {
        if (move_uploaded_file($_FILES["pdf"]["tmp_name"], $target_file)) {
            echo "El archivo " . htmlspecialchars(basename($_FILES["pdf"]["name"])) . " ha sido importado correctamente.";
        } else {
            echo "Error al subir el archivo.";
        }
    }
}
?>
