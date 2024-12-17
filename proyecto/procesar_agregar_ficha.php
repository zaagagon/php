<?php
// Verificar si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y obtener los datos del formulario
    $numero_ficha = $_POST["numero_ficha"];

    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "123456789", "zaga");
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    // Preparar la consulta SQL para insertar la nueva ficha
    $sql = "INSERT INTO fichas (numero_ficha) VALUES ('$numero_ficha')";

    // Ejecutar la consulta y verificar si se insertó la ficha correctamente
    if ($conexion->query($sql) === TRUE) {
        echo "La ficha se agregó correctamente.";
    } else {
        echo "Error al agregar la ficha: " . $conexion->error;
    }

    $conexion->close();
} else {
    // Manejo de errores o redireccionamiento en caso de que no se haya enviado una solicitud POST
    echo "Error: Se esperaba una solicitud POST.";
}
?>
