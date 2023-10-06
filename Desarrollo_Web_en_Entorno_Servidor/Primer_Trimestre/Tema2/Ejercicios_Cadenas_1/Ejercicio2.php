<?php
$correo = "albertogomezmorales1994@gmail.com";

if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $partes = explode("@", $correo);
    $usuario = $partes[0]; //Array |:^) (No lo hemos dado pero aquí está, presentándose)
    $dominio = $partes[1];
    echo "Nombre de usuario: $usuario<br>"; //parte de antes del @
    echo "Dominio: $dominio"; //gmail/hotmail etc
} else {
    echo "La dirección de correo no es válida.";
}
?>
