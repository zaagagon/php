<?php
// Directorio que quieres listar
$directorio = "."; // "." indica el directorio actual

// Abre el directorio
if (is_dir($directorio)) {
    if ($dh = opendir($directorio)) {
        echo "<h1>Índice de Archivos</h1>";
        echo "<ul>";
        
        // Lee los archivos y directorios
        while (($archivo = readdir($dh)) !== false) {
            // Ignora los directorios . y ..
            if ($archivo !== "." && $archivo !== "..") {
                // Comprueba si es un archivo o directorio
                $rutaCompleta = $directorio . "/" . $archivo;
                if (is_dir($rutaCompleta)) {
                    echo "<li><strong>📁 <a href='$rutaCompleta'>$archivo</a></strong></li>";
                } else {
                    echo "<li>📄 <a href='$rutaCompleta'>$archivo</a></li>";
                }
            }
        }
        echo "</ul>";
        closedir($dh);
    } else {
        echo "No se puede abrir el directorio.";
    }
} else {
    echo "El directorio especificado no existe.";
}
?>
