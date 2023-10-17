<?php
//Escapar caracteres problemáticos:

$cadena_original = "vamos al o'Brian";
$cadena_escaped = addslashes($cadena_original);

echo "Cadena 'escapada': $cadena_escaped";
?>