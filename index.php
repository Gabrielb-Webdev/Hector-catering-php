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
    <link rel="icon" type="image/png" href="sources/favicon.ico">
    <!-- Materialize.css -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/mobile.css">
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
            <img src="sources/LOGO.png" alt="Logo">
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
                <li class="navbar-menu-item"><a href="backend/logout.php">Cerrar sesión</a></li>
            <?php endif; ?>

        </ul>
    </nav>

<!-- Sección 1: Carrusel de fotos -->
<section id="inicio" class="swiper-container">
    <div class="swiper-wrapper">
        <?php include 'backend/consultar_imagenes.php'; ?>
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
<script src="scripts/admin.js"></script>
<?php endif; ?>

<!-- Sección 2: Información de quienes somos -->
<section class="quienes-somos">
    <div class="quienes-somos-content">
        <div class="quienes-somos-img">
            <img src="sources/Bigote-izquierdo.png" alt="Imagen Quiénes somos 1">
        </div>
<h2 class="quienes-somos-contenido" id="sectionTitle">
    <?php include 'backend/section_1_contenido.php'; echo $section_1_titulo; ?>
</h2>
        <div class="quienes-somos-img">
            <img src="sources/Bigote_derecho.png" alt="Imagen Quiénes somos 2">
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
<script src="scripts/info.js"></script>

    <div class="quienes-somos-text">
        <img src="sources/Tenedor.png" alt="Tenedor" class="quienes-somos-img-left">
        <p class="quienes-somos-text-center" id="sectionDescripcion">
              <?php include 'backend/section_1_contenido.php'; echo $section_1_contenido; ?>
        </p>
        <img src="sources/Cuchillo.png" alt="Cuchillo" class="quienes-somos-img-right">
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
<script src="scripts/des.js"></script>
</section>

    <!-- Sección 3: Carrusel de Materialize -->
    <section id="eventos" class="eventos">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="eventos-content">
                        <div class="eventos-img">
                            <img src="sources/Bigote-izquierdo.png" alt="Imagen de evento izquierda">
                        </div>
                        <div class="eventos-titulo">
    <h2 class="titulo" id="eventosTitulo">
        <?php include 'backend/eventos_titulo.php'; echo $eventos_titulo; ?>
    </h2>
                        </div>
                        <div class="eventos-img">
                            <img src="sources/Bigote_derecho.png" alt="Imagen de evento derecha">
                        </div>
                    </div>
<div class="icon-center">
    <?php if (isset($_SESSION['email'])) : ?>
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-plus" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round" id="editEventosIcon" style="cursor: pointer;">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
            <path d="M13.5 6.5l4 4" />
            <path d="M16 19h6" />
            <path d="M19 16v6" />
        </svg>
<?php endif; ?>
</div>
<script src="scripts/eventos_titulo.js"></script>

<!-- Sección de carrusel de eventos -->
<div class="carousel center-align">
    <?php include 'backend/consultar_detalle_eventos.php'; ?>
    <?php foreach ($detalles_eventos as $evento): ?>
        <div class="carousel-item">
            <div class="">
                <h2 id="eventosTituloNew<?php echo $evento['evento_id']; ?>" class="subtitulo"><?php echo $evento["titulo_img_carousel"]; ?></h2>
                <?php if (isset($_SESSION['email'])) : ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-plus edit-eventos-icon white" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round" style="cursor: pointer;" data-evento-id="<?php echo $evento['evento_id']; ?>">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                        <path d="M13.5 6.5l4 4" />
                        <path d="M16 19h6" />
                        <path d="M19 16v6" />
                    </svg>
                <?php endif; ?>
            </div>
            <div class="linea-division"></div>
<div class="lineal">
    <p class="sabor" id="descripcionCorta<?php echo $evento['evento_id']; ?>"><?php echo $evento["descripcion_corta"]; ?></p>
    <?php if (isset($_SESSION['email'])) : ?>
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-plus edit-descripcion-icon white" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round" style="cursor: pointer;" data-evento-id="<?php echo $evento['evento_id']; ?>">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
        <path d="M13.5 6.5l4 4" />
        <path d="M16 19h6" />
        <path d="M19 16v6" />
    </svg>
    <?php endif; ?>
