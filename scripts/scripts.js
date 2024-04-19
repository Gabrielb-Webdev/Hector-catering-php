// Espera a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function () {
    // Inicializa Swiper para el slider de imágenes
    var swiper = new Swiper('.swiper-container', {
        // Configuración del slider
        loop: true, // Repetir el slider al final
        autoplay: {
            delay: 5000, // Cambia de diapositiva cada 3 segundos
        },
        pagination: {
            el: '.swiper-pagination', // Selector de la paginación
            clickable: true, // Permite hacer clic en la paginación para cambiar de diapositiva
        },
    });
});

// Elimina la inicialización del carousel, ya que parece que no lo estás utilizando aquí

document.addEventListener('DOMContentLoaded', function () {
    // Obtén todos los botones "Ver más"
    var verMasBtns = document.querySelectorAll(".verMasBtn");

    // Recorre cada botón y agrega un evento clic para mostrar el modal correspondiente
    verMasBtns.forEach(btn => {
        btn.addEventListener("click", function () {
            // Obtén el data-evento-id del botón clickeado
            var eventoId = this.getAttribute("data-evento-id");

            // Muestra el evento_id en la consola
            console.log("Evento ID:", eventoId);

            // Hacer una solicitud AJAX para obtener los detalles del evento seleccionado
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Parsea la respuesta JSON para obtener los detalles del evento
                        var evento = JSON.parse(xhr.responseText);

                        // Obtén el modal correspondiente por su id
                        var modal = document.getElementById("myModal");

                        // Rellenar el modal con la información del evento seleccionado
                        var modalLeft = modal.querySelector(".modal-left h2");
                        modalLeft.textContent = evento.titulo_img_carousel;

                        // Muestra el modal
                        modal.style.display = "flex"; // Cambia el display a flex

                        // Aplica un estilo al body para ocultar el scroll
                        document.body.style.overflow = "hidden";
                    } else {
                        console.error("Error al obtener los detalles del evento.");
                    }
                }
            };
            xhr.open("GET", "backend/obtener_detalles_evento.php?evento_id=" + eventoId, true);
            xhr.send();
        });
    });

    // Obtén todos los elementos span con la clase "close"
    var closeBtns = document.querySelectorAll(".close");

    // Recorre cada botón de cierre y agrega un evento clic para cerrar el modal correspondiente
    closeBtns.forEach(btn => {
        btn.addEventListener("click", function () {
            // Obtén el modal padre del botón de cierre
            var modal = this.closest(".modal");

            // Cierra el modal
            modal.style.display = "none";

            // Restaura el scroll al body
            document.body.style.overflow = "auto";
        });
    });

    // Cuando el usuario haga clic fuera del modal, ciérralo
    window.onclick = function (event) {
        if (event.target.classList.contains("modal")) {
            event.target.style.display = "none";

            // Restaura el scroll al body
            document.body.style.overflow = "auto";
        }
    }
});


document.addEventListener('DOMContentLoaded', () => {
    const elementosCarousel = document.querySelectorAll('.carousel');
    M.Carousel.init(elementosCarousel, {
        duration: 180,
        dist: -150,
        shift: 5,
        padding: 550,
        numVisible: 5,
        indicators: true,
        noWrap: false
    });
});

// mobile.js

document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuButton = document.querySelector('.mobile-menu-button');
    const navbarMenu = document.querySelector('.navbar-menu');
    const menuItems = document.querySelectorAll('.navbar-menu-item');

    mobileMenuButton.addEventListener('click', function () {
        navbarMenu.classList.toggle('active');
        mobileMenuButton.classList.toggle('active');
    });

    // Agregar evento de clic a cada elemento del menú
    menuItems.forEach(function (menuItem) {
        menuItem.addEventListener('click', function () {
            // Ocultar el menú al hacer clic en un elemento
            navbarMenu.classList.remove('active');
            mobileMenuButton.classList.remove('active');
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const inicioLink = document.querySelector('.navbar-menu-item:nth-child(1) a');
    const eventosLink = document.querySelector('.navbar-menu-item:nth-child(2) a');
    const contactoLink = document.querySelector('.navbar-menu-item:nth-child(3) a');

    // Función para desplazarse suavemente hasta una sección con un pequeño ajuste hacia arriba
    const scrollToSection = (sectionId, event) => {
        event.preventDefault(); // Detener el comportamiento predeterminado del navegador
        const section = document.getElementById(sectionId);
        if (section) {
            const navbarHeight = document.querySelector('.navbar').offsetHeight; // Obtener la altura de la barra de navegación
            const offset = navbarHeight - 0; // Ajustar el offset para desplazarse un poco más arriba
            const sectionPosition = section.offsetTop - offset; // Calcular la posición de desplazamiento
            window.scrollTo({ top: sectionPosition, behavior: 'smooth' }); // Desplazarse a la posición calculada suavemente
        }
    };

    // Agregar eventos de clic a cada elemento del menú
    inicioLink.addEventListener('click', (e) => scrollToSection('inicio', e));
    eventosLink.addEventListener('click', (e) => scrollToSection('eventos', e));
    contactoLink.addEventListener('click', (e) => scrollToSection('contacto', e));
});

document.addEventListener('DOMContentLoaded', function () {
    const logoLink = document.querySelector('.logo img');
    const logoFLink = document.querySelector('.img-f');

    // Función para redireccionar a index.php
    function redirectToIndex() {
        window.location.href = '../index.php';
    }

    // Agregar evento de clic al logo en la barra de navegación
    logoLink.addEventListener('click', function (e) {
        e.preventDefault(); // Evita el comportamiento predeterminado del enlace
        redirectToIndex();
    });

    // Agregar evento de clic al logo en el footer
    logoFLink.addEventListener('click', function (e) {
        e.preventDefault(); // Evita el comportamiento predeterminado del enlace
        redirectToIndex();
    });
});

