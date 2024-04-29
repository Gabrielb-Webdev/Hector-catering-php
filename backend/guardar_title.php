<?php
// Datos de conexión a la base de datos
$servername = "roundhouse.proxy.rlwy.net";
$username = "root";
$password = "MKIacdLxZxrjnYHNMGyhQtekMghFKlGq";
$database = "railway";
$db_port = "12331";

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $database, $db_port);

// Verificar la conexión
if ($conexion->connect_error) {
    die('Error de conexión a la base de datos: ' . $conexion->connect_error);
}

// Verificar si se recibió un título a guardar
if (isset($_POST['titulo'])) {
    // Sanitizar y escapar el título para prevenir inyección SQL
    $titulo = $conexion->real_escape_string($_POST['titulo']);

    // Supongamos que recibes también un identificador único del evento
    $evento_id = 1; // Por ejemplo, aquí asumimos que el identificador del evento es 1

    // Consulta SQL para actualizar el título del evento en la tabla detalle_eventos
    $consulta = "UPDATE detalle_eventos SET detail_titulo = '$titulo' WHERE evento_id = $evento_id";

    // Ejecutar la consulta
    if ($conexion->query($consulta) === TRUE) {
        // La consulta se ejecutó con éxito
        echo "Título guardado correctamente";
    } else {
        // Hubo un error al ejecutar la consulta
        echo "Error al guardar el título: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    // Si no se recibió un título, devolver un mensaje de error
    echo "No se recibió ningún título para guardar";
}
?>
