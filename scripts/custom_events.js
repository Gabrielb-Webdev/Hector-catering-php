// Función para activar el modo de edición del título del evento y agregar la clase 'white'
function activateEditEventTitleAndAddClass(eventoId) {
    const eventosTituloNew = document.getElementById('eventosTituloNew' + eventoId); // Utilizamos el ID del evento para seleccionar el título correspondiente
    if (eventosTituloNew) {
        const eventTitle = eventosTituloNew.innerText;
        eventosTituloNew.innerHTML = `<textarea id="editEventTitleInput${eventoId}" style="width: 100%;" rows="1">${eventTitle}</textarea>
                                         <button id="acceptEventTitleButton${eventoId}" class="accept-button">Guardar</button>`;
        const editEventTitleInput = document.getElementById('editEventTitleInput' + eventoId);
        editEventTitleInput.focus();

        // Agregar el manejador de eventos al botón "Guardar" del título del evento
        const acceptEventTitleButton = document.getElementById('acceptEventTitleButton' + eventoId);
        if (acceptEventTitleButton) {
            acceptEventTitleButton.addEventListener('click', function() {
                saveEditedEventTitle(eventoId);
            });
        }

        // Manejar el evento de presionar Enter en el título del evento
        editEventTitleInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                saveEditedEventTitle(eventoId);
            }
        });
    }
}

// Agregar el manejador de eventos a todos los íconos de edición del título del evento
document.addEventListener('DOMContentLoaded', function() {
    const editEventosIcons = document.querySelectorAll('.edit-eventos-icon');

    editEventosIcons.forEach(icon => {
        icon.addEventListener('click', function() {
            const eventoId = this.getAttribute('data-evento-id');
            activateEditEventTitleAndAddClass(eventoId);
        });
    });
});

// Función para guardar los cambios en el título del evento
function saveEditedEventTitle(eventoId) {
    const editedEventTitle = document.getElementById('editEventTitleInput' + eventoId).value;

    // Aquí enviarías el título editado y el ID del evento al backend para guardarlos en la base de datos
    // Usaremos AJAX para enviar una solicitud POST al archivo PHP

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'backend/guardar_titulo_evento.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // La solicitud se completó correctamente
                // Puedes manejar la respuesta del servidor aquí si es necesario
                console.log('Título del evento guardado correctamente');
            } else {
                // Error en la solicitud
                console.error('Error al guardar el título del evento:', xhr.status);
            }
        }
    };
    xhr.send('eventos_titulo=' + encodeURIComponent(editedEventTitle) + '&eventoId=' + encodeURIComponent(eventoId));
    
    // Actualizamos el título mostrado en la página
    const eventosTituloNew = document.getElementById('eventosTituloNew' + eventoId);
    if (eventosTituloNew) {
        eventosTituloNew.innerText = editedEventTitle;
    }
}

// Función para activar el modo de edición de la descripción corta del evento
function activateEditEventDescriptionAndAddClass(eventoId) {
    const eventosDescripcionNew = document.getElementById('eventosDescripcionNew' + eventoId); // Obtener el elemento de descripción corta
    if (eventosDescripcionNew) {
        const eventDescription = eventosDescripcionNew.innerText;
        eventosDescripcionNew.innerHTML = `<textarea id="editEventDescriptionInput${eventoId}" style="width: 100%;" rows="4">${eventDescription}</textarea>
                                             <button id="acceptEventDescriptionButton${eventoId}" class="accept-button">Guardar</button>`;
        const editEventDescriptionInput = document.getElementById('editEventDescriptionInput' + eventoId);
        editEventDescriptionInput.focus();

        // Agregar el manejador de eventos al botón "Guardar" de la descripción corta del evento
        const acceptEventDescriptionButton = document.getElementById('acceptEventDescriptionButton' + eventoId);
        if (acceptEventDescriptionButton) {
            acceptEventDescriptionButton.addEventListener('click', function() {
                saveEditedEventDescription(eventoId);
            });
        }

        // Manejar el evento de presionar Enter en la descripción corta del evento
        editEventDescriptionInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                saveEditedEventDescription(eventoId);
            }
        });
    }
}

