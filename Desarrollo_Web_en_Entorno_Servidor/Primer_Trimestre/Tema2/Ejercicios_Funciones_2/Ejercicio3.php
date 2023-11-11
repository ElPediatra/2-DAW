<?php
function mediaAritmetica(...$numeros) {
    $suma = 0;
    $cantidad = 0;
    foreach ($numeros as $numero) {
        $suma += $numero;
        $cantidad++;
    }
    return $suma / $cantidad;
}

echo mediaAritmetica(1, 2, 3, 4, 5);  // Devuelve 3
?>