<?php

/* Alberto Gómez Morales - 2º DAW - Desarrollo Web en Servidor - Ejercicio 1

 Diseñar una función que dibuje un árbol de navidad, para ello debemos crear un array siguiento
 las siguientes indicaciones:

        - A partir de alto del árbol (que será un parámetro de la función) se generará el siguiente
        array: (ejemplo para $altura=5)
        - Donde el "*" representa la nieve y el carácter "\" es el árbol.
        - A continuación deberás generar una tabla en html que escriba el contenido del array. La nieve
        se escribirá en color blanco sobre azul y el árbol en verde sobre azul.

        Pista: <td bgcolor="#00FFFF"> para el fondo, <td><font color="#000000"> para la fuente.

*/

function dibujarArbol($altura) {
    $arbol = array(); //Creo mi array
    for ($i = 0; $i < $altura; $i++) { //Lo recorreo y voy asignando el valor que tendría cada celda dependiendo de la altura
        $espacios = str_repeat('*', $altura - $i - 1);
        $ancho = str_repeat('\\', $i * 2 + 1);
        $arbol[] = $espacios . $ancho . $espacios;
    }

    echo '<table>'; //Creo la tabla y voy recorriendo el array pintando el valor que toca y su color
    foreach ($arbol as $fila) {
        echo '<tr>';
        for ($j = 0; $j < strlen($fila); $j++) {
            $color = $fila[$j] == '*' ? '#FFFFFF' : '#008000'; //Colores blanco y verde
            echo "<td bgcolor=\"#0000FF\"><font color=\"$color\">{$fila[$j]}</font></td>";
        }
        echo '</tr>';
    }
    echo '</table>';
}

dibujarArbol(5);
?>