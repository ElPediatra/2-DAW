<?php
$correo = "pedro.gonzalezjimenez.smr@gmail.com";

if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $partes = explode("@", $correo);
    $usuario = $partes[0];
    $dominio = $partes[1];
    echo "Nombre de usuario: $usuario<br>";
    echo "Dominio: $dominio";
} else {
    echo "La dirección de correo no es válida.";
}
?>
