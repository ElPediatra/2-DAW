<?php

/* Alberto Gómez Morales - 2º DAW - Desarrollo Web en Servidor - Ejercicio 1

Diseñar una función que recibe como parámetro un array y un valor numérico. La función debe ordenar
el array siguiendo el criterio especificado en el valor numérico y devolver el array ordenado.

Los posible valores de argumento numérico son:
    1-Ordenación de menor a mayor.
    2-Ordenación de mayor a menor.
    3-Ordenación por clave de menor a mayor.
    4-Ordenación por clave de mayor a menor.
    Otro valor-No hace nada y muestra un mensaje de "parámetro incorrecto".

    Si no se especifica valor se realizará una ordenación de menor a mayor
*/

function ordenarArray($array, $opcion = 1) {//Marco la opción por defecto como 1 en caso de que no se indique
    switch($opcion) {//Indico las opciones que puede marcar
        case 1:
            sort($array); //Ordeno de menor a mayor
            break;
        case 2:
            rsort($array); //Ordeno de mayor a menor
            break;
        case 3:
            ksort($array); //Ordeno por clave de menor a mayor
            break;
        case 4:
            krsort($array); //Ordeno por clave de mayor a menor
            break;
        default:
            return "Parámetro incorrecto."; //Muestro el mensaje que me piden
    }
    return $array;
}

//Creo mi array
$array = array(3, 2, 5, 1, 4, 9, 6, 8, 7);
//Llamo a la función y selecciono una opción
$arrayOrdenado = ordenarArray($array, 2);
//Muestro el resultado
print_r($arrayOrdenado);

?>