<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
$prueba=scandir('.');
echo implode(', ',$prueba);
foreach (scandir('.') as $archivo) {
    if ($archivo !== "." && $archivo !== "..") {
        echo "<a href='$archivo'>$archivo</a><br>";
    }
}
?>
</body>
</html>


