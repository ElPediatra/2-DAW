//Creo la variable para contar todos los números que ha escrito el usuario
var contador = 0;

//Creamos la función y solicitamos al usuario los números
function contarNumeros() {
    var numero = parseInt(prompt("Escribe un número (9999 para terminar):"));
    if (numero === 9999) { //Confirmamos si es el número de salida, de no ser así aumento el contador y vuelvo a llamar a la función
        alert("Has escrito " + contador + " números.");
    } else {
        contador++;

        contarNumeros();
    }
}

//Mensaje para llamar a la función y que comience
contarNumeros();