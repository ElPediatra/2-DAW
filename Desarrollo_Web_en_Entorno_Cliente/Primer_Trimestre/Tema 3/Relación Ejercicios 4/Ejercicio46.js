function generarRifa() {
    let rifa = new Array(1000).fill(0);
    let premios = [1000, 2000, 3000, 4000, 5000, 6000, 7000, 8000, 9000, 10000];

    for (let i = 0; i < premios.length; i++) {
        let posicionAleatoria;
        do {
            posicionAleatoria = Math.floor(Math.random() * 1000);
        } while (rifa[posicionAleatoria] !== 0);

        rifa[posicionAleatoria] = premios[i];
    }

    let resultados = document.getElementById('resultados');
    resultados.innerHTML = "Números con premio y sus cantidades:<br>";
    for (let i = 0; i < rifa.length; i++) {
        if (rifa[i] !== 0) {
            resultados.innerHTML += `Número: ${i}, Premio: ${rifa[i]}<br>`;
        }
    }
}