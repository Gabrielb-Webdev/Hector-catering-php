// Modifica la función asociada al evento clic del icono de lápiz
document.addEventListener('DOMContentLoaded', function () {
    // Obtén todos los iconos de lápiz
    var editIcons = document.querySelectorAll(".icon-tabler-pencil-plus");

    // Agrega un evento clic a cada icono de lápiz
    editIcons.forEach(icon => {
        icon.addEventListener("click", function () {
            // Encuentra el título del evento asociado al icono de lápiz clickeado
            var tituloEvento = this.parentNode.querySelector("h2");

            // Hacer una solicitud AJAX para obtener el evento_id del título del evento
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Parsea la respuesta JSON para obtener el evento_id
                        var respuesta = JSON.parse(xhr.responseText);

                        // Muestra el evento_id en la consola del navegador
                        console.log("Evento ID:", respuesta.evento_id);

                        // Luego de obtener el ID del evento, activa la edición del título
                        activateEditTitle(respuesta.evento_id, tituloEvento.textContent);
                    } else {
                        console.error("Error al obtener el evento ID.");
                    }
                }
            };
            // Envía la solicitud AJAX al servidor, pasando el título del evento como parámetro
            xhr.open("GET", "../backend/obtener_evento_id.php?titulo=" + tituloEvento.textContent, true);
            xhr.send();
        });
    });
});

// Función para activar el modo de edición del título del evento
function activateEditTitle(evento_id, titulo) {
    const titleElement = document.getElementById('detail-tittle');
    if (titleElement) {
        const titleText = titleElement.innerText;
        titleElement.innerHTML = `<textarea id="editTitleInput" style="width: 100%;" rows="1">${titleText}</textarea>
                                  <button id="acceptTitleButton" class="accept-button">Guardar</button>`;
        const editTitleInput = document.getElementById('editTitleInput');
        editTitleInput.focus();

        // Agregar el manejador de eventos al botón "Guardar" del título del evento
        const acceptTitleButton = document.getElementById('acceptTitleButton');
        if (acceptTitleButton) {
            acceptTitleButton.addEventListener('click', function() {
                saveEditedTitle(evento_id, titulo);
            });
        }

        // Manejar el evento de presionar Enter en el título del evento
        editTitleInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                saveEditedTitle(evento_id, titulo);
            }
        });
    }
}

// Función para guardar los cambios en el título del evento
function saveEditedTitle(evento_id, titulo) {
    const editedTitle = document.getElementById('editTitleInput').value;
    const titleElement = document.getElementById('detail-tittle');
    if (titleElement) {
        // Aquí enviarías el título editado al backend para guardarlo en la base de datos
        // Usaremos AJAX para enviar una solicitud POST al archivo PHP

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../backend/guardar_title.php', true);
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
        xhr.send('evento_id=' + evento_id + '&titulo=' + encodeURIComponent(editedTitle));

        // Actualizar el título mostrado en la página
        titleElement.innerText = editedTitle;
    }
}
