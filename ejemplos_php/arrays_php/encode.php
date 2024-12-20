<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo JSON con PHP</title>
</head>
<body>
    <h1>Ejemplo de JSON con PHP</h1>

    <?php
    // Crear un array no asociativo
    $data = ["manzana", "banana", "cereza", "durazno", "mango"];

    // Convertir el array PHP a JSON usando json_encode
    $jsonData = json_encode($data);

    // Convertir el JSON de nuevo a un array usando json_decode
    $decodedData = json_decode($jsonData, true);

    // Mostrar los resultados
    echo "<h2>Datos en formato JSON:</h2>";
    echo "<p>$jsonData</p>";

    echo "<h2>Datos decodificados:</h2>";
    echo "<ul>";
    foreach ($decodedData as $item) {
        echo "<li>$item</li>";
    }
    echo "</ul>";
    ?>
</body>
</html>
