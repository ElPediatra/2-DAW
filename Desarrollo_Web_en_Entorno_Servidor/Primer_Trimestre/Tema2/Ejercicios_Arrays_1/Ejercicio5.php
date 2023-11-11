<?php
$pila = array("cinco" => 5, "uno" => 1, "cuatro" => 4, "dos" => 2, "tres" => 3);

asort($pila);
echo "Ordenado con asort:\n";
print_r($pila);

arsort($pila);
echo "\nOrdenado con arsort:\n";
print_r($pila);

ksort($pila);
echo "\nOrdenado con ksort:\n";
print_r($pila);

sort($pila);
echo "\nOrdenado con sort:\n";
print_r($pila);

rsort($pila);
echo "\nOrdenado con rsort:\n";
print_r($pila);
?>