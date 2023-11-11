<?php
function mediaAritmetica(...$numeros) {
    $suma = array_sum($numeros);
    $cantidad = count($numeros);
    return $suma / $cantidad;
}

echo mediaAritmetica(1, 2, 3, 4, 5);  // Devuelve 3
?>