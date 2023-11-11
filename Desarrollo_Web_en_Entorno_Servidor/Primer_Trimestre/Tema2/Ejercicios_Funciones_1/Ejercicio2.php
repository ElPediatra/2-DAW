<?php
function infoPais($pais, $capital = 'Madrid', $habitantes = 'muchos') {
    return "La capital de $pais es $capital y tiene $habitantes habitantes.<br>";
}

echo infoPais('España');
echo infoPais('Portugal', 'Lisboa');
echo infoPais('Francia', 'Paris', '6.000.000');
?>