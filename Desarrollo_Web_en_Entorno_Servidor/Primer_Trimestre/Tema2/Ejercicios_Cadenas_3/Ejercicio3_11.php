<?php
$cadena = "Hola grupo, soy Vanesa";
$caracteres = str_split($cadena);

//Convierno $caracteres en un array con str_splity donde cada elemento es un carácter de la cadena

//Creo un bucle y muestro los caracteres del array
foreach ($caracteres as $caracter) {
    echo $caracter . " ";
    echo "<br>";
}

//También puedo acceder a un elemento en específico por su índice:
echo $caracteres[0]; //Para 0 tiene que mostrar "H"

?>