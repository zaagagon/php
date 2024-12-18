<!DOCTYPE html>
<html>
<head>
    <title>Resultado de la Suma</title>
</head>
<body>
    <h1>Resultado de la Suma</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero1 = $_POST["numero1"];
        $numero2 = $_POST["numero2"];
        $resultado = $numero1 + $numero2;
        echo "La suma de $numero1 y $numero2 es: $resultado";
    }
    ?>
</body>
</html>
