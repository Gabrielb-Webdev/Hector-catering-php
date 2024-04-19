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

// Consulta para obtener los detalles de los eventos
$sql = "SELECT evento_id, img_carousel, titulo_img_carousel, descripcion_corta, carousel_detail_img, detail_titulo, detail_producto FROM detalle_eventos";
$result = $conn->query($sql);

// Verificar si se encontraron resultados
$detalles_eventos = array();
if ($result->num_rows > 0) {
    // Obtener los datos de los detalles de los eventos y almacenarlos en un array
    while ($row = $result->fetch_assoc()) {
        $detalles_eventos[] = $row;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();

// Devolver el array de detalles de eventos
return $detalles_eventos;
?>