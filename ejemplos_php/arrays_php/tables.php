<?php
// Datos: lista de estudiantes
$estudiantes = [
    ["id" => 1, "nombre" => "Juan Pérez", "edad" => 20, "carrera" => "Ingeniería"],
    ["id" => 2, "nombre" => "María Gómez", "edad" => 22, "carrera" => "Derecho"],
    ["id" => 3, "nombre" => "Carlos López", "edad" => 19, "carrera" => "Medicina"],
];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Estudiantes</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Lista de Estudiantes</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Carrera</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estudiantes as $estudiante): ?>
                <tr>
                    <td><?php echo $estudiante["id"]; ?></td>
                    <td><?php echo $estudiante["nombre"]; ?></td>
                    <td><?php echo $estudiante["edad"]; ?></td>
                    <td><?php echo $estudiante["carrera"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
