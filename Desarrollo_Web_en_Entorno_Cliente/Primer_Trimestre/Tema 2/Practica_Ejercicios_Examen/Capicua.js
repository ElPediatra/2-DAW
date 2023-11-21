function verificarCapicua() {
    // Obtener el número ingresado por el usuario
    var numero = document.getElementById('numeroAqui').value;

    // Verificar si el número es capicúa
    var esCapicua = esNumeroCapicua(numero);

    // Mostrar el resultado en la página
    if (esCapicua) {
        document.getElementById('resultado').innerText = 'El número ' + numero + ' es capicúa.';
    } else {
        document.getElementById('resultado').innerText = 'El número ' + numero + ' no es capicúa.';
    }
}

function esNumeroCapicua(num) {
    // Convertir el número a cadena y revertirlo
    var numRevertido = num.toString().split('').reverse().join('');

    // Verificar si el número original es igual al revertido
    return num.toString() === numRevertido;
}