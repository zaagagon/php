<?php
// Indicar que la respuesta será JSON
header("Content-Type: application/json");

// Importar conexión
require_once "config/db.php";

// Recibir datos en formato JSON
$data = json_decode(file_get_contents("php://input"), true);

// Validar datos recibidos
if (!isset($data["usuario"]) || !isset($data["password"])) {
    echo json_encode([
        "error" => "Debe enviar usuario y contraseña"
    ]);
    exit;
}

$usuario = $data["usuario"];
$password = $data["password"];

try {
    // Buscar usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":usuario", $usuario);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si existe el usuario y si la contraseña es correcta
    if ($user && password_verify($password, $user["password"])) {
        echo json_encode([
            "mensaje" => "Autenticación satisfactoria"
        ]);
    } else {
        echo json_encode([
            "error" => "Error en la autenticación"
        ]);
    }

} catch (PDOException $e) {
    echo json_encode([
        "error" => "Error al iniciar sesión",
        "detalle" => $e->getMessage()
    ]);
}
?>