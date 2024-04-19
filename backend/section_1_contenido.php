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

// Consulta SQL para obtener el título y contenido de la sección 1
$sql = "SELECT section_1_titulo, section_1_contenido FROM section_1";
$result = $conn->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Obtener el título y contenido de la sección 1
    $row = $result->fetch_assoc();
    $section_1_titulo = $row["section_1_titulo"];
    $section_1_contenido = $row["section_1_contenido"];
} else {
    $section_1_titulo = "Título por defecto";
    $section_1_contenido = "Contenido por defecto";
}

// Cerrar conexión
$conn->close();
?>