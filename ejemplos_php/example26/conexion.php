<?php
$host = "127.0.0.1";
$puerto = 3306;
$usuario = "root";
$password = "";
$base_datos = "tecnoia";

//variables de conexión a la base de datos

$conexion = new mysqli($host, $usuario, $password, $base_datos, $puerto);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$conexion->set_charset("utf8");
?>