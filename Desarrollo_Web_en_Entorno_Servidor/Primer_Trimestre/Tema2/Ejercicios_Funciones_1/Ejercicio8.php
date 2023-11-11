<?php
function sumatorio($num) {
    $sumatorio = 0;
    for ($i = 1; $i < $num; $i++) {
        $sumatorio += $i;
    }
    return $sumatorio;
}

echo sumatorio(5);  // Devuelve 10
?>