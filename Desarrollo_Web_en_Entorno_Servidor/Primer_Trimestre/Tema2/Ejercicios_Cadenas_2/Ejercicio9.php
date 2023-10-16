<?php
//Creo el atributo con la frase
$frase = "Bienvenidos al a aventura de aprender PHP en 30 horas";

//Muestro la parte central de la frase
$longitud = strlen($frase);
$inicio = ($longitud - 1) / 2 - 5; //Comienzo desde mitad de la frase
$parte_central = substr($frase, $inicio, 11); //Selecciono 11 caracteres alrededor del "centro" de la frase
echo "Parte central de la frase: $parte_central<br>";

//Busco la palabra "PHP" y su posición
$posicion_php = strpos($frase, "PHP");
echo "Posición de la palabra 'PHP': $posicion_php<br>";

//Cambio la palabra "aventura" por "<b>misión</b>"
$frase_modificada = str_replace("aventura", "<b>misión</b>", $frase);
echo "Frase modificada: $frase_modificada";
?>