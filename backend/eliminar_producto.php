<?php
// Datos de conexión a la base de datos
$servername = "roundhouse.proxy.rlwy.net";
$username_db = "root";
$password_db = "MKIacdLxZxrjnYHNMGyhQtekMghFKlGq";
$database = "railway";
$db_port = "12331";

// Recibe el evento_id enviado desde el cliente
$evento_id = $_GET['evento_id'];

// Conectar a la base de datos
$conn = new mysqli($servername, $username_db, $password_db, $database, $db_port);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para eliminar el producto de la base de datos
$sql = "DELETE FROM detalle_eventos WHERE evento_id = $evento_id";

if ($conn->query($sql) === TRUE) {
    // La eliminación fue exitosa
    echo json_encode(array('success' => true));
} else {
    // Hubo un error al eliminar el producto
    echo json_encode(array('success' => false, 'error' => $conn->error));
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
