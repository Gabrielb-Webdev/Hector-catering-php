<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la ruta de la imagen a eliminar desde la solicitud POST
    $rutaImagen = $_POST['rutaImagen'];

    // Convertir la ruta relativa en una ruta absoluta
    $rutaAbsoluta = $_SERVER['DOCUMENT_ROOT'] . parse_url($rutaImagen, PHP_URL_PATH);

    // Consulta SQL para eliminar la imagen de la base de datos
    $sql = "DELETE FROM carousel WHERE imagenes_carousel = ?";

    // Preparar la consulta
    $stmt = $conn->prepare($sql);

    // Vincular los parámetros
    $stmt->bind_param("s", $rutaImagen);

// Ejecutar la consulta
if ($stmt->execute()) {
    // Éxito: la imagen se eliminó correctamente de la base de datos

    // Verificar si la imagen existe en el sistema de archivos antes de intentar eliminarla
    if (file_exists($rutaAbsoluta)) {
        // Intentar eliminar la imagen del sistema de archivos
        if (unlink($rutaAbsoluta)) {
            // Éxito: la imagen se eliminó correctamente del sistema de archivos
            echo "La imagen se ha eliminado correctamente.";

            // Depuración: mostrar la consulta ejecutada
            echo "Consulta ejecutada: " . $sql;

        } else {
            // Error: no se pudo eliminar la imagen del sistema de archivos
            echo "Error al eliminar la imagen del sistema de archivos.";
        }
    } else {
        // La imagen no existe en el sistema de archivos
        echo "La imagen no existe en el sistema de archivos.";
    }
} else {
    // Error: no se pudo eliminar la imagen de la base de datos
    echo "Error al eliminar la imagen de la base de datos: " . $stmt->error;

    // Depuración: mostrar la consulta ejecutada
    echo "Consulta ejecutada: " . $sql;
}


    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
} else {
    // Si la solicitud no es POST, redirigir a alguna página de error
    header("Location: error.php");
    exit();
}
