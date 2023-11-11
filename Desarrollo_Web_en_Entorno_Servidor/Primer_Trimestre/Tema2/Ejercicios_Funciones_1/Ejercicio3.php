<?php
function diasASegundos($dias) {
    $segundos = $dias * 24 * 60 * 60;
    return $segundos;
}

echo diasASegundos(1);  // Devuelve 86400
echo diasASegundos(30); // Devuelve 2592000
?>