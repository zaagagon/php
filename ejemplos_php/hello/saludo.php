<!DOCTYPE html>
<html>
<head>
    <title>Saludo PHP</title>
</head>
<body>
    <h1>Saludo PHP</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        echo "¡Hola, $nombre!";
    }
    ?>
</body>
</html>
