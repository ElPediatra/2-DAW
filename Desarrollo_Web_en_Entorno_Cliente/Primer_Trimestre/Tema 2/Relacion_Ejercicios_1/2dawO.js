//Creo la variable para contar todos los números que ha escrito el usuario, la suma y el producto para ir sumando y multiplicando todos los números que meta el usuario
var contador = 0;
var suma = 0;
var producto = 1; //No puedo iniciarlo a 0 porque siempre sería 0, se tiene que inicializar en 1

//Creamos la función y solicitamos al usuario los números
function contarYSumarNumeros() {
    var numero = parseInt(prompt("Escribe un número (9999 para terminar):"));
    if (numero === 9999) { //Confirmamos si es el número de salida, de no ser así aumento el contador y añado el número al toltal de la suma, vuelvo a llamar a la función
        alert("Has escrito " + contador + " números.\nEl total de todos los números es: " + suma + "\nEl produto de todos los númeroes es: " + producto);
    } else {
        contador++;
        suma += numero;
        producto *= numero;

        contarYSumarNumeros();
    }
}

//Mensaje para llamar a la función y que comience
contarYSumarNumeros();