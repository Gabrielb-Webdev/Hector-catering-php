<?php
// Verificar si se recibió el evento ID y el texto editado del carrusel de eventos
if (isset($_POST['evento_id']) && isset($_POST['texto_editado'])) {
    // Conectar a la base de datos
    $servername = "roundhouse.proxy.rlwy.net";
    $username = "root";
    $password = "MKIacdLxZxrjnYHNMGyhQtekMghFKlGq";
    $database = "railway";
    $db_port = "12331";

    $conn = new mysqli($servername, $username, $password, $database, $db_port);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener el evento ID y el texto editado
    $evento_id = $_POST['evento_id'];
    $texto_editado = $_POST['texto_editado'];

    // Preparar la consulta SQL para actualizar el texto del carrusel de eventos
    $sql = "UPDATE detalle_eventos SET texto_carrusel = '$texto_editado' WHERE evento_id = $evento_id";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "Texto del carrusel de eventos actualizado correctamente";
    } else {
        echo "Error al actualizar el texto del carrusel de eventos: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si no se recibieron los datos necesarios
    echo "No se recibieron el evento ID y el texto editado del carrusel de eventos";
}
?>
