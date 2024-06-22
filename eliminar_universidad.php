<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $universidad_id = $_GET['id'];

    // Verificar si la universidad existe en la base de datos
    $query = "SELECT * FROM universidades WHERE id = '$universidad_id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Eliminar la universidad de la base de datos
        $delete_query = "DELETE FROM universidades WHERE id = '$universidad_id'";
        if ($conn->query($delete_query) === TRUE) {
            echo "<script>
                    alert('Universidad eliminada correctamente.');
                    window.location.href = 'universidades.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error al eliminar la universidad: " . $conn->error . "');
                    window.location.href = 'universidades.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Universidad no encontrada.');
                window.location.href = 'universidades.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID de universidad no proporcionado o método incorrecto.');
            window.location.href = 'universidades.php';
          </script>";
}

$conn->close();
?>
