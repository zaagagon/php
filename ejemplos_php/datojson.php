<?php
// Ruta del archivo JSON
$filePath = 'data.json';

// Leer los datos JSON existentes
function getData($filePath) {
    if (!file_exists($filePath)) {
        return [];
    }
    $jsonData = file_get_contents($filePath);
    return json_decode($jsonData, true);
}

// Guardar los datos en el archivo JSON
function saveData($filePath, $data) {
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($filePath, $jsonData);
}

// Manejo de acciones
$data = getData($filePath);
$updateRecord = null;
$status = null; // Variable para los mensajes

// Cargar datos para actualizar usando GET
if (isset($_GET['action']) && $_GET['action'] === 'load' && isset($_GET['id'])) {
    $idToUpdate = $_GET['id'];
    foreach ($data as $record) {
        if ($record['id'] == $idToUpdate) {
            $updateRecord = $record;
            break;
        }
    }
}

// Actualizar, agregar o eliminar registros
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'add') {
        // Agregar un nuevo registro
        $newId = count($data) > 0 ? end($data)['id'] + 1 : 1;
        $newRecord = [
            'id' => $newId,
            'name' => $_POST['name'],
            'age' => $_POST['age']
        ];
        $data[] = $newRecord;
        saveData($filePath, $data);
        $status = 'added';

    } elseif ($action === 'update') {
        // Actualizar un registro existente
        $idToUpdate = $_POST['id'];
        foreach ($data as &$record) {
            if ($record['id'] == $idToUpdate) {
                $record['name'] = $_POST['name'];
                $record['age'] = $_POST['age'];
                break;
            }
        }
        saveData($filePath, $data);
        $status = 'updated';

    } elseif ($action === 'delete') {
        // Eliminar un registro
        $idToDelete = $_POST['id'];
        $data = array_filter($data, function($record) use ($idToDelete) {
            return $record['id'] != $idToDelete;
        });
        saveData($filePath, $data);
        $status = 'deleted';
    }

    // Redirigir con parámetro de estado
    header('Location: ' . $_SERVER['PHP_SELF'] . '?status=' . $status);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON con PHP</title>
  <!--  <link rel="stylesheet" href="stylesjon.css">-->
 <link rel="stylesheet" href="../stylesjon.css">
    <script>
        // Mostrar alertas basadas en el parámetro 'status' en la URL
        window.onload = function () {
            const urlParams = new URLSearchParams(window.location.search);
            const status = urlParams.get('status');
            if (status === 'added') {
                alert('Registro agregado exitosamente.');
            } else if (status === 'updated') {
                alert('Registro actualizado exitosamente.');
            } else if (status === 'deleted') {
                alert('Registro eliminado exitosamente.');
            }
        }
    </script>
</head>
<body>
    <h1>Gestión de Datos con JSON y PHP</h1>

    <!-- Mostrar datos -->
    <h2>Datos actuales</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $record): ?>
            <tr>
                <td><?= htmlspecialchars($record['id']) ?></td>
                <td><?= htmlspecialchars($record['name']) ?></td>
                <td><?= htmlspecialchars($record['age']) ?></td>
                <td>
                    <!-- Botón para eliminar -->
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($record['id']) ?>">
                        <button type="submit" style="background-color: #dc3545;">Eliminar</button>
                    </form>
                    <!-- Botón para cargar datos en formulario -->
                    <a href="?action=load&id=<?= htmlspecialchars($record['id']) ?>">
                        <button type="button" style="background-color: #28a745;">Actualizar</button>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Formulario para agregar o actualizar datos -->
    <h2><?= $updateRecord ? 'Actualizar Dato' : 'Agregar nuevo dato' ?></h2>
    <form method="POST">
        <input type="hidden" name="action" value="<?= $updateRecord ? 'update' : 'add' ?>">
        <?php if ($updateRecord): ?>
            <input type="hidden" name="id" value="<?= htmlspecialchars($updateRecord['id']) ?>">
        <?php endif; ?>
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="<?= $updateRecord['name'] ?? '' ?>" required>
        <br><br>
        <label for="age">Edad:</label>
        <input type="number" id="age" name="age" value="<?= $updateRecord['age'] ?? '' ?>" required>
        <br><br>
        <button type="submit" style="background-color: #0078D7;">
            <?= $updateRecord ? 'Guardar Cambios' : 'Agregar' ?>
        </button>
    </form>
</body>
</html>
