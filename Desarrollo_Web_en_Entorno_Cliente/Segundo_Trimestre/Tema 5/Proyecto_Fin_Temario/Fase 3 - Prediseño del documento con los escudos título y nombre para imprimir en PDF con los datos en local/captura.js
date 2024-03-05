/* Función para el botón Previsualizar Datos */
function alternarVisibilidad() {
    const resultadoDiv = document.getElementById('resultado');
    //Compruebo si está ya visible para mostarlo u ocultarlo
    if (resultadoDiv.style.display === 'none') {
        resultadoDiv.style.display = 'block';
    } else {
        resultadoDiv.style.display = 'none';
    }
}

/* Función para añadir objetivos */
function agregarObjetivo() {
    //Capturo los elementos del DOM y los datos del select (en este caso el option que se ha seleccionado)
    const selectElement = document.querySelector("select[name='objetivo']");
    const selectedOption = selectElement.options[selectElement.selectedIndex].text;
    const textoObjetivo = document.querySelector("#textoObjetivo");

    //Añadir el texto del objetivo seleccionado al contenido existente
    textoObjetivo.innerHTML += selectedOption + "<br>";
}

/* Función para quitar los Objetivos */
function quitarObjetivo() {
    const textoObjetivo = document.querySelector("#textoObjetivo");
    textoObjetivo.innerHTML = "<strong>Objetivo:</strong>";
}

/* Función para añadir RAs y su Peso% */
function agregarRA() {
    //Capturo los elementos del DOM y los datos del select
    const selectElement = document.querySelector("#losRA");
    const selectedOption = selectElement.options[selectElement.selectedIndex].text;
    const pesoInput = document.querySelector("#peso").value;
    const textoRA = document.querySelector("#textoRA");

    //Añado el texto del objetivo seleccionado y el peso al contenido del <p> textoRA
    textoRA.innerHTML += selectedOption + "<strong>Peso:</strong> " + pesoInput + "%" + "<br>";
}

/* Función para quitar los RAs */
function quitarRA() {
    const textoRA = document.querySelector("#textoRA");
    textoRA.innerHTML = "<strong>RA:</strong>";
}

/* Función para añadir los critérios */
function agregarCri() {
    //Capturo los elementos del DOM y los datos del select
    const selectElement = document.querySelector("#losCriterios");
    const selectedOption = selectElement.options[selectElement.selectedIndex].text;
    const criteriosList = document.querySelector("#criterios");

    //Creo un nuevo elemento <li> con el texto del criterio seleccionado
    const nuevoLi = document.createElement("li");
    nuevoLi.textContent = selectedOption;

    //Añado el elemento <li> al final de la lista de criterios
    criteriosList.appendChild(nuevoLi);
}

/* Función para quitar critérios */
function quitarCri() {
    const criteriosList = document.querySelector("#criterios");
    criteriosList.innerHTML = "<strong>Critérios:</strong>";
}

/* Función para añadir tarea */
function agregarTarea() {
    const selectElement = document.querySelector("#tipoTarea");
    const selectedOption = selectElement.options[selectElement.selectedIndex].text;
    const nombreTarea = document.querySelector("#nombreTarea").value;
    const textoTarea = document.querySelector("#textoTarea");

    // Añadir el texto del tipo de tarea y el nombre de la tarea al contenido existente
    textoTarea.innerHTML += " <strong>Tipo:</strong> " + selectedOption + " <strong>Nombre:</strong> " + nombreTarea + "<br>";
}

/* Función para quitar la tarea */
function quitarTarea() {
    const textoTarea = document.querySelector("#textoTarea");
    textoContenido.innerHTML = "<strong>Tarea:</strong>";
}

/* Función para añadir contenido */
function agregarContenido() {
    const nombreContenido = document.querySelector("input[name='nombre']").value;
    const fuenteContenido = document.querySelector("input[name='fuente']").value;
    const textoContenido = document.querySelector("#textoContenido");

    // Añadir el texto del nombre del contenido y la fuente al contenido existente
    textoContenido.innerHTML += "<br><strong>Nombre:</strong> " + nombreContenido + " <strong>Fuente:</strong> " + fuenteContenido;
}

/* Función para quitar el contenido */
function quitarContenido() {
    const textoContenido = document.querySelector("#textoContenido");
    textoContenido.innerHTML = "<strong>Contenido:</strong>";
}