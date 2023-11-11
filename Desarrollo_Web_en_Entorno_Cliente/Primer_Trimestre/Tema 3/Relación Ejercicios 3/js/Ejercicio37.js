function abrirVentana() {
    var ancho = screen.width; //Asigno al ancho todo el tamaño de la pantalla
    var alto = screen.height / 2; //Asigno a la altura el tamaño de la pantalla entre 2 (la mitad)
    window.open("", "Nueva Ventana", "width=" + ancho + ",height=" + alto); //Genero la ventana con window.open
}
