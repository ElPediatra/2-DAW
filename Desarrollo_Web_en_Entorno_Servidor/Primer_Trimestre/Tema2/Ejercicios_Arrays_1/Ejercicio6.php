<?php
$paises = array(
    "Alemania" => "Berlín",
    "Austria" => "Viena",
    "Bélgica" => "Bruselas",
    "Bulgaria" => "Sofía",
    "Chipre" => "Nicosia",
    "Croacia" => "Zagreb",
    "Dinamarca" => "Copenhague",
    "Eslovaquia" => "Bratislava",
    "Eslovenia" => "Liubliana",
    "España" => "Madrid",
    "Estonia" => "Tallin",
    "Finlandia" => "Helsinki",
    "Francia" => "París",
    "Grecia" => "Atenas",
    "Hungría" => "Budapest",
    "Irlanda" => "Dublín",
    "Italia" => "Roma",
    "Letonia" => "Riga",
    "Lituania" => "Vilna",
    "Luxemburgo" => "Luxemburgo",
    "Malta" => "La Valeta",
    "Países Bajos" => "Ámsterdam",
    "Polonia" => "Varsovia",
    "Portugal" => "Lisboa",
    "Reino Unido" => "Londres",
    "República Checa" => "Praga",
    "Rumanía" => "Bucarest",
    "Suecia" => "Estocolmo"
);

foreach ($paises as $pais => $capital) {
    echo "La capital de $pais es $capital.\n";
}

asort($paises);
echo "\nLista ordenada por el nombre del país:\n";
foreach ($paises as $pais => $capital) {
    echo "La capital de $pais es $capital.\n";
}

asort($paises, SORT_STRING);
echo "\nLista ordenada por el nombre de la capital:\n";
foreach ($paises as $pais => $capital) {
    echo "La capital de $pais es $capital.\n";
}
?>
