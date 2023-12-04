function generarVectores() {
    let vector1 = [];
    let vector2 = [];
    let vector3 = [];

    for (let i = 0; i < 10; i++) {
        vector1[i] = Math.floor(Math.random() * 500) + 1;
        if (vector1[i] < 250) {
            vector2.push(vector1[i]);
        } else {
            vector3.push(vector1[i]);
        }
    }

    let resultados = document.getElementById('resultados');
    resultados.innerHTML = `<p>Vector 1: ${vector1}</p>`;
    resultados.innerHTML += `<p>Vector 2 (menores a 250): ${vector2} - Tamaño: ${vector2.length}</p>`;
    resultados.innerHTML += `<p>Vector 3 (mayores o iguales a 250): ${vector3} - Tamaño: ${vector3.length}</p>`;
}