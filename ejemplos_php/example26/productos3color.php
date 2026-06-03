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

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            margin: 0;
            padding: 30px;
        }

        .contenedor {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #0d47a1;
        }

        .btn-agregar {
            display: inline-block;
            background: #1976d2;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .btn-agregar:hover {
            background: #0d47a1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 10px;
        }

        th {
            background: #0d47a1;
            color: white;
            padding: 12px;
        }

        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #e3f2fd;
        }

        .btn-editar {
            color: white;
            background: #f9a825;
            padding: 7px 12px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-eliminar {
            color: white;
            background: #d32f2f;
            padding: 7px 12px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-editar:hover {
            background: #f57f17;
        }

        .btn-eliminar:hover {
            background: #b71c1c;
        }
    </style>
</head>
<body>

<div class="contenedor">

    <h1>Lista de productos TecnoIA</h1>

    <a class="btn-agregar" href="insertar_producto.php">Agregar producto</a>

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
                <td>$<?php echo number_format($fila["precio"], 0, ',', '.'); ?></td>
                <td><?php echo $fila["stock"]; ?></td>

                <td>
                    <a class="btn-editar" href="editar_producto.php?id=<?php echo $fila['id_producto']; ?>">
                        Editar
                    </a>
                </td>

                <td>
                    <a class="btn-eliminar" href="eliminar_producto.php?id=<?php echo $fila['id_producto']; ?>">
                        Eliminar
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>

</div>

</body>
</html>