function dibujarCuadrado() {
    const ladoCuadrado = document.getElementById('lado');
    const cuadradoAqui = document.getElementById('cuadradoAqui');

    // Obtener el valor ingresado por el usuario
    const lado = parseInt(ladoCuadrado.value);

    // Validar que el valor sea un número válido y mayor que cero
    if (!isNaN(lado) && lado > 0) {
        // Limpiar el contenedor antes de generar un nuevo cuadrado
        cuadradoAqui.innerHTML = '';

        // Generar el cuadrado con asteriscos
        for (let i = 0; i < lado; i++) {
            let fila = '';
            for (let j = 0; j < lado; j++) {
                fila += '*';
            }
            cuadradoAqui.innerHTML += `<pre>${fila}</pre>`;
        }
    } else {
        alert('Por favor, escribe un número válido y mayor que cero.');
    }
}