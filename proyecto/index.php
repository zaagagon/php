<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Base de Datos</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Administrar Base de Datos</h2>

        <!-- Formulario para Insertar Nuevo Registro -->
        <div class="card mb-4">
            <div class="card-header">Insertar Nuevo Registro</div>
            <div class="card-body">
                <form method="post" action="insertar.php">
                    <div class="form-group">
                        <label for="rap">RAP:</label>
                        <input type="text" class="form-control" id="rap" name="rap" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="numero_evidencias">Número de Evidencias:</label>
                        <input type="number" class="form-control" id="numero_evidencias" name="numero_evidencias" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Insertar</button>
                </form>
            </div>
        </div>

        <!-- Mostrar Registros de la Tabla RAPs -->
        <div class="card">
            <div class="card-header">Registros de RAPs</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>RAP</th>
                            <th>Descripción</th>
                            <th>Número de Evidencias</th>
                            <th>Acciones</th>
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

                        // Consulta para obtener los registros de RAPs
                        $sql = "SELECT * FROM RAPs";
                        $result = mysqli_query($conexion, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row["RAP"] . "</td>";
                                echo "<td>" . $row["DESCRIPCION"] . "</td>";
                                echo "<td>" . $row["numero_evidencias"] . "</td>";
                                echo "<td><a href='editar.php?id=" . $row["id_rap"] . "' class='btn btn-primary btn-sm'>Editar</a> <a href='eliminar.php?id=" . $row["id_rap"] . "' class='btn btn-danger btn-sm'>Eliminar</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No hay registros</td></tr>";
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
