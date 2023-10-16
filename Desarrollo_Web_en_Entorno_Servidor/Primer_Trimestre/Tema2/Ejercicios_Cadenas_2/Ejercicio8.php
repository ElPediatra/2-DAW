<?php
$frase = "Esta cadena tiene muchas letras";

//La posición de la primera ocurrencia de la letra 'a'.
$posicion_a = strpos($frase, 'a');

//La posición de la primera ocurrencia de la letra 'm'.
$posicion_m = strpos($frase, 'm');

//La posición de la primera ocurrencia de la palabra "tiene".
$posicion_tiene = strpos($frase, "tiene");

//La primera ocurrencia desde el final de la letra 'a'.
$posicion_a_final = strrpos($frase, 'a');

//La frase desde la aparición de la palabra "cadena" hasta el final.
$posicion_cadena = strpos($frase, "cadena");
$substring_cadena = substr($frase, $posicion_cadena);

//La cadena desde el carácter 12 hasta el final.
$substring_desde_12 = substr($frase, 12);

//La cadena devolviendo 6 caracteres desde el carácter 18.
$substring_desde_18 = substr($frase, 18, 6);

//La cadena devolviendo los 6 últimos caracteres.
$substring_ultimos_6 = substr($frase, -6);

//La cadena desde la posición 26, contando 6 caracteres desde atrás.
$substring_posicion_26 = substr($frase, -26, 6);

//La cadena empezando en el carácter 4 y terminando en el 7 desde atrás.
$substring_caracter_4_7_atras = substr($frase, 4, -7);

//Muestro los resultados como me pide el ejercicio
echo "La primera ocurrencia de 'a' es $posicion_a<br>";
echo "La primera ocurrencia de 'm' es $posicion_m<br>";
echo "La primera ocurrencia de 'tiene' es $posicion_tiene<br>";
echo "La primera ocurrencia desde el final de 'a' es $posicion_a_final<br>";
echo "La frase desde la aparición de la palabra 'cadena' hasta el final es: $substring_cadena<br>";
echo "<br>"; //Fix, no había puesto la coma
echo "Partes de la cadena:<br>";
echo "$substring_tiene<br>";
echo "$substring_desde_12<br>";
echo "$substring_desde_18<br>";
echo "$substring_ultimos_6<br>";
echo "$substring_posicion_26<br>";
echo "$substring_caracter_4_7_atras<br>";
?>