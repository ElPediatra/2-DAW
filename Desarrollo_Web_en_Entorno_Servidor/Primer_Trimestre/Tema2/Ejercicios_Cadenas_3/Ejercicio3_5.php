<?php
$cadena = "Hola Mundo"; //Creo la cadena

// Creo un array con las vocales mayúsculas y minúsculas con el cambio que van a tener
$sustitucion = [
    'a' => 'A',
    'e' => 'E',
    'i' => 'I',
    'o' => 'O',
    'u' => 'U',
    'A' => 'a',
    'E' => 'e',
    'I' => 'i',
    'O' => 'o',
    'U' => 'u',
];

//Uso strtr para realizar cambiar las vocales
$cadena = strtr($cadena, $sustitucion);

echo $cadena;
?>