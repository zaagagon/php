<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Datos</title>
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
    <h1>APRENDIENDO PHP 2024</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>País</th>
            <th>Cargo</th>
            <th>Años</th>
        </tr>
        <?php
        // Conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "123456789";
        $dbname = "superball";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Consulta SQL para seleccionar todos los datos de la tabla
        $sql = "SELECT * FROM usuarios";
        $result = $conn->query($sql);

        // Mostrar los datos en la tabla
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["nombre"]."</td>";
                echo "<td>".$row["telefono"]."</td>";
                echo "<td>".$row["edad"]."</td>";
                echo "<td>".$row["pais"]."</td>";
                echo "<td>".$row["cargo"]."</td>";
                echo "<td>".$row["anios"]."</td>";
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
