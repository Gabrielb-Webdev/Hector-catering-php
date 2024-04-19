<?php
// Datos de conexión a la base de datos
$servername = "roundhouse.proxy.rlwy.net";
$username = "root";
$password = "MKIacdLxZxrjnYHNMGyhQtekMghFKlGq";
$database = "railway";
$db_port = "12331";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database, $db_port);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se recibió el título editado y el ID del evento
if (isset($_POST['eventos_titulo']) && isset($_POST['eventoId'])) {
    $eventos_titulo_editado = $_POST['eventos_titulo'];
    $evento_id = $_POST['eventoId'];

    // Actualizar el título en la base de datos
    $sql = "UPDATE detalle_eventos SET titulo_img_carousel = '$eventos_titulo_editado' WHERE evento_id = $evento_id";
    if ($conn->query($sql) === TRUE) {
        echo "Título del evento actualizado correctamente";
    } else {
        echo "Error al actualizar el título del evento: " . $conn->error;
    }
} else {
    echo "No se recibió el título del evento editado o el ID del evento";
}

// Cerrar conexión
$conn->close();
?>
