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

// Verificar si se recibió la descripción corta editada y el ID del evento
if (isset($_POST['descripcion_corta']) && isset($_POST['eventoId'])) {
    $descripcion_corta_editada = $_POST['descripcion_corta'];
    $evento_id = $_POST['eventoId'];

    // Actualizar la descripción corta en la base de datos
    $sql = "UPDATE detalle_eventos SET descripcion_corta = '$descripcion_corta_editada' WHERE evento_id = $evento_id";
    if ($conn->query($sql) === TRUE) {
        echo "Descripción corta del evento actualizada correctamente";
    } else {
        echo "Error al actualizar la descripción corta del evento: " . $conn->error;
    }
} else {
    echo "No se recibió la descripción corta del evento editada o el ID del evento";
}

// Cerrar conexión
$conn->close();
?>
