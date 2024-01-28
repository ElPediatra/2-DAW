function cambiarCabecera() {
    var cabecera = document.getElementById("cabecera");
    var boton = document.getElementById("botonCabecera");
    if (cabecera.innerHTML === "Esto es la cabecera de la tabla.") {
        cabecera.innerHTML = "Cabecera cambiada.";
        boton.innerHTML = "Restaurar cabecera";
    } else {
        cabecera.innerHTML = "Esto es la cabecera de la tabla.";
        boton.innerHTML = "Cambiar cabecera";
    }
}