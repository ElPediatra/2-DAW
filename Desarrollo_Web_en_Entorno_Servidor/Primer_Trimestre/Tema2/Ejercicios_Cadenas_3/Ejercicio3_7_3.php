<?php
//Rellenar en ambos lugares (igual cantidad en ambos lados):
$cadena = "Rellenar todo";
$longitud_actual = strlen($cadena);
$longitud_objetivo = 20;
$relleno = $longitud_objetivo - $longitud_actual;
$mitad_relleno = $relleno / 2;

$cadena = str_repeat("#", $mitad_relleno) . $cadena . str_repeat("#", $mitad_relleno);
echo $cadena;
?>