<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos (ajusta los valores según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "123456789";
    $dbname = "prueba";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener el ID del formulario
    $id = $_POST['id'];

    // Borrar el usuario
    $sql = "DELETE FROM usuarios WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario borrado exitosamente";
    } else {
        echo "Error al borrar usuario: " . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
} else {
    echo "Acceso denegado";
}
?>
