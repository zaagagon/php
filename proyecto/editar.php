<?php
// Verificar si se ha proporcionado un ID de RAP válido
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    // Redirigir si el ID no es válido
    header("Location: index.php");
    exit;
}

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "123456789", "proyecto");
// Verificar conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Manejo de la edición del registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $id_rap = $_POST["id"];
    $rap = $_POST["rap"];
    $descripcion = $_POST["descripcion"];
    $numero_evidencias = $_POST["numero_evidencias"];

    // Actualizar el registro en la base de datos
    $sql = "UPDATE RAPs SET RAP='$rap', DESCRIPCION='$descripcion', numero_evidencias=$numero_evidencias WHERE id_rap=$id_rap";
    if (mysqli_query($conexion, $sql)) {
        echo "Registro actualizado exitosamente.";
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conexion);
    }
}

// Obtener el registro del RAP a editar
$id_rap = $_GET['id'];
$sql = "SELECT * FROM RAPs WHERE id_rap=$id_rap";
$resultado = mysqli_query($conexion, $sql);
$rap = mysqli_fetch_assoc($resultado);

// Cerrar conexión
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar RAP</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar RAP</h2>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $rap['id_rap']; ?>">
            <div class="form-group">
                <label for="rap">RAP:</label>
                <input type="text" class="form-control" id="rap" name="rap" value="<?php echo $rap['RAP']; ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required><?php echo $rap['DESCRIPCION']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="numero_evidencias">Número de Evidencias:</label>
                <input type="number" class="form-control" id="numero_evidencias" name="numero_evidencias" value="<?php echo $rap['numero_evidencias']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="administrar.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
