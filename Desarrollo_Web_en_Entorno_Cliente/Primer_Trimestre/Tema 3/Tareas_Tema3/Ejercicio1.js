/* Ejercicio 1 - Página 97 - Alberto Gómez Morales */

// Obtener la hora actual
var horaActual = new Date().getHours();

// Generar un número aleatorio entre 0 y 1
var numeroAleatorio = Math.random();

// Obtener el elemento HTML por su ID
var mensajeElemento = document.getElementById("mensaje");

// Comprobar si el número aleatorio es menor que 0.5
if (numeroAleatorio < 0.5) {
    // Si es menor que 0.5, mostrar enlace a Myfpschool.com
    mensajeElemento.innerHTML = '<a href="https://www.myfpschool.com">Myfpschool.com</a>';
} else {
    // Si es mayor o igual a 0.5, mostrar saludo según la hora actual
    if (horaActual < 15) {
        mensajeElemento.innerHTML = 'Buenos días';
    } else {
        mensajeElemento.innerHTML = 'Buenas tardes';
    }
}