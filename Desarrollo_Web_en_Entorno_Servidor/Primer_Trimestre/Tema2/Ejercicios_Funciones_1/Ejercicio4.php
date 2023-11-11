<?php
function creaPagina($titulo) {
    echo "<!DOCTYPE html>\n";
    echo "<html>\n";
    echo "<head>\n";
    echo "<title>$titulo</title>\n";
    echo "</head>\n";
    echo "<body>\n";
    echo "<h1>Bienvenido a $titulo</h1>\n";
    echo "</body>\n";
    echo "</html>";
}

creaPagina('Mi Página Web');
?>