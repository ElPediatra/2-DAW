<?php
// Nombre del archivo de entrada
$archivo_entrada = 'ejercicio4.php';

// Nombre del archivo de salida
$archivo_salida = 'fich_salida.txt';

// Leer el contenido del archivo de entrada
$contenido = file_get_contents($archivo_entrada);

// Guardar el contenido en el archivo de salida
$bytes_escritos = file_put_contents($archivo_salida, $contenido);

// Escribir el número total de bytes escritos
echo "Número total de bytes escritos: " . $bytes_escritos;
?>
