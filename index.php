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
        <div class="quienes-somos-text">
            <img src="sources/Tenedor.png" alt="Tenedor" class="quienes-somos-img-left">
            <p class="quienes-somos-text-center" id="sectionDescripcion">
                  <?php include 'backend/section_1_contenido.php'; echo $section_1_contenido; ?>
            </p>
            <img src="sources/Cuchillo.png" alt="Cuchillo" class="quienes-somos-img-right">
        </div>
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

                    <!-- Sección de carrusel de eventos -->
                    <div class="carousel center-align">
                        <?php include 'backend/consultar_detalle_eventos.php'; ?>
                        <?php foreach ($detalles_eventos as $evento): ?>
                            <div class="carousel-item">
                                <div class="">
                                    <h2 id="eventosTituloNew<?php echo $evento['evento_id']; ?>" class="subtitulo"><?php echo $evento["titulo_img_carousel"]; ?></h2>
                                </div>
                                <div class="linea-division"></div>
                                <div class="lineal">
                                    <p class="sabor" id="descripcionCorta<?php echo $evento['evento_id']; ?>"><?php echo $evento["descripcion_corta"]; ?></p>
                                </div>
                                <div class="">
                                    <img class="caru-hover" src="<?php echo $evento["img_carousel"]; ?>" alt="">
                                </div>
                                <!-- Aquí se incluye el evento_id como un atributo data-evento-id -->
                                <button class="verMasBtn" data-evento-id="<?php echo $evento['evento_id']; ?>">Ver más</button>
                            </div>
                        <?php endforeach; ?>
                    </div>
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
    <h2 id="detail-tittle" data-evento-id="1">Título del evento</h2>
        <p></p>
        <!-- Botón adicional -->
        <button class="boton-adicional">Botón Adicional</button>
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
