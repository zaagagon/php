<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>hola</h1>
    
<?php 
$archivo=scandir('.');

echo "<h1>hola**</H1>";

print_r($archivo);
echo "<a href='$archivo'>$archivo</a><br>";
foreach ($archivo as $files) {
    # code...
    if($files!=='.' && $files!=='..'){
        echo "<a href='$files'>$files</a><br>";

    }
}


?>
</body>
</html>


