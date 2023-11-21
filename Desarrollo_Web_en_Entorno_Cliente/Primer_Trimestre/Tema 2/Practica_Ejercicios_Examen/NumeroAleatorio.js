function generarNumeroAleatorio() {
    // Generar un número aleatorio entre 1 y 100 (puedes ajustar el rango según tus necesidades)
    var numeroAleatorio = Math.floor(Math.random() * 100) + 1;

    // Mostrar el número aleatorio en la página
    document.getElementById('numeroAleatorio').innerText = 'Número Aleatorio: ' + numeroAleatorio;
}