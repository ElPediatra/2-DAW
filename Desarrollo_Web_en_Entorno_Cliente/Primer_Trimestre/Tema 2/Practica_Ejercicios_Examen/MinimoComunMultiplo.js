function calcularMCM() {
    // Obtener los números ingresados por el usuario
    var numero1 = parseInt(document.getElementById('numero1Aqui').value);
    var numero2 = parseInt(document.getElementById('numero2Aqui').value);

    // Calcular el MCD (máximo común divisor) utilizando el algoritmo de Euclides
    var mcd = calcularMCD(numero1, numero2);

    // Calcular el MCM utilizando la relación MCM(a, b) = (a * b) / MCD(a, b)
    var mcm = (numero1 * numero2) / mcd;

    // Mostrar el resultado en la página
    document.getElementById('resultado').innerText = 'El Mínimo Común Múltiplo es: ' + mcm;
}

function calcularMCD(a, b) {
    // Algoritmo de Euclides para calcular el MCD
    while (b !== 0) {
        var temp = b;
        b = a % b;
        a = temp;
    }
    return a;
}