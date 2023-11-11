<?php
$valores = array();
for ($i = 0; $i < 10; $i++) {
    $valores[] = rand(1, 10);
}

$cuenta = count(array_filter($valores, function($valor) {
    return $valor == 2;
}));

echo "El array contiene $cuenta valores iguales a 2.\n";
?>
