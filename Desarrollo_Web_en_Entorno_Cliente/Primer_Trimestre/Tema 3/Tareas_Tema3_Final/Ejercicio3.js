function buscarUltimaPosicion() {
    //Capturo la frase y la palabra
    var frase = document.getElementById('fraseEntrada').value;
    var palabra = document.getElementById('palabraEntrada').value;

    //Compruebo que no están vacías
    if (frase.trim() === '' || palabra.trim() === '') {
        alert('Por favor, ingresa una frase y una palabra.');
        return;
    }

    //Busco la última posición de la palabra usando LastIndexOf()
    var ultimaPosicion = frase.toLowerCase().lastIndexOf(palabra.toLowerCase());

    //Muestro el resultado
    document.getElementById('resultado').innerText = `La última posición de "${palabra}" es: ${ultimaPosicion}`;
}
