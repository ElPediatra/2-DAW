function calcularFactorial() {
    // Obtener el número ingresado por el usuario
    var numero = parseInt(document.getElementById('numeroAqui').value);

    // Calcular el factorial
    var factorial = calcularFactorialRecursivo(numero);

    // Mostrar el resultado en la página
    document.getElementById('resultado').innerText = 'El factorial de ' + numero + ' es: ' + factorial;
}

function calcularFactorialRecursivo(n) {
    // Caso base: factorial de 0 es 1
    if (n === 0) {
        return 1;
    }

    // Caso recursivo: n! = n * (n-1)!
    return n * calcularFactorialRecursivo(n - 1);
}
