//Captura de botones
const botonAgregarObjetivo = document.querySelector('button[type="button"]');
const botonAgregarRA = document.querySelector('button[type="button"]');

//Captura de campos
const selectObjetivo = document.querySelector('select[name="objetivo"]');
const selectRA = document.getElementById('losRA');
const inputPesoRA = document.querySelector('input[name="peso"]');

//Captura <div> resultado donde pondré los datos
const divResultado = document.getElementById('resultado');

/* Botón Añadir Objetivo */
// Agrega un event listener al botón
botonAgregarObjetivo.addEventListener('click', function() {
    // Obtiene el índice (posición) del objetivo seleccionado
    const indiceSeleccionado = selectObjetivo.selectedIndex;

    // Obtiene el texto completo del objetivo seleccionado
    const textoObjetivo = selectObjetivo.options[indiceSeleccionado].text;

    // Muestra el resultado en la <div>
    divResultado.textContent = `Objetivo: ${textoObjetivo}`;
});

/* Botón Añadir RA */
// Agrega un event listener al botón
botonAgregarRA.addEventListener('click', function() {
    // Obtiene el índice (posición) del RA seleccionado
    const indiceSeleccionado = selectRA.selectedIndex;

    // Obtiene el texto completo del RA seleccionado
    const textoRA = selectRA.options[indiceSeleccionado].text;

    // Obtiene el valor ingresado en el campo de peso
    const pesoRA = inputPesoRA.value;

    // Obtiene el contenido actual de la <div>
    const contenidoActual = divResultado.textContent;

    // Crea el nuevo resultado
    const nuevoResultado = `RA: ${textoRA} - Peso: ${pesoRA}%`;

    // Muestra el resultado en la <div> (agregando al contenido actual)
    divResultado.textContent = contenidoActual + ' ' + nuevoResultado;
});