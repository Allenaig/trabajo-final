<?php
session_start();

// Verificar si el usuario no está logueado, redirigir al formulario de inicio de sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Tareas para Universidades</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        header {
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        nav {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }
        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }
        nav ul li a {
            text-decoration: none;
            color: #333;
            padding: 5px 10px;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }
        nav ul li a:hover {
            background-color: #007bff;
            color: #fff;
        }
        .panel {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
        }
        .panel-item {
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Sistema de Gestión de Tareas para Universidades</h1>
    </header>
    <div class="container">
        <nav>
            <ul>
                <li><a href="tareas.php">Gestión de Tareas</a></li>
                <li><a href="faltas.php">Reportes de Faltas</a></li>
                <li><a href="universidades.php">Gestión de Universidades</a></li>
                <li><a href="carreras.php">Gestión de Carreras</a></li>
                <li><a href="estudiantes.php">Gestión de Estudiantes</a></li>
                <li><a href="importar_pdf.php">Importar Archivos PDF</a></li>
                <li><a href="perfil.php">Ver Perfil</a></li> <!-- Nueva opción -->
            </ul>
        </nav>
    </div>
    <div class="panel">
        <div class="panel-item">
            <h2>Total de Tareas</h2>
            <p>100</p> <!-- Aquí puedes mostrar el número total de tareas -->
        </div>
        <div class="panel-item">
            <h2>Tareas Completadas</h2>
            <p>75</p> <!-- Aquí puedes mostrar el número de tareas completadas -->
        </div>
        <div class="panel-item">
            <h2>Tareas Pendientes</h2>
            <p>25</p> <!-- Aquí puedes mostrar el número de tareas pendientes -->
        </div>
    </div>
</body>
</html>
