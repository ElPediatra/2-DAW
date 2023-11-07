<!-- Diseñar una página web que almacene en dos variables y escriba el nombre de usuario y el dominio de una dirección de e-mail contenida en una variable -->

<?php
    //Creo la variable del correo
    $correo="albertogomezmorales1994@gmail.com";

    //Con explode separo por la '@' en 2 partes, la 1º el usuario y la 2º el dominio
    $aux=explode("@", $correo);
    $usuario=$aux[0];
    $domino=$aux[1];

    //Muestro la posición 0 que sería el usuario y la posición 1 que sería el dominio
    echo "El usuario es: ".$usuario.". <br>";
    echo "El dominio es: ".$domino.". <br>";
?>