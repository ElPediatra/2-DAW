function generarFibonacci(n) {
    let a = 0, b = 1;
    let resultado = '';

    for (let i = 0; i < n; i++) {
        resultado += a + ' ';
        let temp = a + b;
        a = b;
        b = temp;
    }

    return resultado;
}

function mostrarFibonacci() {
    const n = parseInt(prompt('Escribe la cantidad de números de Fibonacci:'));

    if (!isNaN(n) && n > 0) {
        const secuencia = generarFibonacci(n);
        document.body.innerHTML += `<pre>${secuencia}</pre>`;
    } else {
        alert('Por favor, ingrese un número válido y mayor que cero.');
    }
}

mostrarFibonacci();