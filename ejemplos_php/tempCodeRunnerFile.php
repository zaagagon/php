<?php
$servername = "localhost";  // Reemplaza con el nombre de tu servidor MySQL
$username = "root";       // Reemplaza con tu nombre de usuario de MySQL
$password = "123456789";           // Reemplaza con tu contraseña de MySQL
$dbname = "prueba"; // Reemplaza con el nombre de tu base de datos

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

echo "Conexión exitosa";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Conexión Exitosa</title>
</head>
<body>
    <h1>Conexión Exitosa</h1>
    <p>La conexión a la base de datos ha sido exitosa.</p>
</body>
</html>