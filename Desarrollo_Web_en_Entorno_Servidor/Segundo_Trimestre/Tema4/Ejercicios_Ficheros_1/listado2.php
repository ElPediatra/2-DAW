<?php
// Nombre del directorio
$directorio = '.';

// Abrir el directorio
if ($handle = opendir($directorio)) {
    // Leer los elementos del directorio
    while (false !== ($elemento = readdir($handle))) {
        // Si es un archivo
        if (is_file($elemento)) {
            // Mostrar el nombre del archivo
            echo 'Nombre: ' . $elemento . '<br>';

            // Mostrar la fecha de la última modificación
            echo 'Última modificación: ' . date ("F d Y H:i:s.", filemtime($elemento)) . '<br>';

            // Mostrar su tamaño
            echo 'Tamaño: ' . filesize($elemento) . ' bytes<br>';

            echo '<br>';
        }
    }

    // Cerrar el directorio
    closedir($handle);
}
?>
