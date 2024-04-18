<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Incluir el archivo de estado para obtener la información de la sesión
// include 'estado.php';

// Verificar si se recibió un archivo
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Especificar la carpeta de destino
    $uploadDirectory = '../sources/test/';

    // Obtener el nombre y la extensión del archivo
    $fileName = $file['name'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    // Generar un nombre único para el archivo
    $uniqueFileName = uniqid('image_') . '.' . $fileExtension;

    // Ruta completa del archivo de destino
    $targetPath = $uploadDirectory . $uniqueFileName;

    // Mover el archivo al directorio de destino
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        // Si se movió correctamente, insertar la ruta y el correo electrónico en la base de datos
        $rutaImagen = '../sources/test/' . $uniqueFileName;
        $email = isset($_SESSION['email']) ? $_SESSION['email'] : ""; // Obtener el correo electrónico de la sesión

        $sql = "INSERT INTO carousel (imagenes_carousel, email) VALUES ('$rutaImagen', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "La imagen se cargó y la ruta se ha insertado en la base de datos.";
        } else {
            echo "Error al insertar la ruta en la base de datos: " . $conn->error;
        }
    } else {
        // Si hubo un error al mover el archivo, responder con un mensaje de error
        echo 'Error: No se pudo cargar el archivo.';
    }
} else {
    // Si no se recibió ningún archivo, responder con un mensaje de error
    echo 'Error: No se recibió ningún archivo.';
}

// Cerrar la conexión a la base de datos
$conn->close();
