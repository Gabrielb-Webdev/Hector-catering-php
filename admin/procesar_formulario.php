<?php
// Iniciar la sesión (asegúrate de hacerlo antes de cualquier salida al navegador)
session_start();

// Verificar si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si el usuario está autenticado
    if (isset($_SESSION['email'])) {
        // Directorio donde se almacenarán los archivos subidos
        $directorio_subida = '../sources/test/';

        // Verificar y mover archivos subidos al directorio de destino
        $carousel_image_path = moveUploadedFile('imagen_carousel', $directorio_subida);
        $icono_image_path = moveUploadedFile('icono', $directorio_subida);
        $imagen_detalle_path = moveUploadedFile('imagen_detalle', $directorio_subida);

        // Si alguno de los archivos no se subió correctamente, detener el proceso
        if (!$carousel_image_path || !$icono_image_path) {
            exit("Error al subir archivos.");
        }

        // Resto del código para conectar y manipular la base de datos...
        // Conectar a la base de datos
        $servername = "roundhouse.proxy.rlwy.net";
        $username_db = "root";
        $password_db = "MKIacdLxZxrjnYHNMGyhQtekMghFKlGq";
        $database = "railway";
        $db_port = "12331";
        $conn = new mysqli($servername, $username_db, $password_db, $database, $db_port);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Obtener el correo electrónico del usuario de la sesión
        $email_usuario = $_SESSION['email'];

       // Obtener los valores del formulario
        $titulo_img_carousel = $_POST['titulo'];
        $descripcion_corta = $_POST['descripcion_corta'];
        $detail_producto = $_POST['descripcion_larga'];
        $carousel_detail_img = '["' . $carousel_image_path . '"]'; // Formatear la ruta como un array JSON
        $icon_eventos = '["' . $icono_image_path . '"]'; // Formatear la ruta como un array JSON
        // Eliminar el formateo como array JSON para img_carousel
        $img_carousel = $imagen_detalle_path; // Dejar la ruta sin cambios
        $detail_titulo = $_POST['detail_titulo'];


        // Preparar y ejecutar la consulta SQL para insertar los datos en la base de datos
        $sql = "INSERT INTO detalle_eventos (titulo_img_carousel, descripcion_corta, detail_producto, carousel_detail_img, icon_eventos, img_carousel, detail_titulo, email) VALUES ('$titulo_img_carousel', '$descripcion_corta', '$detail_producto', '$carousel_detail_img', '$icon_eventos', '$img_carousel', '$detail_titulo', '$email_usuario')";

        if ($conn->query($sql) === TRUE) {
            // Redireccionar a admin.php
            header("Location: admin.php");
            exit();
        } else {
            echo "Error al insertar datos: " . $conn->error;
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
    } else {
        // Si el usuario no está autenticado, redirigir o mostrar un mensaje de error
        echo "Usuario no autenticado";
    }
} else {
    // Si no es una solicitud POST, redirigir o mostrar un mensaje de error
    echo "Acceso no permitido";
}

// Función para verificar y mover archivos subidos
function moveUploadedFile($input_name, $target_dir) {
    if (!empty($_FILES[$input_name]['name'])) {
        $file_name = basename($_FILES[$input_name]["name"]);
        $target_file = $target_dir . $file_name;
        if (move_uploaded_file($_FILES[$input_name]["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            echo "Error al subir archivo.";
            return null;
        }
    } else {
        echo "No se seleccionó ningún archivo.";
        return null;
    }
}
?>
