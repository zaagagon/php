
<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
</head>
<body>
    <h1>Usuarios</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
        </tr>

        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        // Conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "123456789", "prueba");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Consulta SQL para seleccionar todos los registros de la tabla usuarios
        $sql = "SELECT id, nombre, correo FROM usuarios";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila["id"] . "</td>";
                echo "<td>" . $fila["nombre"] . "</td>";
                echo "<td>" . $fila["correo"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "No se encontraron registros en la tabla usuarios.";
        }

        $conexion->close();
        ?>

    </table>
</body>
</html>
