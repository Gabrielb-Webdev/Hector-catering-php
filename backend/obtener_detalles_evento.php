<?php
// Conexión a la base de datos y consulta para obtener los detalles del evento
$eventoId = $_GET["evento_id"];
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

// Consulta para obtener los detalles del evento con el evento_id proporcionado
$sql = "SELECT titulo_img_carousel FROM detalle_eventos WHERE evento_id = $eventoId";
$result = $conn->query($sql);

// Verificar si se encontraron resultados y devolver los detalles del evento como JSON
if ($result->num_rows > 0) {
    $evento = $result->fetch_assoc();
    echo json_encode($evento);
} else {
    echo json_encode(array("error" => "No se encontraron detalles para el evento con ID $eventoId"));
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
