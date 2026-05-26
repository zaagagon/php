<?php
include "conexion.php";

$id = $_GET["id"];

$sql = "DELETE FROM productos WHERE id_producto = $id";

if ($conexion->query($sql) === TRUE) {
    echo "Producto eliminado correctamente";
} else {
    echo "Error al eliminar";
}

echo "<br><a href='productos.php'>Volver</a>";
?>