<?php

function calculaCantidad($anio, $cantidad, $interes) {
    $total = $cantidad * pow((1 + $interes/100), $anio);
    return sprintf("%.2f", $total);
}

$interes=5; 
echo "<p><b>El interés actual es $interes%.</b></p>" ; 
echo " <p>Si usted deposita 100 € hoy, sus ahorros crecerán a" ; 
echo calculaCantidad(5 , 100,$interes) ; 
echo "€ en 5 años.</p>" ; 
echo " <p>Si usted deposita 1.500€ hoy, sus ahorros crecerán a" ; 
echo calculaCantidad(20 , 1500,$interes) ; 
echo "€ después de 20 años.</p>" ; 
?> 
