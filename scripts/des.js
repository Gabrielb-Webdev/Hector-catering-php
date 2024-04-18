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
        // Por ahora, simplemente la mostraremos en la descripción como texto
        sectionDescription.innerHTML = editedDescription;
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
