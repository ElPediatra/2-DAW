function compararNumeros() {
    // Obtener los números ingresados por el usuario
    var numero1 = parseFloat(document.getElementById('numero1Aqui').value);
    var numero2 = parseFloat(document.getElementById('numero2Aqui').value);

    // Verificar la relación entre los números
    if (numero1 > numero2) {
        document.getElementById('resultado').innerText = 'El primer número es mayor que el segundo.';
    } else if (numero1 < numero2) {
        document.getElementById('resultado').innerText = 'El primer número es menor que el segundo.';
    } else {
        document.getElementById('resultado').innerText = 'Los dos números son iguales.';
    }
}
