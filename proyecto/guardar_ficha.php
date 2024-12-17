<?php
// Verificar si se han enviado datos del formulario mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha recibido el número de ficha desde el formulario
    if (isset($_POST["numero_ficha"])) {
        // Recuperar el número de ficha enviado desde el formulario
        $numero_ficha = $_POST["numero_ficha"];

        // Realizar la conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "123456789", "zaga");

        // Verificar si hay errores de conexión
        if ($conexion->connect_error) {
            die("Error en la conexión: " . $conexion->connect_error);
        }

        // Preparar la consulta SQL para insertar la nueva ficha en la base de datos
        $sql = "INSERT INTO fichas (numero_ficha) VALUES ('$numero_ficha')";

        // Ejecutar la consulta SQL
        if ($conexion->query($sql) === TRUE) {
            // Redirigir de vuelta a la página de ver fichas después de agregar la ficha exitosamente
            header("Location: ver_fichas.php");
            exit(); // Salir del script después de la redirección
        } else {
            echo "Error al agregar la ficha: " . $conexion->error;
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();
    } else {
        echo "Número de ficha no especificado";
    }
} else {
    // Si el script es accedido directamente sin enviar datos del formulario, redirigir de vuelta a la página de ver fichas
    header("Location: ver_fichas.php");
    exit(); // Salir del script después de la redirección
}
?>
