<?php
session_start();

// Verificar si el usuario ya está logueado, redirigir si es así
if (isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

// Verificar el envío del formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Aquí debes incluir la lógica para guardar las credenciales en tu base de datos
    // Por ejemplo, puedes usar consultas SQL para insertar el nuevo usuario en una tabla de administradores
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "gestion_tareas_universidad";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta SQL para insertar el nuevo usuario en la tabla de administradores
    $sql = "INSERT INTO usuarios (usuario, contrasena) VALUES ('$usuario', '$contrasena')";

    if ($conn->query($sql) === TRUE) {
        // Usuario registrado exitosamente, mostrar mensaje y redirigir a la página de inicio de sesión
        echo '<div class="success-message">Registrado con éxito. Redirigiendo al inicio de sesión...</div>';
        header("refresh:3;url=login.php"); // Redirigir después de 3 segundos a login.php
        exit();
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }

    $conn->close(); // Cerrar la conexión a la base de datos
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Estilos adicionales según tu preferencia */
        .success-message {
            color: green;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Registrarse</h1>
    </header>
    <div class="container">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required><br>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required><br>
            <button type="submit">Registrarse</button>
        </form>
    </div>
</body>
</html>
