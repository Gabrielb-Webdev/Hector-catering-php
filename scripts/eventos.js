// Función para activar el modo de edición del título de eventos
function activateEditModeEventos() {
    const eventosTitulo = document.getElementById('eventosTitulo');
    if (eventosTitulo) {
        const tituloText = eventosTitulo.innerText;
        eventosTitulo.innerHTML = `<input type="text" id="editEventosTituloInput" value="${tituloText}" style="width: 100%;">
                                   <button id="acceptEventosButton" class="accept-button">Guardar</button>`;
        const editEventosTituloInput = document.getElementById('editEventosTituloInput');
        editEventosTituloInput.focus();

        // Agregar la clase 'white' al <h2> cuando se active el modo de edición
        eventosTitulo.classList.add('white');

        // Agregar el manejador de eventos al botón "Aceptar"
        const acceptEventosButton = document.getElementById('acceptEventosButton');
        if (acceptEventosButton) {
            acceptEventosButton.addEventListener('click', saveEditedEventosTitulo);
        }

        // Manejar el evento de presionar Enter
        editEventosTituloInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                saveEditedEventosTitulo();
            }
        });
    }
}

// Función para guardar los cambios al título de eventos editado
function saveEditedEventosTitulo() {
    const editedEventosTitulo = document.getElementById('editEventosTituloInput').value;
    const eventosTitulo = document.getElementById('eventosTitulo');
    if (eventosTitulo) {
        // Aquí enviarías el título editado al backend para guardarlo en la base de datos
        // Usaremos AJAX para enviar una solicitud POST al archivo PHP

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'backend/guardar_eventos_titulo.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // La solicitud se completó correctamente
                    // Puedes manejar la respuesta del servidor aquí si es necesario
                    console.log('Título de eventos guardado correctamente');
                } else {
                    // Error en la solicitud
                    console.error('Error al guardar el título de eventos:', xhr.status);
                }
            }
        };
        xhr.send('eventos_titulo=' + encodeURIComponent(editedEventosTitulo));
        
        // Actualizamos el título mostrado en la página
        eventosTitulo.innerText = editedEventosTitulo;

        // Eliminar la clase 'white' al guardar los cambios
        eventosTitulo.classList.remove('white');
    }
}

// Agregar el manejador de eventos al ícono de edición de eventos
const editEventosIcon = document.getElementById('editEventosIcon');
if (editEventosIcon) {
    editEventosIcon.addEventListener('click', activateEditModeEventos);
}
