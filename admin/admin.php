<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faire Eventos</title>
    <!-- Agrega el enlace al favicon -->
    <link rel="icon" type="image/png" href="../sources/favicon.ico">
    <!-- Materialize.css -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="../styles/mobile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&display=swap" rel="stylesheet">
    <!-- Agrega estos enlaces en la sección head de tu HTML -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar">
        <div class="logo">
            <img src="../sources/LOGO.png" alt="Logo">
        </div>
        <!-- Botón de menú de hamburguesa -->
        <button class="mobile-menu-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
        <!-- Lista de menú normal -->
        <ul class="navbar-menu merienda-custom">
            <li class="navbar-menu-item"><a href="#">Inicio</a></li>
            <li class="navbar-menu-item"><a href="#">Eventos</a></li>
            <li class="navbar-menu-item"><a href="#">Contacto</a></li>
            <?php if (isset($_SESSION['email'])) : ?>
                <li class="navbar-menu-item"><a href="../backend/logout.php">Cerrar sesión</a></li>
            <?php endif; ?>

        </ul>
    </nav>

<!-- Sección 1: Carrusel de fotos -->
<section id="inicio" class="swiper-container">
    <div class="swiper-wrapper">
        <?php include '../backend/consultar_imagenes.php'; ?>
        <?php foreach ($imagenes as $imagen): ?>
            <div class="swiper-slide">
                <img src="<?php echo $imagen; ?>" alt="Imagen de carrusel" style="cursor: pointer;">
            </div>
        <?php endforeach; ?>
    </div>
    <!-- Agrega la paginación -->
    <div class="swiper-pagination"></div>
</section>

<!-- Input oculto para cargar imágenes -->
<input type="file" id="fileInput" accept="image/*" style="display:none;">

<!-- Mostrar los iconos solo si se cumplen las condiciones -->
<?php if (isset($_SESSION['email'])) : ?>
    <div class="icons-container">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round" id="icono1" style="cursor: pointer;">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
        <path d="M9 12h6" />
        <path d="M12 9v6" />
    </svg>

    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round" id="icono2" style="cursor: pointer;">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M4 7h16" />
        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
        <path d="M10 12l4 4m0 -4l-4 4" />
    </svg>
</div>

<!-- Solo agregamos el script si se cumplen las condiciones para mostrar los iconos -->
<script src="../scripts/admin.js"></script>
<?php endif; ?>

<!-- Sección 2: Información de quienes somos -->
<section class="quienes-somos">
    <div class="quienes-somos-content">
        <div class="quienes-somos-img">
            <img src="../sources/Bigote-izquierdo.png" alt="Imagen Quiénes somos 1">
        </div>
<h2 class="quienes-somos-contenido" id="sectionTitle">
    <?php include '../backend/section_1_contenido.php'; echo $section_1_titulo; ?>
</h2>
        <div class="quienes-somos-img">
            <img src="../sources/Bigote_derecho.png" alt="Imagen Quiénes somos 2">
        </div>
    </div>
<div class="icon-center">
    <?php if (isset($_SESSION['email'])) : ?>
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-plus" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round" id="editIcon" style="cursor: pointer;">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
            <path d="M13.5 6.5l4 4" />
            <path d="M16 19h6" />
            <path d="M19 16v6" />
        </svg>
    <?php endif; ?>
</div>
<script src="../scripts/info.js"></script>

    <div class="quienes-somos-text">
        <img src="../sources/Tenedor.png" alt="Tenedor" class="quienes-somos-img-left">
        <p class="quienes-somos-text-center" id="sectionDescripcion">
              <?php include '../backend/section_1_contenido.php'; echo $section_1_contenido; ?>
        </p>
        <img src="../sources/Cuchillo.png" alt="Cuchillo" class="quienes-somos-img-right">
    </div>
<div class="icon-center abajo">
    <?php if (isset($_SESSION['email'])) : ?>
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-plus" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round" id="editDescriptionIcon" style="cursor: pointer;">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
            <path d="M13.5 6.5l4 4" />
            <path d="M16 19h6" />
            <path d="M19 16v6" />
        </svg>
    <?php endif; ?>
</div>
<script src="../scripts/des.js"></script>
</section>

<?php
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

// Consulta para obtener los detalles de los eventos
$sql = "SELECT evento_id, img_carousel, titulo_img_carousel, descripcion_corta, carousel_detail_img, detail_titulo, detail_producto FROM detalle_eventos";
$result = $conn->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    echo '<link rel="stylesheet" href="estilos.css">';
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Imagen</th>';
    echo '<th>Título</th>';
    echo '<th>Descripción Corta</th>';
    echo '<th>Carousel Imagen</th>';
    echo '<th>Detalles Título</th>';
    echo '<th>Detalles Producto</th>';
    echo '<th>Icono Título</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Obtener los datos de los detalles de los eventos y almacenarlos en un array
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td class="small"><img class="carousel-img" src="' . $row["img_carousel"] . '" alt="Imagen"></td>';
        echo '<td>' . $row["titulo_img_carousel"] . '</td>';
        echo '<td>' . $row["descripcion_corta"] . '</td>';
        echo '<td class="small"><img class="carousel-img" src="' . $row["carousel_detail_img"] . '" alt="Carousel Imagen"></td>';
        echo '<td>' . $row["detail_titulo"] . '</td>';
        echo '<td>' . $row["detail_producto"] . '</td>';
        echo '<td class="small"><img class="carousel-img" src="ruta_a_la_imagen_estatica.jpg" alt="Icono Imagen"></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "No se encontraron detalles de eventos.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

    <!-- Sección 4: Dividido en dos de izquierda a derecha -->
    <section id="contacto" class="section-four">
        <div class="left-half">
            <h2 class="merienda-unique1">¡Contáctanos!</h2>
            <h2 class="merienda-unique2">¿Cómo podemos ayudarte?</h2>
            <img class="img-contact" src="../sources/Bandeja-contacto.png" alt="Descripción de la imagen">
        </div>
        <div class="right-half">
            <form action="#" method="post" class="contact-form">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" required>

                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo" required>

                <label for="asunto">Asunto</label>
                <input type="text" id="asunto" name="asunto" required>

                <label for="mensaje">¡Déjanos tu consulta!</label>
                <textarea id="mensaje" name="mensaje" rows="4" required></textarea>

                <button type="submit">Enviar</button>
            </form>
        </div>
        <div style="clear: both;"></div>
    </section>

    <!-- Pie de página -->
    <footer class="footer">
        <div class="footer-left">
            <div class="footer-left-content">
                <img src="../sources/whats-app.png" alt="WhatsApp">
                <p class="contact-f">WhatsApp: +54 9 11-3032-0938</p>
            </div>
            <div class="footer-left-content">
                <img src="../sources/Mail.png" alt="Correo">
                <p class="contact-f">Email: legout.eventos.catering@gmail.com</p>
            </div>
        </div>
        <div class="footer-right">
            <img class="img-f" src="../sources/LOGO.png" alt="Logo">
        </div>
    </footer>

    <!-- Materialize.js -->
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Swiper.js -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- JS Main -->
    <script src="../scripts/scripts.js"></script>
    
</body>
</html>
