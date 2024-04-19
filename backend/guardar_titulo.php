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

// Verificar si se recibió el título editado
if (isset($_POST['titulo'])) {
    $titulo_editado = $_POST['titulo'];

    // Actualizar el título en la base de datos
    $sql = "UPDATE section_1 SET section_1_titulo = '$titulo_editado'";
    if ($conn->query($sql) === TRUE) {
        echo "Título actualizado correctamente";
    } else {
        echo "Error al actualizar el título: " . $conn->error;
    }
} else {
    echo "No se recibió el título editado";
}

// Cerrar conexión
$conn->close();
?>
