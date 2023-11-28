<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>
    <h2>Formulario de Registro</h2>

    <form action="insertar.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required><br>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required><br>

        <input type="submit" value="Registrar">
    </form>

    <!-- Lista de Usuarios -->
    <h2 class="mb-4">Lista de Usuarios</h2>

<?php
// Conexión a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "prueba";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consultar todos los usuarios
$result = $conn->query("SELECT * FROM usuarios");

if ($result->num_rows > 0) {
    echo "<ul class='list-group'>";
    while ($row = $result->fetch_assoc()) {
        echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
                <span>ID: {$row['id']}, Nombre: {$row['nombre']}, Apellido: {$row['apellido']}, Correo: {$row['correo']}</span>
                <form action='borrar.php' method='post'>
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <button type='submit' class='btn btn-danger btn-sm'>Borrar</button>
                </form>
              </li>";
    }
    echo "</ul>";
} else {
    echo "No hay usuarios registrados";
}

// Cerrar conexión
$conn->close();
?>

</div>

<!-- Scripts de Bootstrap (jQuery y Popper.js son requeridos) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
