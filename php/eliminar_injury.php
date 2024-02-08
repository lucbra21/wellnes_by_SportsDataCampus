// ./php/eliminar_injuries.php
<?php

// Asegúrate de que la solicitud es una solicitud POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtiene el cuerpo de la solicitud
    $data = json_decode(file_get_contents('php://input'), true);
    $uniqueId = $data['Id'];

    // Lee el archivo JSON
    $jsonString = file_get_contents('../data/json/injuries.json');
    $injuries = json_decode($jsonString, true);

    // Filtra el array para eliminar el registro deseado
    $filteredInjuries = array_filter($injuries, function ($injury) use ($uniqueId) {
        return $injury['injuryId'] !== $uniqueId;
    });

    // Guarda el archivo JSON actualizado
    file_put_contents('../data/json/injuries.json', json_encode(array_values($filteredInjuries)));

    echo "Registro eliminado con éxito";
} else {
    // Manejar error - método no permitido
    header("HTTP/1.1 405 Method Not Allowed");
    exit;
}

?>
