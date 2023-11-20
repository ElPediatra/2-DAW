function dibujarCuadrado() {
    const ladoCuadrado = document.getElementById('lado');
    const cuadradoAqui = document.getElementById('cuadradoAqui');

    // Obtener el valor ingresado por el usuario
    const lado = parseInt(ladoCuadrado.value);

    // Validar que el valor sea un número válido y mayor que cero
    if (!isNaN(lado) && lado > 0) {
        // Limpiar el contenedor antes de generar un nuevo cuadrado
        cuadradoAqui.innerHTML = '';

        // Generar el cuadrado con borde de asteriscos
        for (let i = 0; i < lado; i++) {
            let fila = '';
            for (let j = 0; j < lado; j++) {
                // Verificar si estamos en el borde del cuadrado
                if (i === 0 || i === lado - 1 || j === 0 || j === lado - 1) {
                    fila += '*';
                } else {
                    fila += ' ';
                }
            }
            cuadradoAqui.innerHTML += `<pre>${fila}</pre>`;
        }
    } else {
        alert('Por favor, ingrese un número válido y mayor que cero.');
    }
}