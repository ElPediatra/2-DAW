<?php
//Creo la cadena
$cadena_original = "Como se llaman los pajaros de la playa?";

//'Escapo' todas las vocales menos la 'a'
$cadena_escape = str_replace(['e', 'i', 'o', 'u'], ['\e', '\i', '\o', '\u'], $cadena_original);

echo "Cadena original: $cadena_original<br>";
echo "Cadena escapada: $cadena_escape<br>";

//Vuelvo a poner las vocales para dejar la cadena como estaba antes
$cadena_original = strtr($cadena_escape, ['\e' => 'e', '\i' => 'i', '\o' => 'o', '\u' => 'u']);

echo "Cadena original (tras devolver las vocales): $cadena_original";

?>