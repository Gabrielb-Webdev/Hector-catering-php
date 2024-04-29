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

// Verificar si se recibió el parámetro "titulo"
if (isset($_GET['titulo'])) {
    $titulo = $_GET['titulo'];

    // Escapar caracteres especiales para evitar inyección SQL
    $titulo = $conn->real_escape_string($titulo);

    // Consultar la base de datos para obtener el evento_id asociado al título del evento
    $sql = "SELECT evento_id FROM detalle_eventos WHERE detail_titulo = '$titulo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Si se encontró un resultado, obtener el evento_id y devolverlo como respuesta JSON
        $row = $result->fetch_assoc();
        $evento_id = $row['evento_id'];
        echo json_encode(array("evento_id" => $evento_id));
    } else {
        // Si no se encontró ningún resultado, devolver un mensaje de error
        echo json_encode(array("error" => "No se encontró ningún evento con el título proporcionado."));
    }
} else {
    // Si no se proporcionó el parámetro "titulo", devolver un mensaje de error
    echo json_encode(array("error" => "No se proporcionó el título del evento."));
}

// Cerrar conexión
$conn->close();
?>
