function abrirAleatorio() {
    var num = Math.floor(Math.random() * 3); //Saco un random del 0 al 2 y envío a la web que toque
    if (num === 0) {
        window.location = 'http://www.hotmail.com';
    } else if (num === 1) {
        window.location = 'http://www.gmail.com';
    } else {
        window.location = 'http://www.yahoo.com';
    }
}
