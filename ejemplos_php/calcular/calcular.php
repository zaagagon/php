<!DOCTYPE html>
<html>
<head>
    <title>Resultado de la Suma</title>
    <!-- Incluye Bootstrap CSS para estilos -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Resultado de la Suma</h1>

        <?php
        if (isset($_POST['numero1']) && isset($_POST['numero2'])) {
            $numero1 = $_POST['numero1'];
            $numero2 = $_POST['numero2'];
            $resultado = $numero1 + $numero2;
            echo '<div class="alert alert-success">La suma de ' . $numero1 . ' y ' . $numero2 . ' es igual a ' . $resultado . '.</div>';
        } else {
            echo '<div class="alert alert-danger">Por favor, ingresa valores válidos.</div>';
        }
        ?>

        <br>
        <a href="formulario.html" class="btn btn-primary">Volver al formulario</a>
    </div>
</body>
</html>
