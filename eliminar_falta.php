<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $falta_id = $_GET['id'];

    // Verificar si la falta existe en la base de datos
    $query = "SELECT * FROM faltas WHERE id = '$falta_id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Eliminar la falta de la base de datos
        $delete_query = "DELETE FROM faltas WHERE id = '$falta_id'";
        if ($conn->query($delete_query) === TRUE) {
            echo "<script>
                    alert('Falta eliminada correctamente.');
                    window.location.href = 'faltas.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error al eliminar la falta: " . $conn->error . "');
                    window.location.href = 'faltas.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Falta no encontrada.');
                window.location.href = 'faltas.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID de falta no proporcionado o método incorrecto.');
            window.location.href = 'faltas.php';
          </script>";
}

$conn->close();
?>
