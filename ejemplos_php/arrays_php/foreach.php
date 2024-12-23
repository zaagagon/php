<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Edad</th>
    <th>Carrera</th>
</tr>
<br>
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
        <tr>
            <td>1</td>
            <td>Juan Pérez</td>
            <td>20</td>
            <td>Ingeniería</td>
        </tr>
        <tr>
            <td>2</td>
            <td>María Gómez</td>
            <td>22</td>
            <td>Derecho</td>
        </tr>
    </tbody>
</table>

<br>

<?php
$personajes = ["hulk", "ironman", "spiderman"];
?>
<ul>
    <?php foreach ($personajes as $personaje): ?>
        <li><?php echo $personaje; ?></li>
    <?php endforeach; ?>
</ul>


<?php
$frutas = ["manzana", "naranja", "plátano"];
foreach ($frutas as $fruta) {
    echo $fruta . "<br>";
}
?>

<?php
$estudiantes = [
    "Juan" => 20,
    "María" => 22,
    "Carlos" => 19
];
foreach ($estudiantes as $nombre => $edad) {
    echo "$nombre tiene $edad años.<br>";
}
?>

</body>
</html>