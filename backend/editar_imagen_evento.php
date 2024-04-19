<?php
// Verificar si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['evento_id'])) {
    // Recibir el ID del evento y validar
    $evento_id = $_POST['evento_id'];

    // Verificar si se subió un archivo
    if (isset($_FILES['nueva_imagen']) && $_FILES['nueva_imagen']['error'] === UPLOAD_ERR_OK) {
        // Ruta donde se almacenará la imagen
        $ruta_destino = '../sources/test/';

        // Generar un nombre aleatorio para la imagen
        $nombre_aleatorio = uniqid('imagen_') . '.' . pathinfo($_FILES['nueva_imagen']['name'], PATHINFO_EXTENSION);

        // Mover el archivo al destino con el nuevo nombre
        if (move_uploaded_file($_FILES['nueva_imagen']['tmp_name'], $ruta_destino . $nombre_aleatorio)) {
            // Datos de conexión a la base de datos
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

            // Preparar y ejecutar la consulta SQL para actualizar la imagen en la base de datos
            $sql = "UPDATE detalle_eventos SET img_carousel = ? WHERE evento_id = ?";
            $stmt = $conn->prepare($sql);

            // Crear una variable separada para el nombre de la imagen
            $imagen_path = $ruta_destino . $nombre_aleatorio;

            // Cambiar el primer parámetro de bind_param a "ss" para indicar que estamos enlazando dos strings
            $stmt->bind_param("ss", $imagen_path, $evento_id);
            $stmt->execute();

            // Verificar si la consulta se ejecutó correctamente
            if ($stmt->affected_rows > 0) {
                echo "La imagen se actualizó correctamente en la base de datos.";
            } else {
                echo "No se pudo actualizar la imagen en la base de datos.";
            }

            // Cerrar la conexión a la base de datos
            $stmt->close();
            $conn->close();
        } else {
            echo "Hubo un error al mover el archivo al servidor.";
        }
    } else {
        echo "No se recibió ninguna imagen o hubo un error al cargarla.";
    }
} else {
    echo "Solicitud no válida.";
}
?>
