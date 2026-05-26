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
</head>
<body>

<h1>Lista de productos</h1>
<a href="insertar_producto.php">Agregar producto</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Categoría</th>
        <th>Precio</th>
        <th>Stock</th>

        <th>editar</th>
        
        <th>Eliminar</th>
    </tr>

    <?php while ($fila = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $fila["id_producto"]; ?></td>
            <td><?php echo $fila["nombre"]; ?></td>
            <td><?php echo $fila["categoria"]; ?></td>
            <td><?php echo $fila["precio"]; ?></td>
            <td><?php echo $fila["stock"]; ?></td>


<td>
    <a href="editar_producto.php?id=<?php echo $fila['id_producto']; ?>">
        Editar
    </a>
</td>

            <td>
    <a href="eliminar_producto.php?id=<?php echo $fila['id_producto']; ?>">
        Eliminar
    </a>
</td>
        </tr>
    <?php } ?>

</table>

</body>
</html>