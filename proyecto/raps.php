<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Evidencias</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Administrar Evidencias</h2>

        <!-- Mostrar Evidencias -->
        <div class="card">
            <div class="card-header">Evidencias por RAP</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>RAP</th>
                            <th>Descripción</th>
                            <th>Semanas</th>
                            <th>Actividad de Aprendizaje</th>
                            <th>Material de Formación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Conexión a la base de datos
                        $conexion = mysqli_connect("localhost", "root", "123456789", "proyecto");
                        // Verificar conexión
                        if (!$conexion) {
                            die("Error de conexión: " . mysqli_connect_error());
                        }

                        // Consulta para obtener las evidencias por RAP
                        $sql = "SELECT RAPs.RAP, RAPs.DESCRIPCION, Evidencias.semanas, Evidencias.actividad_aprendizaje, Evidencias.material_formacion 
                                FROM RAPs 
                                INNER JOIN Evidencias ON RAPs.id_rap = Evidencias.id_rap";
                        $result = mysqli_query($conexion, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row["RAP"] . "</td>";
                                echo "<td>" . $row["DESCRIPCION"] . "</td>";
                                echo "<td>" . $row["semanas"] . "</td>";
                                echo "<td>" . $row["actividad_aprendizaje"] . "</td>";
                                echo "<td>" . $row["material_formacion"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No hay evidencias disponibles</td></tr>";
                        }
                        // Cerrar conexión
                        mysqli_close($conexion);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
