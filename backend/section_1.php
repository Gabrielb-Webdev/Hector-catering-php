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

// Consulta SQL para obtener el título de la sección 1
$sql = "SELECT section_1_titulo FROM section_1";
$result = $conn->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Mostrar el título
    while($row = $result->fetch_assoc()) {
        echo "<h2 class='quienes-somos-contenido'>" . $row["section_1_titulo"] . "</h2>";
    }
} else {
    echo "No se encontraron resultados";
}

// Cerrar conexión
$conn->close();
