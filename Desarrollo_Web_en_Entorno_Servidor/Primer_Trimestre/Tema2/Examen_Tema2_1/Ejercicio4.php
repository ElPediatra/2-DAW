<!-- Dada una frase, escribir la palabra que está en la posición N. -->

<?php
//Creo la frase y el valor para N
$frase="Hola que tal";
$n="2";

//Divido la frase en las palabras
$aux=explode(" ", $frase);

//Muestro la posición (-1 ya que empieza por 0) que se ha pedido
echo "Has pedido que se muestre la palabra: ".$aux[$n-1].".";
?>