<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Ficha</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Agregar Nueva Ficha</h1>
       
        <form action="procesar_agregar_ficha.php" method="POST">
            <div class="form-group">
                <label for="numero_ficha">Número de Ficha:</label>
                <input type="text" class="form-control" id="numero_ficha" name="numero_ficha" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Ficha</button>
        </form>
        <a href="ver_fichas.php" class="btn btn-secondary mt-3">Regresar a Ver Fichas</a>
    </div>
</body>
</html>
