<?php
$usuario = "mi_nombre-123";

if (preg_match("/^[a-zA-Z0-9_-]{3,20}$/", $usuario)) {
    echo "El nombre de usuario es válido.";
} else {
    echo "El nombre de usuario no es válido.";
}
?>
