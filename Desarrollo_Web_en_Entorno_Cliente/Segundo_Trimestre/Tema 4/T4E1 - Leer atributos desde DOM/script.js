function grosorBorde() {
    //Creo variable para la tabla
    var tabla = document.getElementById('tabla1');
    //Creo variable para capturar el grosor de la tabla
    var grosorBorde = window.getComputedStyle(tabla, null).getPropertyValue('border-top-width');
    //Envío mensaje informando del grosor de la tabla
    alert('El grosor del borde de la tabla es: ' + grosorBorde);
}