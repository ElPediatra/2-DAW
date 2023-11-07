<!-- Realizar una página web eb la que, dada dos cadenas, un modo de comparación y un número de caracteres escriba qué cadena es mayor o menor que la otra
según el modo de comparación especificado-->

<?php
    //Defino las variables
    $cad1="Hola";
    $cad2="Holo";
    $modo = 1;
    $ncaracteres = 4;

    switch($modo){
        case 1: //Uso strcmp para comprobar las cadenas
            if(strcmp($cad1, $cad2) == 0){
                echo $cad1." es igual a ".$cad2.".";
            } else {
                echo "Las cadenas ".$cad1." y ".$cad2." no son iguales.";
            }
            break;
        case 2: //Uso strcasecmp para compara las 2 cadenas insesible a mayúsculas y minúsculas
            if(strcasecmp($cad1, $cad2) == 0){
                echo $cad1." es igual a ".$cad2.".";
            } else {
                echo "Las cadenas ".$cad1." y ".$cad2." no son iguales.";
            }
            break;
        case 3: //Uso strnatcmp para compara de manera natural
            if(strnatcmp($cad1, $cad2) == 0){
                echo $cad1." es igual a ".$cad2.".";
            } else {
                echo "Las cadenas ".$cad1." y ".$cad2." no son iguales.";
            }
            break;
        case 4: //Uso strncasecmp para comprar las n-primeros carácteres (en este caso 4 como he puesto)
            if(strncasecmp($cad1, $cad2, $ncaracteres) == 0){
                echo $cad1." es igual a ".$cad2.".";
            } else {
                echo "Las cadenas ".$cad1." y ".$cad2." no son iguales.";
            }
            break;
            
        default:
            echo "La opción no es válida";
    }
?>