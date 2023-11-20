function obtenerMesYAnio() {
    const fechaInput = document.getElementById('fecha');
    const resultadoDiv = document.getElementById('resultado');

    // Obtener la fecha ingresada por el usuario
    const fechaSeleccionada = new Date(fechaInput.value);

    if (!isNaN(fechaSeleccionada.getTime())) { // Verificar si es una fecha válida
        // Obtener mes y año
        const mes = fechaSeleccionada.toLocaleString('default', { month: 'long' });
        const anio = fechaSeleccionada.getFullYear();

        // Mostrar resultado
        resultadoDiv.innerHTML = `<p>Mes: ${mes}</p><p>Año: ${anio}</p>`;
    } else {
        alert('Por favor, escribe una fecha correcta.');
    }
}