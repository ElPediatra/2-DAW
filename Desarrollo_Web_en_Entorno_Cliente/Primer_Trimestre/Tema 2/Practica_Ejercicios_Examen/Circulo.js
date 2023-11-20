function dibujarCirculo() {
    const radioCirculo = document.getElementById('radio');
    const circuloAqui = document.getElementById('circuloAqui');

    // Obtener el valor ingresado por el usuario
    const radio = parseInt(radioCirculo.value);

    // Validar que el valor sea un número válido y mayor que cero
    if (!isNaN(radio) && radio > 0) {
        // Limpiar el contenedor antes de generar un nuevo círculo
        circuloAqui.innerHTML = '';

        // Generar el círculo con asteriscos
        for (let i = -radio; i <= radio; i++) {
            let fila = '';
            for (let j = -radio; j <= radio; j++) {
                // Verificar si el punto (i, j) está dentro del círculo
                if (i * i + j * j <= radio * radio) {
                    fila += '*';
                } else {
                    fila += ' ';
                }
            }
            circuloAqui.innerHTML += `<pre>${fila}</pre>`;
        }
    } else {
        alert('Por favor, escribe un número válido y mayor que cero.');
    }
}