// Función para guardar los cambios en la descripción corta del evento
function saveEditedEventDescription(eventoId) {
    const editedEventDescription = document.getElementById('editEventDescriptionInput' + eventoId).value;

    // Aquí enviarías la descripción corta editada y el ID del evento al backend para guardarlos en la base de datos
    // Usaremos AJAX para enviar una solicitud POST al archivo PHP

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'backend/guardar_descripcion_corta_evento.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // La solicitud se completó correctamente
                // Puedes manejar la respuesta del servidor aquí si es necesario
                console.log('Descripción corta del evento guardada correctamente');
            } else {
                // Error en la solicitud
                console.error('Error al guardar la descripción corta del evento:', xhr.status);
            }
        }
    };
    xhr.send('descripcion_corta=' + encodeURIComponent(editedEventDescription) + '&eventoId=' + encodeURIComponent(eventoId));
    
    // Actualizamos la descripción corta mostrada en la página
    const eventosDescripcionNew = document.getElementById('eventosDescripcionNew' + eventoId);
    if (eventosDescripcionNew) {
        eventosDescripcionNew.innerText = editedEventDescription;
    }
}

// Agregar el manejador de eventos a todos los íconos de edición de la descripción corta del evento
document.addEventListener('DOMContentLoaded', function() {
    const editDescripcionIcons = document.querySelectorAll('.edit-descripcion-icon');

    editDescripcionIcons.forEach(icon => {
        icon.addEventListener('click', function() {
            const eventoId = this.getAttribute('data-evento-id');
            activateEditEventDescriptionAndAddClass(eventoId);
        });
    });
});

// Función para activar el modo de edición de la descripción corta del evento
function activateEditEventDescriptionAndAddClass(eventoId) {
    const descripcionCorta = document.getElementById('descripcionCorta' + eventoId); // Obtener el elemento de descripción corta
    if (descripcionCorta) {
        const eventDescription = descripcionCorta.innerText;
        descripcionCorta.innerHTML = `<textarea id="editEventDescriptionInput${eventoId}" style="width: 100%;" rows="4">${eventDescription}</textarea>
                                             <button id="acceptEventDescriptionButton${eventoId}" class="accept-button">Guardar</button>`;
        const editEventDescriptionInput = document.getElementById('editEventDescriptionInput' + eventoId);
        editEventDescriptionInput.focus();

        // Agregar el manejador de eventos al botón "Guardar" de la descripción corta del evento
        const acceptEventDescriptionButton = document.getElementById('acceptEventDescriptionButton' + eventoId);
        if (acceptEventDescriptionButton) {
            acceptEventDescriptionButton.addEventListener('click', function() {
                saveEditedEventDescription(eventoId);
            });
        }

        // Manejar el evento de presionar Enter en la descripción corta del evento
        editEventDescriptionInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                saveEditedEventDescription(eventoId);
            }
        });
    }
}

// Función para guardar los cambios en la descripción corta del evento
function saveEditedEventDescription(eventoId) {
    const editedEventDescription = document.getElementById('editEventDescriptionInput' + eventoId).value;

    // Aquí enviarías la descripción corta editada y el ID del evento al backend para guardarlos en la base de datos
    // Usaremos AJAX para enviar una solicitud POST al archivo PHP

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'backend/guardar_descripcion_corta_evento.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // La solicitud se completó correctamente
                // Puedes manejar la respuesta del servidor aquí si es necesario
                console.log('Descripción corta del evento guardada correctamente');
            } else {
                // Error en la solicitud
                console.error('Error al guardar la descripción corta del evento:', xhr.status);
            }
        }
    };
    xhr.send('descripcion_corta=' + encodeURIComponent(editedEventDescription) + '&eventoId=' + encodeURIComponent(eventoId));
    
    // Actualizamos la descripción corta mostrada en la página
    const descripcionCorta = document.getElementById('descripcionCorta' + eventoId);
    if (descripcionCorta) {
        descripcionCorta.innerText = editedEventDescription;
    }
}

