//Le pedimos el número usuario y lo convertimos a base 16 con toString
var numero = parseInt(prompt("Escribe un número entero:")); //Uso Prompt para mandar el texto y pedir un "texto" al usuario, el cual asigno al número
var base16 = numero.toString(16);

//Creamos una función para pasarlo a Base 5
function decimalABase5(decimal) {
    var base5 = "";
    while (decimal > 0) {
        var remainder = decimal % 5;
        base5 = remainder.toString() + base5; //Remaindet devuelve el resto y lo añado al número de "base 5"
        decimal = Math.floor(decimal / 5); //Uso Math.floor para redondear a la baja los números
    }
    return base5;
}

//Devuelvo el número a base decimal y llamamos a la función para pasarlo a base 5
var decimalValue = parseInt(base16, 16);
var base5 = decimalABase5(decimalValue);

//Mostramos los resultados en la página
document.write("<h2>Número en base 16: " + base16 + "</h2>");
document.write("<h2>Número en base 5: " + base5 + "</h2>");