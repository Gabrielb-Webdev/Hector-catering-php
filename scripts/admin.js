// Agregar evento de clic al icono icon-tabler-circle-plus
const icono1 = document.querySelector('.icon-tabler-circle-plus');
icono1.addEventListener('click', () => {
    // Simular clic en el input de archivos
    document.getElementById('fileInput').click(); 
});

// Agregar evento de cambio al input de archivos
const fileInput = document.getElementById('fileInput');
fileInput.addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (file) {
        // Crear objeto XMLHttpRequest para enviar la imagen al servidor
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../backend/upload.php'); // Ajusta la ruta al script que maneja la carga de archivos en tu servidor

        // Callback que se ejecuta cuando la carga es exitosa
        xhr.onload = function() {
    if (xhr.status === 200) {
        console.log('La imagen se ha cargado exitosamente.');
        // Recargar la página después de que la imagen se haya cargado exitosamente
        location.reload();
    } else {
        console.log('Hubo un error al cargar la imagen.');
    }
};


        // Crear un objeto FormData y agregar la imagen al mismo
        const formData = new FormData();
        formData.append('file', file);

        // Enviar la imagen al servidor
        xhr.send(formData);
    }
});


// Agregar evento de clic al icono icon-tabler-trash-x
const icono2 = document.querySelector('.icon-tabler-trash-x');
icono2.addEventListener('click', () => {
    // Obtener la imagen actualmente visible en el carrusel
    const imagenActual = document.querySelector('.swiper-slide-active img');
    // Obtener la ruta completa de la imagen desde la base de datos
    const rutaBaseDatos = obtenerRutaBaseDatos(imagenActual.src);
    // Mostrar la ruta completa de la imagen en la consola
    console.log('La ruta completa de la imagen en la base de datos es:', rutaBaseDatos);
});

// Función para obtener la ruta completa de la imagen desde la base de datos
function obtenerRutaBaseDatos(rutaParcial) {
    // Supongamos que las rutas en la base de datos están en un formato similar a 'sources/test/image_6620481037df6.jpeg'
    // Puedes implementar esta función según cómo estén almacenadas las rutas en tu base de datos
    // Por ahora, simplemente devolveremos la ruta parcial
    return rutaParcial;
}
