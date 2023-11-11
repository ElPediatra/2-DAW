<?php
function intercambio(&$num1, &$num2) {
    $temp = $num1;
    $num1 = $num2;
    $num2 = $temp;
}

$a = 3;
$b = 7;
intercambio($a, $b);

echo "a = $a";  // Devuelve a = 7
echo "b = $b";  // Devuelve b = 3
?>