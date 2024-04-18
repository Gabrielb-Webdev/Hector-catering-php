<?php include 'backend/L-index.php'; ?>
<?php include 'backend/consultar_imagenes.php'; ?>
<?php include 'backend/estado.php'; ?>

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
            <?php
            // Verificar si el usuario está autenticado
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                echo '<li class="navbar-menu-item"><a href="../backend/logout.php">Cerrar sesión</a></li>';
            }
            ?>
        </ul>
    </nav>

<!-- Sección 1: Carrusel de fotos -->
<section id="inicio" class="swiper-container">
    <div class="swiper-wrapper">
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
<?php if ($showIcons): ?>
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
            <h2 class="quienes-somos-contenido">¿Quiénes somos?</h2>
            <div class="quienes-somos-img">
                <img src="sources/Bigote_derecho.png" alt="Imagen Quiénes somos 2">
            </div>
        </div>
        <div class="quienes-somos-text">
            <img src="sources/Tenedor.png" alt="Tenedor" class="quienes-somos-img-left">
            <p class="quienes-somos-text-center">
                Somos una empresa con más de 14 años dedicados a ofrecer el mejor servicio para distintos eventos con un gran equipo de profesionales en todas las áreas que se requieren. Tenemos distintas opciones en las que preparamos a las necesidades de nuestros clientes. Nuestra experiencia de trabajar en grandes restaurantes en embajadas como la de Chile, Perú , Uruguay y sobre todo estar en este hermoso país que es Argentina las cuales nos da la opción detener variedades de asados con las más finas carnes el gusto de cliente y sobre todo funcionando los bocaditos y productos internacionales. No lo dude será una experiencia inolvidable para tu evento!
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
                            <h2 class="titulo">Eventos</h2>
                        </div>
                        <div class="eventos-img">
                            <img src="sources/Bigote_derecho.png" alt="Imagen de evento derecha">
                        </div>
                    </div>

                    <div class="carousel center-align">
                        <div class="carousel-item">
                            <h2 class="subtitulo">Donas</h2>
                            <div class="linea-division"></div>
                            <p class="sabor">Glaseadas</p>
                            <img class="caru-hover" src="sources/catering.jpeg" alt="">
                            <button class="verMasBtn" data-id="1">Ver más</button>
                        </div>
                        <div class="carousel-item">
                            <h2 class="subtitulo">Donas</h2>
                            <div class="linea-division"></div>
                            <p class="sabor">Glaseadas</p>
                            <img class="caru-hover" src="sources/Iluminación_y_Sonido.jpeg" alt="">
                            <button class="verMasBtn" data-id="2">Ver más</button>
                        </div>
                        <div class="carousel-item">
                            <h2 class="subtitulo">Donas</h2>
                            <div class="linea-division"></div>
                            <p class="sabor">Glaseadas</p>
                            <img class="caru-hover" src="sources/catering.jpg" alt="">
                            <button class="verMasBtn" data-id="3">Ver más</button>
                        </div>
                        <div class="carousel-item">
                            <h2 class="subtitulo">Donas</h2>
                            <div class="linea-division"></div>
                            <p class="sabor">Glaseadas</p>
                            <img class="caru-hover" src="sources/catering.jpeg" alt="">
                            <button class="verMasBtn" data-id="4">Ver más</button>
                        </div>
                        <div class="carousel-item">
                            <h2 class="subtitulo">Donas</h2>
                            <div class="linea-division"></div>
                            <p class="sabor">Glaseadas</p>
                            <img class="caru-hover" src="sources/test.jpeg" alt="">
                            <button class="verMasBtn" data-id="5">Ver más</button>
                        </div>
                        <div class="carousel-item">
                            <h2 class="subtitulo">Donas</h2>
                            <div class="linea-division"></div>
                            <p class="sabor">Glaseadas</p>
                            <img class="caru-hover" src="sources/Ambientación.jpeg" alt="">
                            <button class="verMasBtn" data-id="6">Ver más</button>
                        </div>
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

     <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-left">
            <span class="close">&times;</span>
            <h2>Lado Izquierdo</h2>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="sources/Ambientación.jpeg" alt="Imagen 1" /></div>
                    <div class="swiper-slide"><img src="sources/Iluminación_y_Sonido.jpeg" alt="Imagen 2" /></div>
                    <div class="swiper-slide"><img src="sources/Ambientación.jpeg" alt="Imagen 3" /></div>
                    <div class="swiper-slide"><img src="sources/Iluminación_y_Sonido.jpeg" alt="Imagen 4" /></div>
                    <!-- Agrega más imágenes si es necesario -->
                </div>
                <!-- Agrega la paginación si lo deseas -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="modal-right">
            <h2 class="">Lado Derecho</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
