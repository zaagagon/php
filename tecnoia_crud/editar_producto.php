<?php
include "conexion.php";

$id = $_GET["id"];

$sql = "SELECT * FROM productos WHERE id_producto = $id";
$resultado = $conexion->query($sql);
$producto = $resultado->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $categoria = $_POST["categoria"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];

    $sql_update = "UPDATE productos 
                   SET nombre='$nombre',
                       categoria='$categoria',
                       precio='$precio',
                       stock='$stock'
                   WHERE id_producto=$id";

    if ($conexion->query($sql_update) === TRUE) {
        header("Location: productos.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar producto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<main class="formulario">
    <h1>Editar producto</h1>

    <form method="POST">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required>

        <label>Categoría</label>
        <input type="text" name="categoria" value="<?php echo $producto['categoria']; ?>" required>

        <label>Precio</label>
        <input type="number" name="precio" value="<?php echo $producto['precio']; ?>" required>

        <label>Stock</label>
        <input type="number" name="stock" value="<?php echo $producto['stock']; ?>" required>

        <button class="btn principal" type="submit">Actualizar producto</button>
    </form>
</main>

</body>
</html>
