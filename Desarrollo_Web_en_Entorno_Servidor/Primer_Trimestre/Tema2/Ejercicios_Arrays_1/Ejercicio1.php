<?php
$dias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");

echo "Usando foreach:\n";
foreach ($dias as $indice => $valor) {
    echo "Índice: $indice, Valor: $valor\n";
}

echo "\nUsando for:\n";
for ($i = 0; $i < count($dias); $i++) {
    echo "Índice: $i, Valor: $dias[$i]\n";
}
?>