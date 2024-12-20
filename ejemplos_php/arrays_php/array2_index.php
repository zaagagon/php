<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arreglo2</title>
</head>
<body>
    <h1>ARREGLOS INDEXADOS RECORRIDOS</h1>
    <?php

    $personajes=["lolo","yolis","mako"];

    //Para arreglos indexados, implode funciona directamente, uniendo los valores de los elementos en una cadena.

    //creamos cadena
    $cadena = implode(', ',$personajes);
    echo $cadena;

    ?>
</body>
</html>