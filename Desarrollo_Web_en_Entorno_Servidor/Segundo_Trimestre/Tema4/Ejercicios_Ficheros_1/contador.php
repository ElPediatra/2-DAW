<?php
// Nombre del archivo
$archivo = 'visitas.txt';

// Abrir el archivo en modo lectura/escritura
$fp = fopen($archivo, 'r+');

// Leer del archivo la cantidad deseada de bytes y guardarlos en una variable
$contador = fread($fp, 8);

// Escribir en pantalla
echo "Esta es la visita número: " . $contador;

// Incrementar el contador en una unidad
$contador++;

// Colocar el puntero al principio del archivo
rewind($fp);

// Escribir el nuevo valor del contador en el archivo
fwrite($fp, $contador);

// Cerrar el archivo
fclose($fp);
?>
