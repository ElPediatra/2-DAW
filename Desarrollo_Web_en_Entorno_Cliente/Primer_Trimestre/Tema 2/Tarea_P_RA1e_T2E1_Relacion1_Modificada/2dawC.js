//Solicitaremos el nombre y la edad, para mostrar los días que hemos vivido
function calcularDiasVividos() {
    //Pido el nombre
    var nombre = prompt("Por favor, ingresa tu nombre:");

    //Pido la edad
    var edad = prompt("Por favor, ingresa tu edad:");

    //Paso la edad a Int(número)
    edad = parseInt(edad);

    //Verificamos si es válida
    if (!isNaN(edad)) {
        //Multiplicamos los años por 365 días que tiene un añoo
        var diasVividos = edad * 365;

        //Muestro el resultado
        alert("Hola, " + nombre + "! Has vivido aproximadamente " + diasVividos + " días hasta ahora.");
    } else {
        //Mensaje de error por si no es un número
        alert("Por favor, ingresa una edad válida.");
    }
}

//Llamamos a la función para que se inicie
calcularDiasVividos();