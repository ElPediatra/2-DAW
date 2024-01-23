/*Sacar el grosor del borde de la tabla*/
function grosorBorde() {
    //Creo variable para la tabla
    var tabla = document.getElementById('tabla1');
    //Creo variable para capturar el grosor de la tabla
    var grosorBorde = window.getComputedStyle(tabla, null).getPropertyValue('border-top-width');
    //Envío mensaje informando del grosor de la tabla
    alert('Grosor del borde actual: ' + grosorBorde);
    //Devuelvo el dato para los métodos de aumentar y bajar borde para que puedan capturar la el dato
    return grosorBorde;
}

/*Aumentar el grosor del borde de la tabla*/
function aumentarBorde() {
    //Creo variable para la tabla
    var tabla = document.getElementById('tabla1');
    //Capturo borde actual
    var bordeActual = parseFloat(grosorBorde());
    //Modifico el borde y lo muestro
    var bordeNuevo = bordeActual + 1;
    tabla.style.borderWidth = bordeNuevo + 'px';
    alert('Nuevo grosor del borde: ' + bordeNuevo + 'px');
}

/*Bajar el grosor del borde de la tabla*/
function BajarBorde() {
    //Creo variable para la tabla
    var tabla = document.getElementById('tabla1');
    //Capturo borde actual
    var bordeActual = parseFloat(grosorBorde());
    //Modifico el borde y lo muestro
    var bordeNuevo = bordeActual - 1;
    //Como no puede ser menor a 0, compruebo si lo quieren poner negativo y mando mensaje
    if (bordeNuevo >= 0) {
        tabla.style.borderWidth = bordeNuevo + 'px';
        alert('Nuevo grosor del borde: ' + bordeNuevo + 'px');
    } else {
        alert('El grosor del borde no puede ser menor que 0');
    }
}
