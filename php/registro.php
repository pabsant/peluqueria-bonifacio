<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "pablo";
$password = "";
$dbname = "pelqueria bonifacio"; // Asegúrate de que este nombre sea correcto
$table = "usuarios"; // Nombre de la tabla

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se han enviado datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $Nombre = trim($_POST["Nombre"]);
    $Apellidos = trim($_POST["Apellidos"]);
    $Correo = trim($_POST["Correo"]); // Cambiado de Usuario a Correo
    $Contrasena = trim($_POST["Contrasena"]);

    // Preparar la consulta SQL
    $sql = "INSERT INTO usuarios (Nombre, Apellidos, Correo, Contrasena) VALUES (?, ?, ?, ?)"; // Cambiado de Usuario a Correo
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssss", $Nombre, $Apellidos, $Correo, $Contrasena); // Cambiado de Usuario a Correo

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Registro exitoso";
        } else {
            $error = "Error al ejecutar la consulta: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        $error = "Error al preparar la consulta: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
