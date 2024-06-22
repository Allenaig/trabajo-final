<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 300px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        button {
            margin-bottom: 15px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }

        .register-link {
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Iniciar Sesión</h1>
    </header>
    <div class="container">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>
            <button type="submit">Iniciar Sesión</button>
            <?php if (isset($error)) { echo "<p class='error-message'>$error</p>"; } ?> <!-- Mostrar mensaje de error -->
        </form>
        <div class="register-link"> <!-- Agrega un div para el enlace al registro -->
            <p>¿No tienes una cuenta? <a href="sign-up.php">Regístrate aquí</a></p>
        </div>
    </div>
</body>
</html>

<?php
session_start();

// Verificar si el usuario ya está logueado, redirigir si es así
if (isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

// Verificar el inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí deberías tener una conexión a tu base de datos, por ejemplo:
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

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Consulta SQL para verificar las credenciales
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Credenciales válidas, iniciar sesión y redirigir al usuario a la página de inicio
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }

    $conn->close(); // Cerrar la conexión a la base de datos
}
?>

