<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Aprendices</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Aprendices</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ficha ID</th>
                    <th>Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Email</th>
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

                // Consulta SQL para obtener los datos de los aprendices
                $sql = "SELECT * FROM aprendices";
                $resultado = $conexion->query($sql);

                if ($resultado->num_rows > 0) {
                    // Mostrar los datos en la tabla
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila["id"] . "</td>";
                        echo "<td>" . $fila["ficha_id"] . "</td>";
                        echo "<td>" . $fila["documento"] . "</td>";
                        echo "<td>" . $fila["nombres"] . "</td>";
                        echo "<td>" . $fila["apellidos"] . "</td>";
                        echo "<td>" . $fila["telefono"] . "</td>";
                        echo "<td>" . $fila["email"] . "</td>";
                        echo "<td>
                                <a href='editar_aprendiz.php?id=" . $fila["id"] . "' class='btn btn-primary'>Editar</a>
                                <a href='eliminar_aprendiz.php?id=" . $fila["id"] . "' class='btn btn-danger'>Eliminar</a>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No hay aprendices</td></tr>";
                }
                $conexion->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
