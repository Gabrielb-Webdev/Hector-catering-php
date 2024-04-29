// Función para activar el modo de edición del título
function activateEditMode() {
    const sectionTitle = document.getElementById('sectionTitle');
    if (sectionTitle) {
        const titleText = sectionTitle.innerText;
        sectionTitle.innerHTML = `<input type="text" id="editTitleInput" value="${titleText}" style="width: 100%;">
                                   <button id="acceptButton" class="accept-button">Guardar</button>`;
        const editTitleInput = document.getElementById('editTitleInput');
        editTitleInput.focus();

        // Agregar la clase 'white' al <h2> cuando se active el modo de edición
        sectionTitle.classList.add('white');

        // Agregar el manejador de eventos al botón "Aceptar"
        const acceptButton = document.getElementById('acceptButton');
        if (acceptButton) {
            acceptButton.addEventListener('click', saveEditedTitle);
        }

        // Manejar el evento de presionar Enter
        editTitleInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                saveEditedTitle();
            }
        });
    }
}

// Función para guardar los cambios al título editado
function saveEditedTitle() {
    const editedTitle = document.getElementById('editTitleInput').value;
    const sectionTitle = document.getElementById('sectionTitle');
    if (sectionTitle) {
        // Aquí enviarías el título editado al ../backend para guardarlo en la base de datos
        // Usaremos AJAX para enviar una solicitud POST al archivo PHP

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../backend/guardar_titulo.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // La solicitud se completó correctamente
                    // Puedes manejar la respuesta del servidor aquí si es necesario
                    console.log('Título guardado correctamente');
                } else {
                    // Error en la solicitud
                    console.error('Error al guardar el título:', xhr.status);
                }
            }
        };
        xhr.send('titulo=' + encodeURIComponent(editedTitle));
        
        // Actualizamos el título mostrado en la página
        sectionTitle.innerText = editedTitle;

        // Eliminar la clase 'white' al guardar los cambios
        sectionTitle.classList.remove('white');
    }
}

// Función para activar el modo de edición y agregar la clase 'white'
function activateEditModeAndAddClass() {
    activateEditMode();

    // Agregar la clase 'white' cuando se presiona el icono de edición
    const sectionTitle = document.getElementById('sectionTitle');
    if (sectionTitle) {
        sectionTitle.classList.add('white');
    }
}

// Agregar el manejador de eventos al ícono de edición
const editIcon = document.getElementById('editIcon');
if (editIcon) {
    editIcon.addEventListener('click', activateEditModeAndAddClass);
}

