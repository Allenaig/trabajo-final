<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $carrera_id = $_GET['id'];

    // Verificar si la carrera tiene asociados estudiantes
    $query = "SELECT * FROM estudiantes WHERE carrera_id = '$carrera_id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Si hay estudiantes asociados a esta carrera, no se puede eliminar
        echo "<script>
                alert('No se puede eliminar la carrera porque tiene estudiantes asociados.');
                window.location.href = 'carreras.php';
              </script>";
    } else {
        // Eliminar la carrera de la base de datos
        $delete_query = "DELETE FROM carreras WHERE id = '$carrera_id'";
        if ($conn->query($delete_query) === TRUE) {
            echo "<script>
                    alert('Carrera eliminada correctamente.');
                    window.location.href = 'carreras.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error al eliminar la carrera: " . $conn->error . "');
                    window.location.href = 'carreras.php';
                  </script>";
        }
    }
} else {
    echo "<script>
            alert('ID de carrera no proporcionado o método incorrecto.');
            window.location.href = 'gestionar_carreras.php';
          </script>";
}

$conn->close();
?>
