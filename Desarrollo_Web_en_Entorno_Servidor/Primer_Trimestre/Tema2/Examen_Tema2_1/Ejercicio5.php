<!-- Verificar que el contenido de una variable es un número de teléfono en el formato: XXX XX XX XX, ten en cuenta que el primmer dígito sólo puede
ser 8 o 9 si es un teléfono fijo o 6 o 7 si es móvil. -->

<?php

    $movil = 654 65 65 65;
    $fijo = 950 48 10 00;

    //Defino los datos que pueden tener las posiciones (en este caso 6,7,8 y 9 para la primeraposicion y cada 2 posiciones tienen que ser decimales)
    // con \s marco los espacios y con \d{número} la cantidad de digitos que puede haber
    // $aux = '/^(6|7|8|9)\d{2}\s\d{2}\s\d{2}\s\d{2}$/';

    //Uso preg_match para comprobar con mi auxiliar si el móvil/teléfono es correcto
    if (preg_match('/^(6|7|8|9)\d{2}\s\d{2}\s\d{2}\s\d{2}$/', $movil)) {
        echo "El número de teléfono es correcto.";
    } else {
        echo "El número de teléfono no es correcto.";
    }
?>