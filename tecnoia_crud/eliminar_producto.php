<?php
include "conexion.php";

$id = $_GET["id"];

$sql = "DELETE FROM productos WHERE id_producto = $id";

if ($conexion->query($sql) === TRUE) {
    header("Location: productos.php");
    exit();
}
?>
