<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verificar si existen registros relacionados en la tabla de tareas
    $query_check = "SELECT COUNT(*) as count_tareas FROM tareas WHERE estudiante_id='$id'";
    $result_check = $conn->query($query_check);
    $row_check = $result_check->fetch_assoc();
    $count_tareas = $row_check['count_tareas'];

    if ($count_tareas > 0) {
        echo "No se puede eliminar el estudiante porque tiene tareas asignadas. Elimine las tareas asociadas primero.";
    } else {
        // No hay tareas asociadas, se puede proceder con la eliminación
        $query_delete = "DELETE FROM estudiantes WHERE id='$id'";
        if ($conn->query($query_delete) === TRUE) {
            echo "Estudiante eliminado correctamente.";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'estudiantes.php'; // Cambia 'estudiantes.php' por la URL a la que quieres redirigir
                    }, 3000); // Redirigir después de 3 segundos (3000 milisegundos)
                  </script>";
        } else {
            echo "Error al eliminar el estudiante: " . $conn->error;
        }
    }
} else {
    echo "Acceso no autorizado.";
}
?>
