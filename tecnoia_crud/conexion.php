<?php
$host = "127.0.0.1";
$usuario = "root";
$password = "";
$base_datos = "tecnoia";
$puerto = 3307;

$conexion = new mysqli($host, $usuario, $password, $base_datos, $puerto);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$conexion->set_charset("utf8");
?>
