<?php
// Indicar que la respuesta será JSON
header("Content-Type: application/json");

// Importar conexión
require_once "config/db.php";

// Recibir datos en formato JSON
$data = json_decode(file_get_contents("php://input"), true);

// Validar que lleguen usuario y contraseña
if (!isset($data["usuario"]) || !isset($data["password"])) {
    echo json_encode([
        "error" => "Debe enviar usuario y contraseña"
    ]);
    exit;
}

$usuario = $data["usuario"];
$password = $data["password"];

// Encriptar contraseña
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

try {
    // Preparar consulta SQL
    $sql = "INSERT INTO usuarios (usuario, password) VALUES (:usuario, :password)";
    $stmt = $conn->prepare($sql);

    // Asignar valores
    $stmt->bindParam(":usuario", $usuario);
    $stmt->bindParam(":password", $passwordHash);

    // Ejecutar consulta
    $stmt->execute();

    echo json_encode([
        "mensaje" => "Usuario registrado correctamente"
    ]);

} catch (PDOException $e) {
    echo json_encode([
        "error" => "No se pudo registrar el usuario",
        "detalle" => $e->getMessage()
    ]);
}
?>