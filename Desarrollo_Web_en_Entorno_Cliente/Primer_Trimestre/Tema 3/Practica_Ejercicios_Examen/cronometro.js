var horas, minutos, segundos;
var aux;

function empezarCuenta() {
    horas = parseInt(document.getElementById("horas").value);
    minutos = parseInt(document.getElementById("minutos").value);
    segundos = parseInt(document.getElementById("segundos").value);

    var totalSegundos = (horas * 3600) + (minutos * 60) + segundos;

    aux = setInterval(function() {
        if (totalSegundos <= 0) {
            clearInterval(aux);
            alert("El tiempo se ha acabado, entrega tu examen");
        } else {
            totalSegundos--;
            var restanteHoras = Math.floor(totalSegundos / 3600);
            var restanteMinutos = Math.floor((totalSegundos % 3600) / 60);
            var restanteSegundos = totalSegundos % 60;
            document.getElementById("cuenta_atras").innerHTML = "<br>" + restanteHoras + " horas <br>" + restanteMinutos + " minutos <br>" + restanteSegundos + " segundos";
        }
    }, 1000);
}