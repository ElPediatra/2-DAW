<!-- Realizad una página web que tenga dos variables numéricas, una con un valor y otra con un formato. La página debe escribir el número en el formato especificado.-->

<?php

    //Asigno el número y el formato
    $numero=12;
    $formato=2;

    switch($formato){
        case 1: //Pasamos a decimal
            echo sprintf("El número en decimal es: %d".$numero.".");
            break;
        case 2: //Pasamos a hexadecimal (letra en minúscula)
            $aux=dechex($numero);
            echo "El número en hexadecimal es: ".strtolower($aux).".";
            
            break;
        case 3: //Pasamos a hexadecimal (letra normal)
            echo "El número en hexadecimal es: ".dechex($numero).".";
            break;
        
        case 4: //Pasamos a octal
            echo sprintf("El número en octal es: %o".$numero.".");
            break;
        
        case 5: //Ni me acuerdo ni encuentro como pasar a exponencial :)

            break;

        case 6: //Pasamos a binario
            echo sprintf("El número en binario es: %b".$numero.".");
            break;
        
        default:
            echo "La opción no es válida";
    }
?>