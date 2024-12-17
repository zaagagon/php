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
        <a href="ver_aprendices3.php" class="btn btn-primary mb-3">Ver todos los Aprendices</a>
        <a href="agregar_ficha.php" class="btn btn-success mb-3">Agregar Ficha</a>
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
                $conexion = new mysqli("localhost", "root", "", "zaga");
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
                        echo "<td>";
                        
                        // Consultar si existen aprendices asociados a la ficha
                        $sql_aprendices = "SELECT COUNT(*) as total FROM aprendices WHERE ficha_id = " . $fila["id"];
                        $resultado_aprendices = $conexion->query($sql_aprendices);
                        $total_aprendices = $resultado_aprendices->fetch_assoc()["total"];
                        
                        // Si no hay aprendices asociados, mostrar mensaje
                        if ($total_aprendices == 0) {
                            echo "<span class='text-muted'>No hay aprendices</span>";
                        } else {
                            // Si hay aprendices asociados, mostrar botón para verlos
                            echo "<a href='ver_aprendices3.php?ficha_id=" . $fila["id"] . "' class='btn btn-info'>Ver Aprendices</a>";
                        }
                        
                        // Botón para eliminar la ficha
                        echo "<a href='eliminar_ficha.php?id=" . $fila["id"] . "' class='btn btn-danger'>Eliminar Ficha</a>";
                        
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No hay fichas</td></tr>";
                }
                $conexion->close();
                ?>
            </tbody>
        </table>
        <a href="ver_fichas.php" class="btn btn-secondary">Regresar a Ver Fichas</a>
    </div>
</body>
</html>
