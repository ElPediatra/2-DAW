function obtener_datos() {
    var solicitud = new XMLHttpRequest();

    solicitud.onreadystatechange = function () {
        if (solicitud.readyState == 4) {
            if (solicitud.status == 200) {
                var msj = JSON.parse(solicitud.responseText);
            } else {
                alert("Error al leer el archivo: " + solicitud.status);
            }
        }
    }
}