<?php
function semisuma($num1, $num2) {
    $suma = $num1 + $num2;
    $semisuma = $suma / 2;
    return $semisuma;
}

echo semisuma(10, 20);  // Devuelve 15
echo semisuma(5, 7);    // Devuelve 6
?>