<?php
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

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$fecha_registro = date('Y-m-d H:i:s'); // Fecha y hora actual

// Insertar datos en la tabla
$sql = "INSERT INTO usuarios (nombre, apellido, correo, contrasena, fecha_registro)
        VALUES ('$nombre', '$apellido', '$correo', '$contrasena', '$fecha_registro')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error al registrar datos: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
