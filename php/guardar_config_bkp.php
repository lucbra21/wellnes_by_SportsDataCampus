<?php
// Asegúrate de que se trata de una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];

        // Define la ruta donde se guardará el archivo
        $uploadDir = '../data/bkp/';
        $uploadFile = $uploadDir . basename($file['name']);

        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            echo 'El archivo ha sido cargado con éxito';
        } else {
            http_response_code(500);
            echo 'Error al cargar el archivo';
        }
    } else {
        http_response_code(400);
        echo 'No se recibió ningún archivo';
    }
} else {
    http_response_code(405);
    echo 'Método no permitido';
}
?>
