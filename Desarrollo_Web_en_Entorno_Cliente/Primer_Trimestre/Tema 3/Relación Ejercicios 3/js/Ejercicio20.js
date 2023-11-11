/* Uso window.onload para que el script se ejecute al terminar de cargar la página */

window.onload = function() {
    var fecha = new Date(); //Creo un objeto Date con la fecha actual
    var mes = fecha.getMonth() + 1; //Saco los meses (sumo 1 ya que empieza a contar desde 0)
    var cuatrimestre;

    if (mes <= 4) { //Comparo el mes y asigno un restultado, luegolo muestro
        cuatrimestre = "Primer cuatrimestre";
    } else if (mes <= 8) {
        cuatrimestre = "Segundo cuatrimestre";
    } else {
        cuatrimestre = "Tercer cuatrimestre";
    }

    document.getElementById("cuatrimestre").innerHTML = "Estamos en el " + cuatrimestre + " del año.";
}