<?php
// Leer el contenido del fichero
$contenido = file_get_contents('datos.txt');

// Mostrar el contenido del fichero
echo nl2br($contenido);
?>
