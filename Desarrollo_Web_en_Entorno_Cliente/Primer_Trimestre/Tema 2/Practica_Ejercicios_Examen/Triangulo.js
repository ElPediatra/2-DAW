function generarTriangulo() {
    const tamanioTriangulo = document.getElementById('tamanio');
    const trianguloAqui = document.getElementById('trianguloAqui');
    
    // Obtener el valor ingresado por el usuario
    const tamanio = parseInt(tamanioTriangulo.value);

    // Validar que el valor sea un número válido y mayor que cero
    if (!isNaN(tamanio) && tamanio > 0) {
        // Limpiar el contenedor antes de generar un nuevo triángulo
        trianguloAqui.innerHTML = '';

        // Generar el triángulo rectángulo
        for (let i = 1; i <= tamanio; i++) {
            const asteriscos = '*'.repeat(i);
            trianguloAqui.innerHTML += `<pre>${asteriscos}</pre>`;
        }
    } else {
        alert('Por favor, escribe un número válido y mayor que cero.');
    }
}