<?php
$frase = "No me gusta usar +*[] en cadenas";

//Utilizo la función preg_replace para escapar los caracteres que me piden
$frase_escape = preg_replace('/[^a-zA-Z\s]/', '', $frase);

echo "Frase original: $frase<br>"; //No se como quitar []
echo "Frase escapada: $frase_escape";

?>