/*
 * Genera un vector de números aleatorios y realiza operaciones con sus elementos.
 */

function generarVector() {
    let vector = [];
    for (let i = 0; i < 5; i++) {
        vector[i] = Math.floor(Math.random() * 1000) + 1;
    }

    let ultimo = vector.pop();
    let penultimo = vector.pop();
    let suma = ultimo + penultimo;

    let resultados = document.getElementById('resultados');
    resultados.innerHTML = `Vector original: ${vector}<br>`;
    resultados.innerHTML += `Últimos dos elementos sumados: ${suma}<br>`;
    resultados.innerHTML += `Tamaño final del vector: ${vector.length}`;
}