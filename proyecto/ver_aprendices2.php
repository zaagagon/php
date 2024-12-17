<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Fichas y Aprendices</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Fichas</h1>
        <a href="ver_aprendices.php" class="btn btn-primary mb-3">Ver todos los Aprendices</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Número de Ficha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexión a la base de datos
                $conexion = new mysqli("localhost", "root", "123456789", "zaga");
                if ($conexion->connect_error) {
                    die("Error en la conexión: " . $conexion->connect_error);
                }

                // Consulta SQL para obtener los datos de las fichas
                $sql = "SELECT * FROM fichas";
                $resultado = $conexion->query($sql);

                if ($resultado->num_rows > 0) {
                    // Mostrar los datos en la tabla
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila["id"] . "</td>";
                        echo "<td>" . $fila["numero_ficha"] . "</td>";
                        echo "<td>
                                <a href='ver_aprendices.php?ficha_id=" . $fila["id"] . "' class='btn btn-info'>Ver Aprendices</a>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No hay fichas</td></tr>";
                }
                $conexion->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
