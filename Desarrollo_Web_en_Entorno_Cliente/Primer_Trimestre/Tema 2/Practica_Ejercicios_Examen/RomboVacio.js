function generarRombo() {
    const tamanioRombo = document.getElementById('tamanio');
    const romboAqui = document.getElementById('romboAqui');
    
    // Obtener el valor ingresado por el usuario
    const tamanio = parseInt(tamanioRombo.value);

    // Validar que el valor sea un número válido y mayor que cero
    if (!isNaN(tamanio) && tamanio > 0) {
        // Limpiar el contenedor antes de generar un nuevo rombo
        romboAqui.innerHTML = '';

        // Generar la mitad superior del rombo
        for (let i = 1; i <= tamanio; i++) {
            const espaciosAntes = ' '.repeat(tamanio - i);
            const espaciosInternos = ' '.repeat(2 * (i - 1));
            const asteriscos = i === 1 ? '*' : '*' + espaciosInternos + '*';
            romboAqui.innerHTML += `<pre>${espaciosAntes}${asteriscos}</pre>`;
        }

        // Generar la mitad inferior del rombo
        for (let i = tamanio - 1; i >= 1; i--) {
            const espaciosAntes = ' '.repeat(tamanio - i);
            const espaciosInternos = ' '.repeat(2 * (i - 1));
            const asteriscos = i === 1 ? '*' : '*' + espaciosInternos + '*';
            romboAqui.innerHTML += `<pre>${espaciosAntes}${asteriscos}</pre>`;
        }
    } else {
        alert('Por favor, escribe un número válido y mayor que cero.');
    }
}