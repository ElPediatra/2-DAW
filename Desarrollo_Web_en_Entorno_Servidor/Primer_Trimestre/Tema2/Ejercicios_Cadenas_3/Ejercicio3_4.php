<?php
$cadena1 = "Hola 9";
$cadena2 = "Hola 10";

//Toda la cadena
$resultado1 = strcmp($cadena1, $cadena2);

//Primeros 5 caracteres
$resultado2 = strncmp($cadena1, $cadena2, 5);

//Natural
$resultado3 = strnatcmp($cadena1, $cadena2);

if ($resultado1 < 0) {
    echo "La cadena 1 es menor que la cadena 2 (comparación de toda la cadena).<br>";
} elseif ($resultado1 > 0) {
    echo "La cadena 2 es menor que la cadena 1 (comparación de toda la cadena).<br>";
} else {
    echo "Las 2 cadenas son iguales (comparación de toda la cadena).<br>";
}

if ($resultado2 < 0) {
    echo "La cadena 1 es menor que la cadena 2 (comparación de los primeros 5 caracteres).<br>";
} elseif ($resultado2 > 0) {
    echo "La cadena 2 es menor que la cadena 1 (comparación de los primeros 5 caracteres).<br>";
} else {
    echo "Las 2 cadenas son iguales en los primeros 5 caracteres (comparación de los primeros 5 caracteres).<br>";
}

if ($resultado3 < 0) {
    echo "La cadena 1 es menor que la cadena 2 (comparación natural).<br>";
} elseif ($resultado3 > 0) {
    echo "La cadena 2 es menor que la cadena 1 (comparación natural).<br>";
} else {
    echo "Las 2 cadenas son iguales en una comparación natural.<br>";
}
?>