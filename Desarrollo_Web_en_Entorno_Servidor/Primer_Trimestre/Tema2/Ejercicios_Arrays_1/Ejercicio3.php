<?php
$colores = array(
    "fuertes" => array("Rojo" => "FF0000", "Verde" => "00FF00", "Azul" => "0000FF"),
    "suaves" => array("Rosa" => "FE9ABC", "Amarillo" => "FDF189", "Malva" => "BC8F8F")
);

foreach ($colores as $tipo => $lista_colores) {
    echo "Colores $tipo: ";
    foreach ($lista_colores as $color => $codigo) {
        echo "$color:$codigo ";
    }
    echo "\n";
}
?>
