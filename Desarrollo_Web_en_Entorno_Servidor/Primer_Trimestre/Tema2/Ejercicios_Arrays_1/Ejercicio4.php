<?php
$colores = array(
    "fuertes" => array("Rojo" => "FF0000", "Verde" => "00FF00", "Azul" => "0000FF"),
    "suaves" => array("Rosa" => "FE9ABC", "Amarillo" => "FDF189", "Malva" => "BC8F8F")
);

$color1 = "FF88CC";
$color2 = "FF0000";

$encontrado1 = false;
$encontrado2 = false;

foreach ($colores as $tipo => $lista_colores) {
    if (in_array($color1, $lista_colores)) {
        $encontrado1 = true;
    }
    if (in_array($color2, $lista_colores)) {
        $encontrado2 = true;
    }
}

echo "El color $color1 " . ($encontrado1 ? "se encuentra" : "no se encuentra") . " en el array.\n";
echo "El color $color2 " . ($encontrado2 ? "se encuentra" : "no se encuentra") . " en el array.\n";
?>
