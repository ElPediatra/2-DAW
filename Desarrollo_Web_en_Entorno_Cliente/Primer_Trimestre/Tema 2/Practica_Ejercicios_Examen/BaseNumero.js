function convertirNumero() {
    // Obtener el número ingresado por el usuario y la base seleccionada
    var numero = parseInt(document.getElementById('numeroAqui').value);
    var base = parseInt(document.getElementById('baseAqui').value);

    // Validar que el número sea un entero positivo y la base sea válida
    if (isNaN(numero) || numero < 0 || !Number.isInteger(base) || base <= 1) {
        document.getElementById('resultado').innerText = 'Por favor, ingrese un número entero positivo y seleccione una base válida.';
        return;
    }

    // Convertir el número a la base seleccionada
    var numeroConvertido = numero.toString(base);

    // Mostrar el resultado en la página
    document.getElementById('resultado').innerText = 'El número ' + numero + ' en base ' + base + ' es: ' + numeroConvertido;
}