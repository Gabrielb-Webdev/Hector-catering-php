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

// Verificar si se recibió la descripción editada
if (isset($_POST['descripcion'])) {
    $descripcion_editada = $_POST['descripcion'];

    // Actualizar la descripción en la base de datos
    $sql = "UPDATE section_1 SET section_1_contenido = '$descripcion_editada'";
    if ($conn->query($sql) === TRUE) {
        echo "Descripción actualizada correctamente";
    } else {
        echo "Error al actualizar la descripción: " . $conn->error;
    }
} else {
    echo "No se recibió la descripción editada";
}

// Cerrar conexión
$conn->close();
?>
