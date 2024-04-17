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
            // Obtén el data-id del botón clickeado
            var modalId = this.getAttribute("data-id");

            // Obtén el modal correspondiente por su id
            var modal = document.getElementById("myModal");

            // Muestra el modal
            modal.style.display = "flex"; // Cambia el display a flex

            // Aplica un estilo al body para ocultar el scroll
            document.body.style.overflow = "hidden";
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


// mobile

