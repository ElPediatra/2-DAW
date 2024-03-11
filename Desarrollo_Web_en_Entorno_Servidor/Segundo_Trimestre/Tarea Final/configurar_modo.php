<?php
// Comprueba si se ha enviado el formulario para cambiar el modo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modo"])) {
    $modo_actual = $_COOKIE["modo"] ?? "claro"; // Valor predeterminado: claro
    $modo = ($modo_actual == "oscuro") ? "claro" : "oscuro";
    setcookie("modo", $modo, time() + 3600, "/"); // Timer para que se mantenga la configuración de la cookie
}
?>