<?php
// Datos de conexión a la base de datos
$host = "localhost";
$dbname = "api_login";
$username = "root";
$password = "";

try {
    // Crear conexión usando PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Activar modo de errores
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Mostrar error si falla la conexión
    echo json_encode([
        "error" => "Error de conexión: " . $e->getMessage()
    ]);
}
?>