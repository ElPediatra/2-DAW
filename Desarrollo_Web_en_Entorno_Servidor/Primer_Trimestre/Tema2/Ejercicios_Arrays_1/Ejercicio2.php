<?php
$alumnos = array("Ana", "Carlos", "Elena", "Gabriel", "Isabel");

$primeros = array_slice($alumnos, 0, 3);
echo "Los primeros 3 alumnos son: " . implode(", ", $primeros) . "\n";

$ultimos = array_splice($alumnos, -2);
echo "Los últimos 2 alumnos son: " . implode(", ", $ultimos) . "\n";
?>