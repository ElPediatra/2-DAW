//Pido el número al usuario
var numero = parseInt(prompt("Escribe un número, por favor:"));

//Definimos nuestros contadores
var contador1 = numero + 5;
var contador2 = contador1 + 21;
var contador3 = contador2 - 4;

//Muestro los resultados como texto en mi página .htm
document.write("<h1>Tu número: " + numero + "</h1>");
document.write("<h2>Contadores: " + contador1 + " " + contador2 + " " + contador3 + "</h2>");