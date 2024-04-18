<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'conexion.php';

// Consultar las imágenes desde la base de datos
$sql = "SELECT imagenes_carousel FROM carousel";
$result = $conn->query($sql);
$imagenes = [];

if ($result->num_rows > 0) {
    // Recorre cada fila de resultados y guarda las rutas de las imágenes en un array
    while($row = $result->fetch_assoc()) {
        $imagenes[] = $row["imagenes_carousel"];
    }
}

// Verificar si la petición es una solicitud AJAX
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // Si es una solicitud AJAX, imprimir el JSON
    echo json_encode($imagenes);
} else {
    // Si no es una solicitud AJAX, no imprimir nada (esto evitará la salida no deseada en la parte superior de la página)
}
// No cerrar la conexión a la base de datos aquí
