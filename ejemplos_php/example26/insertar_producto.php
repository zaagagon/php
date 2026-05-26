<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $categoria = $_POST["categoria"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];

    $sql = "INSERT INTO productos(nombre, categoria, precio, stock)
            VALUES('$nombre', '$categoria', '$precio', '$stock')";

    if ($conexion->query($sql) === TRUE) {
        echo "Producto guardado correctamente";
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>

<h1>Registrar producto</h1>

<form method="POST">
    <label>Nombre:</label><br>
    <input type="text" name="nombre"><br><br>

    <label>Categoría:</label><br>
    <input type="text" name="categoria"><br><br>

    <label>Precio:</label><br>
    <input type="number" name="precio"><br><br>

    <label>Stock:</label><br>
    <input type="number" name="stock"><br><br>

    <button type="submit">Guardar producto</button>
</form>

<br>
<a href="productos.php">Ver productos</a>