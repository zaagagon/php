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

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Categoría</th>
        <th>Precio</th>
        <th>Stock</th>

     
    </tr>

    <?php while ($fila = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $fila["id_producto"]; ?></td>
            <td><?php echo $fila["nombre"]; ?></td>
            <td><?php echo $fila["categoria"]; ?></td>
            <td><?php echo $fila["precio"]; ?></td>
            <td><?php echo $fila["stock"]; ?></td>



        </tr>
    <?php } ?>

</table>

</body>
</html>