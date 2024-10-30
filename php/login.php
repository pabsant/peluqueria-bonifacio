<?php
session_start(); // Iniciar sesión

// Datos de conexión a la base de datos
$servername = "localhost";
$username = "pablo";
$password = "";
$dbname = "peluqueria bonifacio";
$table = "usuarios"; // Nombre de la tabla

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION["usuario"])) {
    $usuario = $_SESSION["usuario"];
    $Roles = $_SESSION["Rol"]; // Obtener el rol de la sesión
} else {
    // Obtener los datos del formulario de inicio de sesión
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Consulta SQL para verificar las credenciales utilizando consultas preparadas
    $stmt = $conn->prepare("SELECT * FROM roles WHERE Usuario = ? AND Contrasena = ?");
    $stmt->bind_param("ss", $usuario, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION["usuario"] = $row["usuario"]; // Guardar el usuario en la sesión
        $usuario = $row["usuario"];
        $Roles = $row["Rol"]; // Obtener el rol de la consulta
        
    } else {
        header("Location: /Ejercicios/mi_pagina_web/error.html");
        exit(); // Salir si las credenciales no son correctas
    }

    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "<h1>Bienvenido, $usuario</h1>";
    ?>
</body>
</html>
