<?php
// Verificar si se recibió el evento_id y los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['evento_id']) && isset($_POST['titulo']) && isset($_POST['descripcion_corta'])) {
    // Obtener los datos del formulario
    $eventoId = $_POST['evento_id'];
    $nuevoTitulo = $_POST['titulo'];
    $nuevaDescripcionCorta = $_POST['descripcion_corta'];

    // Conectar a la base de datos
    $servername = "roundhouse.proxy.rlwy.net";
    $username_db = "root";
    $password_db = "MKIacdLxZxrjnYHNMGyhQtekMghFKlGq";
    $database = "railway";
    $db_port = "12331";

    $conn = new mysqli($servername, $username_db, $password_db, $database, $db_port);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar la consulta SQL para actualizar el título y la descripción corta del evento
    $sqlUpdate = "UPDATE detalle_eventos SET titulo_img_carousel = ?, descripcion_corta = ? WHERE evento_id = ?";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bind_param("ssi", $nuevoTitulo, $nuevaDescripcionCorta, $eventoId);

    // Ejecutar la consulta
    if ($stmtUpdate->execute()) {
        echo "Título y descripción corta actualizados correctamente.";
    } else {
        echo "Error al actualizar el título y la descripción corta.";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "No se recibieron los datos del formulario correctamente.";
}
?>
