<?php
$frase = "No me gusta usar +*[] en cadenas";

//Utilizo la función preg_replace para escapar los caracteres que me piden
$frase_escape = preg_replace('/[^a-zA-Z\s]/', '\\\\$0', $frase);

echo "Frase original: $frase<br>";
echo "Frase escapada: $frase_escape";

?>