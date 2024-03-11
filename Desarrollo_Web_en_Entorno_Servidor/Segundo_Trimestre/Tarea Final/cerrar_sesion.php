<?php
session_start(); // Inicia la sesión

// Destruye todas las variables de sesión
session_destroy();

// Redirige al usuario de vuelta a index.php
header("Location: index.php");
exit;
?>