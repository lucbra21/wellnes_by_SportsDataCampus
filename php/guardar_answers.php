<?php
// Ruta al archivo JSON
$filePath = '../data/json/answers.json';

// Lee el contenido del archivo JSON
$jsonData = file_get_contents($filePath);
$dataArray = json_decode($jsonData, true);

// Obtiene los datos del cuerpo de la solicitud POST
$postData = json_decode(file_get_contents('php://input'), true);

// Verifica si ya existe un registro con la misma 'date' y 'playerName'
$recordIndex = -1;
foreach ($dataArray as $key => $entry) {
    if ($entry['date'] == $postData['date'] && $entry['playerName'] == $postData['playerName']) {
        $recordIndex = $key;
        break;
    }
}

if ($recordIndex != -1) {
    // Actualiza el registro existente
    $dataArray[$recordIndex] = $postData;
} else {
    // Agrega un nuevo registro
    $dataArray[] = $postData;
}

// Guarda los datos actualizados en el archivo JSON
file_put_contents($filePath, json_encode($dataArray, JSON_PRETTY_PRINT));

echo 'Datos guardados correctamente';
?>
