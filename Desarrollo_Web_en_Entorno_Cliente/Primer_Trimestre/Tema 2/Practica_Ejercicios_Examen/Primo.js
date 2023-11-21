function verificarPrimo() {
    // Obtener el número ingresado por el usuario
    var numero = parseInt(document.getElementById('numeroInput').value);

    // Verificar si el número es primo
    var esPrimo = esNumeroPrimo(numero);

    // Mostrar el resultado en la página
    if (esPrimo) {
        document.getElementById('resultado').innerText = numero + ' es un número primo.';
    } else {
        document.getElementById('resultado').innerText = numero + ' no es un número primo.';
    }
}

function esNumeroPrimo(num) {
    // Verificar si el número es menor o igual a 1 (los números negativos, 0 y 1 no son primos)
    if (num <= 1) {
        return false;
    }

    // Verificar si el número es divisible por algún otro número
    for (var i = 2; i <= Math.sqrt(num); i++) {
        if (num % i === 0) {
            return false;
        }
    }

    // Si no se encontraron divisores, el número es primo
    return true;
}