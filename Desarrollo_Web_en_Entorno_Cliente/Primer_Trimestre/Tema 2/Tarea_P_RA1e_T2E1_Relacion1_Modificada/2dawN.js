//Creo la variable para contar todos los números que ha escrito el usuario y la suma para ir sumando todos los números que meta el usuario
var contador = 0;
var suma = 0;

//Creamos la función y solicitamos al usuario los números
function contarYSumarNumeros() {
    var numero = parseInt(prompt("Escribe un número (9999 para terminar):"));
    if (numero === 9999) { //Confirmamos si es el número de salida, de no ser así aumento el contador y añado el número al toltal de la suma, vuelvo a llamar a la función
        alert("Has escrito " + contador + " números.\nEl total de todos los números es: " + suma);
    } else {
        contador++;
        suma += numero;

        contarYSumarNumeros();
    }
}

//Mensaje para llamar a la función y que comience
contarYSumarNumeros();