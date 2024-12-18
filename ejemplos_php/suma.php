<?php
// Inicializamos la variable $resultado para manejar la suma
$resultado = null;

// Verificamos si el formulario fue enviado con el método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturamos los valores enviados desde el formulario
    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];

    // Realizamos la suma de los números
    $resultado = $numero1 + $numero2;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Suma</title>
</head>
<body>
    <h1>Suma de Dos Números</h1>
    <!-- Formulario para capturar los números -->
    <form method="POST" action="">
        <label for="numero1">Número 1:</label>
        <input type="number" id="numero1" name="numero1" required>
        <br><br>
        <label for="numero2">Número 2:</label>
        <input type="number" id="numero2" name="numero2" required>
        <br><br>
        <button type="submit">Calcular</button>
    </form>

    <!-- Mostrar el resultado si se ha calculado -->
    <?php if ($resultado !== null): ?>
        <h2>Resultado: <?= htmlspecialchars($resultado) ?></h2>
    <?php endif; ?>
</body>
</html>
