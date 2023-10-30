function calcularCircunferenciaYArea() {
    //Pido el radio al usuario y lo convertimos en float (número)
    var radio = prompt("Por favor, escribe el radio del círculo:");
    radio = parseFloat(radio);

    //Confirmo que el número sea válido
    if (!isNaN(radio) && radio > 0) {
        //Calculo la circunferencia
        var longitudCircunferencia = 2 * Math.PI * radio;

        //Calculo el area
        var areaCirculo = Math.PI * Math.pow(radio, 2); //Math.pow para calcular el valor de radio al cuadrado

        //Muestro el mensaje, uso toFixed para que salga un numero completo, sin exponenciales
        alert("Radio del círculo: " + radio.toFixed(2) +
              "\nCircunferencia: " + longitudCircunferencia.toFixed(2) +
              "\nÁrea: " + areaCirculo.toFixed(2));
    } else {
        //Mando mensaje de error si el número no es válido
        alert("Número no válido (tiene que ser mayor que 0).");
    }
}

//Llamo a la función para que se inicie el programa
calcularCircunferenciaYArea();