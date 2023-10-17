<?php
$cadena = "Las vocales son a, e, i, o, u, tururu"; //Creo la cadena

$cadena = strtolower($cadena); //La paso a minúsculas para que pueda leer las letras 

$vocales = ['a', 'e', 'i', 'o', 'u']; //Lista con las 5 vocales

$contieneVocal = false; //Inicio el atributo en false

$caracteres = str_split($cadena); //Divido la cadena en caracteres

foreach ($caracteres as $caracter) {
    if (in_array($caracter, $vocales)) {
        $contieneVocal = true;
        break; //Creo un bucle y en cuanto encuentre una vocal lo rompo y cambio el atributo a true
    }
}

//Muestro el resultado
if ($contieneVocal) {
    echo "La cadena contiene al menos una vocal.";
} else {
    echo "La cadena no contiene ninguna vocal.";
}
?>