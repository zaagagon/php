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
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }
}
?>

<h1>Editar producto</h1>

<form method="POST">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>"><br><br>

    <label>Categoría:</label><br>
    <input type="text" name="categoria" value="<?php echo $producto['categoria']; ?>"><br><br>

    <label>Precio:</label><br>
    <input type="number" name="precio" value="<?php echo $producto['precio']; ?>"><br><br>

    <label>Stock:</label><br>
    <input type="number" name="stock" value="<?php echo $producto['stock']; ?>"><br><br>

    <button type="submit">Actualizar producto</button>
</form>

<br>
<a href="productos.php">Volver</a>