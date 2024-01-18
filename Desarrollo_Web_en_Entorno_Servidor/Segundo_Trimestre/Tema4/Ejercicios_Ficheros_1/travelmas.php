<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travelmas</title>
</head>

<body>
    <h1>Travelmas</h1>

    <form action="travelmas.php" method="POST">
        <label for="nombre">Nombre del destino:</label><br>
        <input type="text" id="nombre" name="nombre"><br>
        <label for="pais">País:</label><br>
        <input type="text" id="pais" name="pais"><br>
        <label for="duracion">Duración:</label><br>
        <input type="text" id="duracion" name="duracion"><br>
        <label for="dias">Días de salida:</label><br>
        <input type="text" id="dias" name="dias"><br>
        <input type="submit" value="Enviar">
    </form>

    <h2>Destinos incluidos:</h2>

    <?php
    // Nombre del archivo
    $archivo = 'viajes.txt';

    // Leer el contenido del archivo
    $contenido = file_get_contents($archivo);

    // Dividir el contenido en líneas
    $lineas = explode("\n", $contenido);

    // Mostrar cada línea en una tabla
    echo '<table>';
    foreach ($lineas as $linea) {
        echo '<tr>';
        $campos = explode(":", $linea);
        foreach ($campos as $campo) {
            echo '<td>' . $campo . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    ?>




<?php
// Procesar los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $pais = $_POST['pais'];
    $duracion = $_POST['duracion'];
    $dias = $_POST['dias'];

    // Formato del destino
    $destino = $nombre . ":" . $pais . ":" . $duracion . ":" . $dias . "\n";

    // Guardar el destino en el fichero
    file_put_contents('viajes.txt', $destino, FILE_APPEND);
}
?>

</body>

</html>
