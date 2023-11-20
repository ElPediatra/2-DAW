var horas, minutos, segundos;
var aux;

function empezarCuenta() {
    /* Le pido lo datos al usuario (los cojo de los cuadros de texto que he puesto) */
    horas = parseInt(document.getElementById("horas").value); //Lo paso todo a int
    minutos = parseInt(document.getElementById("minutos").value);
    segundos = parseInt(document.getElementById("segundos").value);

    /* Paso el total a segundos */
    var totalSegundos = (horas * 3600) + (minutos * 60) + segundos;

    /* Iniciar la cuenta atrás */
    aux = setInterval(function() { //Utilizo el método general setInterval para que ejecute mi función hasta que se acabe
        if (totalSegundos <= 0) {
            clearInterval(aux); //Cuando llega a 0 uso clearInterval para detener el auxiliar y que no siga ejecutándose el método setInterval y muestro el mensaje
            alert("El tiempo se ha acabado, entrega tu examen");
        } else {
            totalSegundos--;
            /* Muestro el tiempo indicado por el usuario y como va disminuyendo hasta llevar a 0 */
            var restanteHoras = Math.floor(totalSegundos / 3600);
            var restanteMinutos = Math.floor((totalSegundos % 3600) / 60);
            var restanteSegundos = totalSegundos % 60;
            document.getElementById("cuenta_atras").innerHTML = "<br>" + restanteHoras + " horas <br>" + restanteMinutos + " minutos <br>" + restanteSegundos + " segundos";
        }
    }, 1000); //Es el tiempo por defecto que se le añade al método setInterval para que ejecute lo que queramos
}