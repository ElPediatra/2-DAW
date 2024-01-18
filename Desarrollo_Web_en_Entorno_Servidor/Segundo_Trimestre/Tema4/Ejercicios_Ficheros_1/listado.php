<?php
// Nombre del directorio
$directorio = '.';

// Abrir el directorio
if ($handle = opendir($directorio)) {
    // Leer los elementos del directorio
    while (false !== ($elemento = readdir($handle))) {
        // Mostrar el nombre del elemento
        echo 'Nombre: ' . $elemento . '<br>';

        // Mostrar la fecha de la última modificación
        echo 'Última modificación: ' . date ("F d Y H:i:s.", filemtime($elemento)) . '<br>';

        // Si es un archivo, mostrar su tamaño
        if (is_file($elemento)) {
            echo 'Tamaño: ' . filesize($elemento) . ' bytes<br>';
        }

        echo '<br>';
    }

    // Cerrar el directorio
    closedir($handle);
}
?>
