<!DOCTYPE html>
<html>
<head>
    <title>Consulta Exitosa</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
</head>
<body>
    <div class='container mt-4'>
        <h1>Consulta Exitosa</h1>
        <table class='table'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Mostrar los datos en la tabla
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["nombre"] . "</td>
                            <td>" . $row["apellido"] . "</td>
                            <td>" . $row["correo"] . "</td>
                            <td>" . $row["contrasena"] . "</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