</div>
<div class="">
<img class="caru-hover" src="<?php echo $evento["img_carousel"]; ?>" alt="">
<?php if (isset($_SESSION['email'])) : ?>
<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-plus edite-img-carousel-icon white" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round" style="cursor: pointer;" onclick="confirmarCambioImagen(<?php echo $evento['evento_id']; ?>)">
    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
    <path d="M13.5 6.5l4 4" />
    <path d="M16 19h6" />
    <path d="M19 16v6" />
</svg>
    <?php endif; ?>
</div>
<script>
function confirmarCambioImagen(evento_id) {
    if (confirm("¿Seguro que quieres cambiar la foto?")) {
        // Crear un input de tipo archivo y hacer clic en él para abrir el explorador de archivos
        var inputFile = document.createElement('input');
        inputFile.type = 'file';
        inputFile.accept = 'image/*';
        inputFile.style.display = 'none';

        // Función para manejar el cambio de archivo seleccionado
        inputFile.onchange = function() {
            var file = this.files[0];
            if (file) {
                // Generar un nombre aleatorio para la imagen
                var nombreImagen = generarNombreAleatorio(file.name);
                
                // Construir la ruta completa de la imagen
                var rutaCompleta = '../sources/test/' + nombreImagen;

                // Crear un objeto FormData para enviar el archivo
                var formData = new FormData();
                formData.append('evento_id', evento_id);
                formData.append('nueva_imagen', file, nombreImagen);
                formData.append('ruta_completa', rutaCompleta); // Agregar la ruta completa al FormData

                // Enviar la solicitud AJAX
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'backend/editar_imagen_evento.php', true);
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        alert(xhr.responseText); // Mostrar la respuesta del servidor
                        // Recargar la página o realizar cualquier otra acción necesaria
                        location.reload();
                    } else {
                        alert('Hubo un error al procesar la solicitud.');
                    }
                };
                xhr.send(formData);
            }
        };

        // Agregar el input al documento y hacer clic en él para abrir el explorador de archivos
        document.body.appendChild(inputFile);
        inputFile.click();
    }
}

// Función para generar un nombre aleatorio para la imagen
function generarNombreAleatorio(nombreOriginal) {
    var extension = nombreOriginal.split('.').pop();
    var nombreAleatorio = Math.random().toString(36).substring(7); // Genera una cadena aleatoria de 7 caracteres
    return nombreAleatorio + '.' + extension;
}
</script>

      
            <!-- Aquí se incluye el evento_id como un atributo data-evento-id -->
            <button class="verMasBtn" data-evento-id="<?php echo $evento['evento_id']; ?>">Ver más</button>
        </div>
    <?php endforeach; ?>
</div>

<script src="scripts/custom_events.js"></script>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección 4: Dividido en dos de izquierda a derecha -->
    <section id="contacto" class="section-four">
        <div class="left-half">
            <h2 class="merienda-unique1">¡Contáctanos!</h2>
            <h2 class="merienda-unique2">¿Cómo podemos ayudarte?</h2>
            <img class="img-contact" src="sources/Bandeja-contacto.png" alt="Descripción de la imagen">
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
                <img src="sources/whats-app.png" alt="WhatsApp">
                <p class="contact-f">WhatsApp: +54 9 11-3032-0938</p>
            </div>
            <div class="footer-left-content">
                <img src="sources/Mail.png" alt="Correo">
                <p class="contact-f">Email: legout.eventos.catering@gmail.com</p>
            </div>
        </div>
        <div class="footer-right">
            <img class="img-f" src="sources/LOGO.png" alt="Logo">
        </div>
    </footer>

    <!-- modal -->
<div id="myModal" class="modal">
    <div class="modal-left">
        <span class="close">&times;</span>
        <div class="Titulo_icon">
            <img class="modal-image" src="sources/icons/globos-01.png" alt="Imagen del evento">
            <h2 class="m-h2"></h2>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"></div>
            </div>
            <!-- Agrega la paginación si lo deseas -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="modal-right">
        <h2></h2>
        <p></p>
        <!-- Botón adicional -->
            <a href="https://api.whatsapp.com/send?phone=TUNUMERO" target="_blank" class="btn-floating boton-whatsapp">
        <!-- Icono de WhatsApp de Materialize -->
        <i class="fab fa-whatsapp"></i>
    </a>
    </div>
</div>


    <!-- Materialize.js -->
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Swiper.js -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- JS Main -->
    <script src="scripts/scripts.js"></script>
    
</body>
</html>
