<?php

/* Alberto Gómez Morales - 2º DAW - Desarrollo Web en Servidor - Ejercicio 1

Diseñe una función que reciba como parámetro un array y escriba en la página web de forma tabulada
el contenido  de ese array sin importar el número de dimensiones que tenga. Pista: Cuando la función
recorre el array debe comprobar si el elemento que va a tratar se trata de un valor o de otro array, en
caso de ser un array tendrá que realizar una llamada recursiva.

Puedes añadir tantos parámetros a la función como necesites pero la llamada tendrá que realizar una llamada
recursiva.

Puedes añadir tantos parámetros a la función como necesites pero la llamada inicial debe ser así:
    recorre($array); //recorre es el nombre de la función, $array es el array a recorrer.

*/

function recorre($array, $nivelArray = 0) { //Añado el nivel del array por el que va
    foreach ($array as $aux => $valor) { //Recorreo el array
        if (is_array($valor)) { //Compruebo si es un valor o un nivel extra del array
            echo str_repeat("\t", $nivelArray) . $aux . ":\n"; //Muestro que es un nivel y llamo a la función para que lo recorra
            recorre($valor, $nivelArray + 1);
        } else {
            echo str_repeat("\t", $nivelArray) . $aux . " -> " . $valor . "\n"; //Muestro el valor
        }
    }
}

//Soy tontito y no me acuerdo de como tabularlo bien :D

//Creo mi array
$array = array(1, array(21, 22, 23), 3, array(array(411, 412), 42, array(431, 432)));

//Llamo a la función
recorre($array)

?>