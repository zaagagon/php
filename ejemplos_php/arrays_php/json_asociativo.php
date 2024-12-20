<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personajes de Marvel</title>
</head>
<body>
    <h1>Personajes de Marvel</h1>

    <?php
    // Crear un array asociativo de personajes de Marvel
    $marvelCharacters = [
        [
            "nombre" => "Iron Man",
            "nombre_real" => "Tony Stark",
            "poderes" => ["Inteligencia", "Traje de alta tecnología", "Multimillonario"],
            "equipo" => "Avengers"
        ],
        [
            "nombre" => "Spider-Man",
            "nombre_real" => "Peter Parker",
            "poderes" => ["Sentido arácnido", "Trepar paredes", "Fuerza sobrehumana"],
            "equipo" => "Avengers"
        ],
        [
            "nombre" => "Captain America",
            "nombre_real" => "Steve Rogers",
            "poderes" => ["Super fuerza", "Escudo indestructible", "Liderazgo"],
            "equipo" => "Avengers"
        ]
    ];

    // Convertir el array PHP a JSON
    $jsonCharacters = json_encode($marvelCharacters, JSON_PRETTY_PRINT);

    // Mostrar los datos en formato JSON
    echo "<h2>Datos en formato JSON:</h2>";
    echo "<pre>$jsonCharacters</pre>";

    // Decodificar el JSON de vuelta a un array
    $decodedCharacters = json_decode($jsonCharacters, true);

    // Mostrar los datos decodificados en HTML
    echo "<h2>Personajes Decodificados:</h2>";
    foreach ($decodedCharacters as $character) {
        echo "<h3>{$character['nombre']} ({$character['nombre_real']})</h3>";
        echo "<p><strong>Poderes:</strong></p>";
        echo "<ul>";
        foreach ($character['poderes'] as $poder) {
            echo "<li>$poder</li>";
        }
        echo "</ul>";
        echo "<p><strong>Equipo:</strong> {$character['equipo']}</p>";
    }
    ?>
</body>
</html>
