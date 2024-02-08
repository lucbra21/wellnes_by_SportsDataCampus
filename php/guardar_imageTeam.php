<?php
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["imageTeamInput"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Asume que quieres subir el archivo (no hay necesidad de verificar si ya existe)
$uploadOk = 1;

// Limita a archivos PNG
if($imageFileType != "png") {
    echo "Lo siento, solo se permiten archivos PNG.";
    $uploadOk = 0;
}

// Si todo está bien, intenta cargar el archivo
if ($uploadOk == 1) {

    $playerId = basename($_FILES['teamImage']['name'], ".png"); // Usamos basename() para obtener el ID del jugador del nombre del archivo
    $destinationPath = "../img/team.png";


    // Mover el archivo subido al directorio de destino, reemplazando el archivo si ya existe
    if (move_uploaded_file($_FILES['teamImage']['tmp_name'], $destinationPath)) {
        echo "La imagen se ha subido correctamente.";
    } else {
        echo "Hubo un error al subir el archivo.";
    }

    // if (move_uploaded_file($_FILES["imageInput"]["tmp_name"], $target_file)) {
    //     echo "El archivo ". htmlspecialchars( basename( $_FILES["imageInput"]["name"])). " ha sido cargado.";
    // } else {
    //     echo "Lo siento, hubo un error cargando tu archivo.";
    // }
}
?>
