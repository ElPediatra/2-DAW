function calcularMCD() {
    // Obtener los números ingresados por el usuario
    var numero1 = parseInt(document.getElementById('numero1Aqui').value);
    var numero2 = parseInt(document.getElementById('numero2Aqui').value);

    // Calcular el MCD utilizando el algoritmo de Euclides
    var mcd = calcularMCDAlgoritmoEuclides(numero1, numero2);

    // Mostrar el resultado en la página
    document.getElementById('resultado').innerText = 'El Máximo Común Divisor es: ' + mcd;
}

function calcularMCDAlgoritmoEuclides(a, b) {
    // Algoritmo de Euclides para calcular el MCD
    while (b !== 0) {
        var temp = b;
        b = a % b;
        a = temp;
    }
    return a;
}