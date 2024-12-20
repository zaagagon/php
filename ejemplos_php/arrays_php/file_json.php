<?php
// Ruta del archivo JSON
$filePath = 'datos.json';

// Verificar si el archivo existe
if (!file_exists($filePath)) {
    // Si no existe, crear un archivo JSON vacío
    file_put_contents($filePath, json_encode([]));
}

// Leer el contenido del archivo JSON
$jsonContent = file_get_contents($filePath);

// Decodificar el contenido JSON en un arreglo asociativo de PHP
$data = json_decode($jsonContent, true);

// Comprobar si el contenido es un arreglo válido
if (!is_array($data)) {
    $data = [];
}

// Crear un nuevo arreglo para agregar al JSON
$nuevoArreglo = [
    "nombre" => "Neo",
    "edad" => 30,
    "habilidades" => ["PHP", "JavaScript", "Python"]
];

// Agregar el nuevo arreglo al archivo existente
$data[] = $nuevoArreglo;

// Codificar el arreglo actualizado como JSON
$jsonActualizado = json_encode($data, JSON_PRETTY_PRINT);

// Guardar los datos en el archivo JSON
file_put_contents($filePath, $jsonActualizado);

echo "El arreglo ha sido guardado en el archivo JSON.";
?>
