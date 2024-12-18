<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar y Editar Datos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Datos de la Tabla</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>País</th>
            <th>Cargo</th>
            <th>Años</th>
            <th>Acción</th>
        </tr>
        <?php
        // Conexión a la base de datos
        $servername = "tu_servidor";
        $username = "tu_usuario";
        $password = "tu_contraseña";
        $dbname = "tu_base_de_datos";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Consulta SQL para seleccionar todos los datos de la tabla
        $sql = "SELECT * FROM tu_tabla";
        $result = $conn->query($sql);

        // Mostrar los datos en la tabla con un botón de edición para cada fila
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["nombre"]."</td>";
                echo "<td>".$row["edad"]."</td>";
                echo "<td>".$row["pais"]."</td>";
                echo "<td>".$row["cargo"]."</td>";
                echo "<td>".$row["anios"]."</td>";
                echo "<td><a href='editar.php?id=".$row["id"]."'>Editar</a></td>"; // Enlazar a la página de edición con el ID del registro
                echo "</tr>";
            }
        } else {
            echo "No hay datos en la tabla";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
