<?php
// Datos de conexión a la base de datos
$servername = "roundhouse.proxy.rlwy.net";
$username_db = "root";
$password_db = "MKIacdLxZxrjnYHNMGyhQtekMghFKlGq";
$database = "railway";
$db_port = "12331";

// Conectar a la base de datos
$conn = new mysqli($servername, $username_db, $password_db, $database, $db_port);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener las imágenes del carrusel
$sql = "SELECT imagenes_carousel FROM carousel";
$result = $conn->query($sql);

// Verificar si se encontraron resultados
$imagenes = array();
if ($result->num_rows > 0) {
    // Obtener los datos de las imágenes y almacenarlos en un array
    while ($row = $result->fetch_assoc()) {
        $imagenes[] = $row['imagenes_carousel'];
    }
}

// Cerrar la conexión a la base de datos
$conn->close();

// Devolver el array de imágenes
return $imagenes;
