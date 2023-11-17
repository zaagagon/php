<?php
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "prueba";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Realizar la consulta a la base de datos
$sql = "SELECT * FROM nombre_de_tabla"; // Cambia 'nombre_de_tabla' por el nombre real de tu tabla
$result = $conn->query($sql);

// Cerrar la conexión
$conn->close();
?>
