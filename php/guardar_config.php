<?php
// Asegúrate de que se trata de una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene los datos JSON de la solicitud
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    // Verifica si los datos necesarios están presentes
    if (isset($data['data']) && isset($data['sheetName'])) {
        $dir = '../data/json';

        // Crea el directorio si no existe
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        // Guarda los datos en un archivo JSON
        $filename = $dir . '/' . $data['sheetName'] . '.json';
        if (file_put_contents($filename, json_encode($data['data']))) {
            echo 'Archivo guardado con éxito';
        } else {
            http_response_code(500);
            echo 'Error al guardar el archivo';
        }
    } else {
        http_response_code(400);
        echo 'Datos no válidos';
    }
} else {
    http_response_code(405);
    echo 'Método no permitido';
}
?>
