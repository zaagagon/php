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
        header("Location: productos.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar producto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<nav class="menu oscuro">
    <h2>TecnoIA</h2>
</nav>

<main class="formulario">
    <h1>Agregar producto</h1>

    <form method="POST">
        <label>Nombre</label>
        <input type="text" name="nombre" required>

        <label>Categoría</label>
        <input type="text" name="categoria" required>

        <label>Precio</label>
        <input type="number" name="precio" required>

        <label>Stock</label>
        <input type="number" name="stock" required>

        <button class="btn principal" type="submit">Guardar producto</button>
    </form>
</main>

</body>
</html>
