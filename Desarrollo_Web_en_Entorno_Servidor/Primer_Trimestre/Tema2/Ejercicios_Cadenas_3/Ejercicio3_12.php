<?php
$ip = "172.10.10.1"; //Selecciono una IP

//Uso filter_var para ver si la cadena es una dirección IP válida
if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_IPV6) !== false) {
    echo "La cadena SI es una dirección IP válida: $ip";
} else {
    echo "La cadena NO es una dirección IP válida: $ip";
}
?>