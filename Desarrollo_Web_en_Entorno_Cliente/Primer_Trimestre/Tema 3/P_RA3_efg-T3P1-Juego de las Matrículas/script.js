//Función para calcular y mostrar la figura
function calcularYMostrarFigura() {
    console.log("Calculando figura..."); //Código por si da error que cargue en consola
    //Capturo el número del usuario
    const numero = document.getElementById('numeroInput').value;

    //Compruebo si el número tiene 4 cifras
    if (numero.length !== 4 || isNaN(numero)) {
        alert("Escribe un número POSITIVO de 4 cifras.");
        return;
    }

    //Convierto el número a un array
    const digitos = numero.split('').map(Number);

    //Cuento las ocurrencias de cada dígito
    const ocurrencias = contarOcurrencias(digitos);

    //Compruebo las conbinaciones
    const doblePareja = ocurrencias.filter(count => count === 2).length / 2;
    const trios = ocurrencias.includes(3) ? 1 : 0;
    const escalera3 = verificarEscalera(digitos, 3);
    const escalera4 = verificarEscalera(digitos, 4);
    const pocker = ocurrencias.includes(4) ? 1 : 0;

    //Indico la figura que es
    let figuraActual = '';
    if (doblePareja > 0) figuraActual = 'Doble Pareja';
    else if (trios > 0) figuraActual = 'Trío';
    else if (escalera4) figuraActual = 'Escalera de 4 elementos';
    else if (escalera3) figuraActual = 'Escalera de 3 elementos';
    else if (pocker > 0) figuraActual = 'Poker';
    else figuraActual = 'Mala suerte, no es una figura ganadora';

    //Muestro la figura actual
    const figuraActualElement = document.getElementById('figuraActual');
    figuraActualElement.textContent = `Figura Actual: ${figuraActual}`;

    //Guardp la cantidad de veces que se ha introducido correctamente una matrícula en una cookie
    const matriculasCorrectas = obtenerMatriculasCorrectas();
    matriculasCorrectas.push(numero);
    document.cookie = `matriculasCorrectas=${JSON.stringify(matriculasCorrectas)}; expires=Fri, 31 Dec 9999 23:59:59 GMT`;
}

//Función para comprobar si hay una escalera de longitud X en el array
function verificarEscalera(array, longitud) {
    //Copiar y ordenar el array para verificar de la escalera
    const digitosOrdenados = [...array].sort((a, b) => a - b);

    //Iterar a través del array ordenado para buscar escaleras
    for (let i = 0; i <= digitosOrdenados.length - longitud; i++) {
        //Compruebo si los elementos forman una escalera
        if (digitosOrdenados[i] + longitud - 1 === digitosOrdenados[i + longitud - 1]) {
            return true; //Hay una escalera
        }
    }

    return false; //No hay una escalera
}


//Función para mostrar las estadísticas en una nueva ventana
function mostrarEstadisticas() {
    //Capturo las matrículas correctas almacenadas en la cookie
    const matriculasCorrectas = obtenerMatriculasCorrectas();

    //Calculo las estadísticas globales
    const totalCombinaciones = 1000; // 1,000 combinaciones posibles

    //Creo contadores para cada figura
    let contadorDoblePareja = 0;
    let contadorTrio = 0;
    let contadorEscalera3 = 0;
    let contadorEscalera4 = 0;
    let contadorPocker = 0;

    //Cuento la cantidad de cada figura entre todas las combinaciones posibles
    for (let i = 0; i < totalCombinaciones; i++) {
        const matricula = i.toString().padStart(4, '0');

        if (tieneDoblePareja(matricula)) {
            contadorDoblePareja++;
        } else if (tieneTrio(matricula)) {
            contadorTrio++;
        } else if (tieneEscalera(matricula, 3)) {
            contadorEscalera3++;
        } else if (tieneEscalera(matricula, 4)) {
            contadorEscalera4++;
        } else if (tienePocker(matricula)) {
            contadorPocker++;
        }
    }

    //Calculo el porcentaje para cada figura
    const porcentajeDoblePareja = ((contadorDoblePareja / totalCombinaciones) * 100).toFixed(2);
    const porcentajeTrio = ((contadorTrio / totalCombinaciones) * 100).toFixed(2);
    const porcentajeEscalera3 = ((contadorEscalera3 / totalCombinaciones) * 100).toFixed(2);
    const porcentajeEscalera4 = ((contadorEscalera4 / totalCombinaciones) * 100).toFixed(2);
    const porcentajePocker = ((contadorPocker / totalCombinaciones) * 100).toFixed(2);

    //Creo el contenido de la ventana pop-up
    let estadisticasContenido = `
        <h2>Estadísticas de Figuras</h2>
        <h3> Alberto Gómez Morales </h3>
        <p>Total de Combinaciones Posibles: ${totalCombinaciones}</p>
        <p>Cantidad de Matrículas del Usuario: ${matriculasCorrectas.length}</p>
        <p>Matrículas del Usuario: ${matriculasCorrectas.join(', ')}</p>
        <p>Cantidad y Porcentaje de Doble Pareja: ${contadorDoblePareja} (${porcentajeDoblePareja}%)</p>
        <p>Cantidad y Porcentaje de Trio: ${contadorTrio} (${porcentajeTrio}%)</p>
        <p>Cantidad y Porcentaje de Escalera de 3 elementos: ${contadorEscalera3} (${porcentajeEscalera3}%)</p>
        <p>Cantidad y Porcentaje de Escalera de 4 elementos: ${contadorEscalera4} (${porcentajeEscalera4}%)</p>
        <p>Cantidad y Porcentaje de Pocker: ${contadorPocker} (${porcentajePocker}%)</p>
    `;

    //Abro una nueva ventana con las estadísticas
    const ventanaEstadisticas = window.open('', '_blank', 'width=600,height=400');
    ventanaEstadisticas.document.write(estadisticasContenido);

    //Cierro la ventana después de 10 segundos
    setTimeout(() => {
        ventanaEstadisticas.close();
    }, 10000);
}

//Función para sacar las matrículas correctas guardadas en la cookie
function obtenerMatriculasCorrectas() {
    const cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)matriculasCorrectas\s*=\s*([^;]*).*$)|^.*$/, "$1");
    return cookieValue ? JSON.parse(cookieValue) : [];
}

//Funciones para comprobar las figuras
function tieneDoblePareja(matricula) {
    const ocurrencias = contarOcurrencias(matricula.split('').map(Number));
    const doblePareja = ocurrencias.filter(count => count === 2).length / 2;
    return doblePareja > 0;
}

function tieneTrio(matricula) {
    const ocurrencias = contarOcurrencias(matricula.split('').map(Number));
    return ocurrencias.includes(3);
}

function tieneEscalera(matricula, longitud) {
    const digitos = matricula.split('').map(Number);
    digitos.sort();
    for (let i = 0; i <= digitos.length - longitud; i++) {
        if (digitos[i] + longitud - 1 === digitos[i + longitud - 1]) {
            return true;
        }
    }
    return false;
}

function tienePocker(matricula) {
    const ocurrencias = contarOcurrencias(matricula.split('').map(Number));
    return ocurrencias.includes(4);
}

//Función para contar las ocurrencias de cada dígito
function contarOcurrencias(array) {
    const counts = {};
    array.forEach(num => {
        counts[num] = (counts[num] || 0) + 1;
    });
    return Object.values(counts);
}
