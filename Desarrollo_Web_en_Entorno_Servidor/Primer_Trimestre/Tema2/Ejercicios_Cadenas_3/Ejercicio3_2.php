<?php
$email = "albertogomezmorales1994@gmail.com";

list($usuario, $dominio) = explode("@", $email); //Separo las 2 partes marcando la diferentes "palabras" con el "@"

echo "Usuario: $usuario<br>";
echo "Dominio: $dominio";
?>