<?php
// Función para extraer la ruta de la imagen de la cadena
function extractImagePath($imageString) {
    // Remover los corchetes y comillas dobles
    $imageString = str_replace('["', '', $imageString);
    $imageString = str_replace('"]', '', $imageString);
    return $imageString;
}

// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['evento_id']) && isset($_POST['titulo']) && isset($_POST['descripcion_corta'])) {
    // Obtener los datos del formulario
    $eventoId = $_POST['evento_id'];
    $nuevoTitulo = $_POST['titulo'];
    $nuevaDescripcionCorta = $_POST['descripcion_corta'];
    $nuevoDetalleProducto = $_POST['detail_producto']; // Nueva línea para obtener la descripción del producto
    
    // Verificar si se subió una nueva imagen para img_carousel
    if ($_FILES['img_carousel']['error'] === UPLOAD_ERR_OK) {
        $imgName = $_FILES['img_carousel']['name'];
        $imgTmpName = $_FILES['img_carousel']['tmp_name'];
        $imgType = $_FILES['img_carousel']['type'];
        
        // Guardar la imagen en una ubicación temporal para img_carousel
        $imgPath = "../sources/test/" . $imgName;
        move_uploaded_file($imgTmpName, $imgPath);
    } else {
        // Si no se subió una nueva imagen, conservar la imagen existente para img_carousel
        $imgPath = $_POST['img_carousel_actual'];
    }

    // Verificar si se subió una nueva imagen para carousel_detail_img
    if ($_FILES['carousel_detail_img']['error'] === UPLOAD_ERR_OK) {
        $carouselImgName = $_FILES['carousel_detail_img']['name'];
        $carouselImgTmpName = $_FILES['carousel_detail_img']['tmp_name'];
        $carouselImgType = $_FILES['carousel_detail_img']['type'];
        
        // Formatear la ruta como un array JSON
        $carouselImgPath = '["../sources/test/' . $carouselImgName . '"]'; 
        
        // Mover la imagen a la ubicación deseada para carousel_detail_img
        move_uploaded_file($carouselImgTmpName, "../sources/test/" . $carouselImgName);
    } else {
        // Si no se subió una nueva imagen, conservar la imagen existente para carousel_detail_img
        $carouselImgPath = $_POST['carousel_detail_img_actual'];
    }

    // Verificar si se subió una nueva imagen para icon_eventos
    if ($_FILES['icon_eventos']['error'] === UPLOAD_ERR_OK) {
        $iconEventosName = $_FILES['icon_eventos']['name'];
        $iconEventosTmpName = $_FILES['icon_eventos']['tmp_name'];
        $iconEventosType = $_FILES['icon_eventos']['type'];
        
        // Formatear la ruta como un array JSON
        $iconEventosPath = '["../sources/test/' . $iconEventosName . '"]'; 
        
        // Mover la imagen a la ubicación deseada para icon_eventos
        move_uploaded_file($iconEventosTmpName, "../sources/test/" . $iconEventosName);
    } else {
        // Si no se subió una nueva imagen, conservar la imagen existente para icon_eventos
        $iconEventosPath = $_POST['icon_eventos_actual'];
    }

    // Verificar si se recibió una nueva descripción del producto
    $detailProducto = isset($_POST['detail_producto']) ? $_POST['detail_producto'] : '';

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

    // Preparar la consulta SQL para actualizar el título, la descripción corta, img_carousel, carousel_detail_img, icon_eventos y detail_producto del evento
    $sqlUpdate = "UPDATE detalle_eventos SET titulo_img_carousel = ?, descripcion_corta = ?, img_carousel = ?, carousel_detail_img = ?, icon_eventos = ?, detail_producto = ? WHERE evento_id = ?";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bind_param("ssssssi", $nuevoTitulo, $nuevaDescripcionCorta, $imgPath, $carouselImgPath, $iconEventosPath, $detailProducto, $eventoId);

    // Ejecutar la consulta
    if ($stmtUpdate->execute()) {
        echo "Título, descripción corta e imágenes actualizadas correctamente.";
    } else {
        echo "Error al actualizar el título, la descripción corta y las imágenes.";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "No se recibieron los datos del formulario correctamente.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Edición de Título, Descripción Corta e Imágenes</title>
    <link rel="stylesheet" href="formulario_edit.css">
</head>
<body>
    <h2>Editar Título, Descripción Corta e Imágenes del Evento</h2>

    <?php
    // Definir variables para almacenar el evento_id, el título, la descripción corta y las imágenes predeterminadas
    $eventoId = '';
    $titulo = '';
    $descripcionCorta = '';
    $imgPath = '';
    $carouselImgPath = '';
    $iconEventosPath = '';
    $detailProducto = ''; // Agregar variable para almacenar la descripción del producto

    // Verificar si se recibió el evento_id en la URL
    if(isset($_GET['evento_id'])) {
        // Obtener el evento_id de la URL
        $eventoId = $_GET['evento_id'];

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

        // Consultar la base de datos para obtener el título, la descripción corta, img_carousel, carousel_detail_img, icon_eventos y detail_producto del evento por su ID
        $sql = "SELECT titulo_img_carousel, descripcion_corta, img_carousel, carousel_detail_img, icon_eventos, detail_producto FROM detalle_eventos WHERE evento_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $eventoId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verificar si se encontraron resultados
        if ($result->num_rows > 0) {
            // Obtener el título, la descripción corta, img_carousel, carousel_detail_img, icon_eventos y detail_producto del evento
            $row = $result->fetch_assoc();
            $titulo = $row['titulo_img_carousel'];
            $descripcionCorta = $row['descripcion_corta'];
            $imgPath = extractImagePath($row['img_carousel']);
            $carouselImgPath = extractImagePath($row['carousel_detail_img']);
            $iconEventosPath = extractImagePath($row['icon_eventos']);
            $detailProducto = $row['detail_producto']; // Obtener la descripción del producto
        } else {
            // Si no se encontraron resultados, mostrar un mensaje de error
            echo "No se encontró el título, la descripción corta y las imágenes del evento con ID: " . $eventoId;
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
    } else {
        // Si no se recibió el evento_id, mostrar un mensaje de error
        echo "No se recibió el ID del evento.";
    }
    ?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data" id="editForm">
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" value="<?php echo $titulo ?? ''; ?>" required>
    <br><br>
    <label for="descripcion_corta">Descripción Corta:</label>
    <input type="text" id="descripcion_corta" name="descripcion_corta" value="<?php echo $descripcionCorta ?? ''; ?>" required>
    <br><br>
    <label for="detail_producto">Detalle del Producto:</label> <!-- Agregar campo para la descripción del producto -->
    <input type="text" id="detail_producto" name="detail_producto" value="<?php echo $detailProducto ?? ''; ?>" required>
    <br><br>
    <label for="img_carousel">Imagen Carousel:</label>
    <input type="file" id="img_carousel" name="img_carousel">
    <?php if(isset($imgPath) && !empty($imgPath)) echo '<img src="' . extractImagePath($imgPath) . '" alt="Imagen Carousel">' ?>
    <input type="hidden" name="img_carousel_actual" value="<?php echo $imgPath ?? ''; ?>">
    <br><br>
    <label for="carousel_detail_img">Imagen Carousel Detail:</label>
    <input type="file" id="carousel_detail_img" name="carousel_detail_img">
    <?php if(isset($carouselImgPath) && !empty($carouselImgPath)) echo '<img src="' . extractImagePath($carouselImgPath) . '" alt="Imagen Carousel Detail">' ?>
    <input type="hidden" name="carousel_detail_img_actual" value="<?php echo $carouselImgPath ?? ''; ?>">
    <br><br>
    <label for="icon_eventos">Icono Eventos:</label>
    <input type="file" id="icon_eventos" name="icon_eventos">
    <?php if(isset($iconEventosPath) && !empty($iconEventosPath)) echo '<img src="' . extractImagePath($iconEventosPath) . '" alt="Icono Eventos">' ?>
    <input type="hidden" name="icon_eventos_actual" value="<?php echo $iconEventosPath ?? ''; ?>">
    <br><br>
    <input type="hidden" id="evento_id" name="evento_id" value="<?php echo $eventoId ?? ''; ?>">
    <input type="submit" value="Actualizar Título, Descripción Corta e Imágenes">
</form>

</body>
</html>
