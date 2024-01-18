<?php
// Procesar los datos del formulario
$nombre = $_POST['nombre'];
$comentario = $_POST['comentario'];

// Formato del comentario
$comentario_formateado = "--------------------------------------------------------\n" .
                         $nombre . "\n" .
                         $comentario . "\n" .
                         "--------------------------------------------------------\n";

// Guardar el comentario en el fichero
file_put_contents('datos.txt', $comentario_formateado, FILE_APPEND);

// Mostrar el mensaje
echo "Los datos se guardaron correctamente:<br>";
echo nl2br($comentario_formateado);
echo '<a href="pagina3.php">Ver fichero</a>';
?>
