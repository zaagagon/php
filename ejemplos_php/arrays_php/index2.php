<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Índice de Archivos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px 10px;
            text-align: center;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        li:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }
        a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
        }
        .icon {
            font-size: 1.5em;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Índice de Archivos</h1>
    </header>
    <main>
        <ul>
            <?php
            // Directorio que quieres listar
            $directorio = "."; // "." indica el directorio actual

            // Abre el directorio
            if (is_dir($directorio)) {
                if ($dh = opendir($directorio)) {
                    // Lee los archivos y directorios
                    while (($archivo = readdir($dh)) !== false) {
                        // Ignora los directorios . y ..
                        if ($archivo !== "." && $archivo !== "..") {
                            // Comprueba si es un archivo o directorio
                            $rutaCompleta = $directorio . "/" . $archivo;
                            if (is_dir($rutaCompleta)) {
                                echo "<li><span class='icon'>📁</span><a href='$rutaCompleta'>$archivo</a></li>";
                            } else {
                                echo "<li><span class='icon'>📄</span><a href='$rutaCompleta'>$archivo</a></li>";
                            }
                        }
                    }
                    closedir($dh);
                } else {
                    echo "<p>No se puede abrir el directorio.</p>";
                }
            } else {
                echo "<p>El directorio especificado no existe.</p>";
            }
            ?>
        </ul>
    </main>
</body>
</html>
