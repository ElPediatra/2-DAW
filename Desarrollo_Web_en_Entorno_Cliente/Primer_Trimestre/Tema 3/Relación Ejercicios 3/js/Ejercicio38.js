window.onload = function() {
    if (navigator.cookieEnabled) { //Uso el método navigator.cookieEnabled para saber si tiene cookies habilitadas o no, luego mando mensaje
        alert("Las cookies SI estan activadas en tu navegador.");
    } else {
        alert("Las cookies NO estan activadas en tu navegador.");
    }
}