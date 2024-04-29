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
    // Mostrar mensaje de confirmación
    if (confirm('¿Estás seguro de querer borrar esta imagen?')) {
        // Obtener la imagen actualmente visible en el carrusel
        const imagenActual = document.querySelector('.swiper-slide-active img');
        // Obtener la ruta relativa de la imagen en el proyecto
        const rutaImagen = imagenActual.getAttribute('src');

        // Mostrar la ruta de la imagen en la consola
        console.log('Ruta de la imagen a borrar:', rutaImagen);

        // Enviar una solicitud AJAX para eliminar la imagen del proyecto
        const xhrDeleteFile = new XMLHttpRequest();
        xhrDeleteFile.open('POST', '../backend/delete.php'); // Cambia la ruta según corresponda
        xhrDeleteFile.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhrDeleteFile.onload = function () {
            if (xhrDeleteFile.status === 200) {
                console.log(xhrDeleteFile.responseText);
                // Recargar la página después de la eliminación exitosa
                location.reload();
            } else {
                console.error('Error al intentar eliminar el archivo del sistema de archivos.');
            }
        };

        // Enviar la ruta relativa de la imagen al servidor para eliminar el archivo del sistema de archivos
        xhrDeleteFile.send(`rutaImagen=${rutaImagen}`);
    }
});

