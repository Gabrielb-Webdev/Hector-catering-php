// Función para activar el modo de edición de la descripción
function activateEditDescription() {
    const sectionDescription = document.getElementById('sectionDescripcion');
    if (sectionDescription) {
        const descriptionText = sectionDescription.innerText;
        sectionDescription.innerHTML = `<textarea id="editDescriptionInput" style="width: 100%;" rows="4">${descriptionText}</textarea>
                                         <button id="acceptDescriptionButton" class="accept-button">Guardar</button>`;
        const editDescriptionInput = document.getElementById('editDescriptionInput');
        editDescriptionInput.focus();

        // Agregar el manejador de eventos al botón "Guardar" de la descripción
        const acceptDescriptionButton = document.getElementById('acceptDescriptionButton');
        if (acceptDescriptionButton) {
            acceptDescriptionButton.addEventListener('click', saveEditedDescription);
        }

        // Manejar el evento de presionar Enter en la descripción
        editDescriptionInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                saveEditedDescription();
            }
        });
    }
}

// Función para guardar los cambios en la descripción
function saveEditedDescription() {
    const editedDescription = document.getElementById('editDescriptionInput').value;
    const sectionDescription = document.getElementById('sectionDescripcion');
    if (sectionDescription) {
        // Aquí enviarías la descripción editada al backend para guardarla en la base de datos
        // Usaremos AJAX para enviar una solicitud POST al archivo PHP

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'backend/guardar_descripcion.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // La solicitud se completó correctamente
                    // Puedes manejar la respuesta del servidor aquí si es necesario
                    console.log('Descripción guardada correctamente');
                } else {
                    // Error en la solicitud
                    console.error('Error al guardar la descripción:', xhr.status);
                }
            }
        };
        xhr.send('descripcion=' + encodeURIComponent(editedDescription));
        
        // Actualizamos la descripción mostrada en la página
        sectionDescription.innerText = editedDescription;

        // Eliminar la clase 'white' al guardar los cambios
        sectionDescription.classList.remove('white');
    }
}

// Función para activar el modo de edición y agregar la clase 'white' en la descripción
function activateEditDescriptionAndAddClass() {
    activateEditDescription();

    // Agregar la clase 'white' cuando se presiona el ícono de edición de la descripción
    const sectionDescription = document.getElementById('sectionDescripcion');
    if (sectionDescription) {
        sectionDescription.classList.add('white');
    }
}

// Agregar el manejador de eventos al ícono de edición de la descripción
const editDescriptionIcon = document.getElementById('editDescriptionIcon');
if (editDescriptionIcon) {
    editDescriptionIcon.addEventListener('click', activateEditDescriptionAndAddClass);
}

