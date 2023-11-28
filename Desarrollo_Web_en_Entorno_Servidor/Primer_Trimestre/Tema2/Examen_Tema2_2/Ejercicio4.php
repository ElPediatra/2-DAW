<?php

/* Alberto Gómez Morales - 2º DAW - Desarrollo Web en Servidor - Ejercicio 1

Realizar una función que recibe como parámetro una cadena y un valor numérico.
La función debe devolver una cadena igual que la que se pasó por parámetro excepto
en que se ha eliminado la palabra situada en la posición que se ha pasado por parámetro.
SE DEBE HACER UTILIZANDO ARRAYS. Si se especifica un número de palabra que no existe debe
escribir un mensaje de error.

Por ejemplo:
    $cad = eliminaPalabra("Hola amigo, que tal", 3);

    En $cad debe haber la cadena "Hola amigo, tal".
*/

function eliminaPalabra($cadena, $posicion) {
    $array = explode(' ', $cadena); //Separo las palabras del string por el espacio
    if($posicion < 0 || $posicion >= count($array)) { //Recorreo el array y compruebo que la posición sea válida
        return "Error: La posición que has puesto no está en la cadena.";
    }
    unset($array[$posicion]); //Quito la palabra seleccionada
    return implode(' ', $array); //Junto de nuevo las palabras restantes en una frase
}

$cad = eliminaPalabra("Hola amigo, que tal", 2); //Llamo a la función con mi frase y la posición que quiero quitar
echo $cad; //Muestro el resultado

?>