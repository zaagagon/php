<?php
include "conexion.php";
$sql = "SELECT * FROM productos";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos TecnoIA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<nav class="menu oscuro">
    <h2>TecnoIA</h2>
    <div>
        <a href="index.php">Inicio</a>
        <a href="productos.php">Productos</a>
        <a href="insertar_producto.php">Nuevo producto</a>
    </div>
</nav>

<main class="contenedor">
    <h1>Lista de productos</h1>

    <a class="btn agregar" href="insertar_producto.php">Agregar producto</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>

        <?php while ($fila = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $fila["id_producto"]; ?></td>
                <td><?php echo $fila["nombre"]; ?></td>
                <td><?php echo $fila["categoria"]; ?></td>
                <td>$<?php echo number_format($fila["precio"], 0, ",", "."); ?></td>
                <td><?php echo $fila["stock"]; ?></td>
                <td>
                    <a class="btn editar" href="editar_producto.php?id=<?php echo $fila['id_producto']; ?>">Editar</a>
                </td>
                <td>
                    <a class="btn eliminar"
                       href="eliminar_producto.php?id=<?php echo $fila['id_producto']; ?>"
                       onclick="return confirm('¿Está seguro de eliminar este producto?');">
                       Eliminar
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</main>

</body>
</html>
