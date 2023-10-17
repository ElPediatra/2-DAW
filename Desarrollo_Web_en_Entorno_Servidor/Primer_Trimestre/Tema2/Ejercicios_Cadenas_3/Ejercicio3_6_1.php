<?php
//Opción 1: Eliminar los espacios y puntos antes del texto:
$cadena = " ... Hola a todos ... ";
$cadena = ltrim($cadena, ' .');
echo $cadena;
?>