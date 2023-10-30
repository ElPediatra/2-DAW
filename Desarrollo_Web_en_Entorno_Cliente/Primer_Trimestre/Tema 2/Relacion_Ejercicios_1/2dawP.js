//Creo una variable para sumar todos los múltiplos
var suma = 0;

// Creo bucle para que recorra del 1 al 999, compruebo si el número es múltiplo de 23 y de ser así lo muestro por consola, sumandolo también al total
for (var i = 1; i < 1000; i++) {
    if (i % 23 === 0) {
        console.log(i);
        suma += i;
    }
}

//Muestro el total de los múltiplos de 23
alert("La suma de los múltiplos de 23 inferiores a 1000 es: " + suma);