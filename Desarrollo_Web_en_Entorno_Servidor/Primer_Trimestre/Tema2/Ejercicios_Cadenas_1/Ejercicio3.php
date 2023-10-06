<?php
$usuario = "el_usuario-321";

if (preg_match("/^[a-zA-Z0-9_-]{3,20}$/", $usuario)) { //Lo que hemos dado hoy en clase, facilito
    echo "El nombre de usuario SI es válido.";
} else {
    echo "El nombre de usuario NO es válido.";
}
?>
