<?php
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "prueba";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Realizar la consulta a la base de datos
$sql = "SELECT * FROM nombre_de_tabla"; // Cambia 'nombre_de_tabla' por el nombre real de tu tabla
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    echo "<!DOCTYPE html>
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
                        <tbody>";

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

    echo "</tbody>
          </table>
      </div>
  </body>
</html>";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conn->close();
?>
