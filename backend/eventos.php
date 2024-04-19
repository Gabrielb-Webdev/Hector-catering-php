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

// Consulta SQL para obtener el título de eventos
$sql = "SELECT eventos_titulo FROM eventos";
$result = $conn->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Obtener el título de eventos
    $row = $result->fetch_assoc();
    $eventos_titulo = $row["eventos_titulo"];
} else {
    $eventos_titulo = "Título por defecto";
}

// Cerrar conexión
$conn->close();
?>