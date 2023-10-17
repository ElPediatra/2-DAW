<?php
//Obtener la cadena original:

$cadena_escaped = "vamos al o\'Brian";
$cadena_original = stripslashes($cadena_escaped);

echo "Cadena original: $cadena_original";
?>