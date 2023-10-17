<?php
$frase = "Viva el vino, viva el rey, viva el orden y la ley.";
$palabras = explode(" ", $frase); //Separo la frase en palabras con explode diferenciando cada una con los espacios
$ultima_palabra = end($palabras); //Del grupo de palabras, selecciono la del final (end)

echo "La última palabra es: " . $ultima_palabra;
?>