function palindromo() {
    // Obtener la frase ingresada por el usuario
    var frase = document.getElementById('fraseAqui').value;

    // Eliminar espacios y convertir a minúsculas para comparar de manera insensible a mayúsculas
    var fraseSinEspacios = frase.replace(/\s/g, '').toLowerCase();

    // Invertir la frase para comparar con la original
    var fraseInvertida = fraseSinEspacios.split('').reverse().join('');

    // Verificar si la frase original es igual a la invertida
    if (fraseSinEspacios === fraseInvertida) {
        document.getElementById('resultado').innerText = '¡La frase es un palíndromo!';
    } else {
        document.getElementById('resultado').innerText = 'La frase no es un palíndromo.';
    }
}