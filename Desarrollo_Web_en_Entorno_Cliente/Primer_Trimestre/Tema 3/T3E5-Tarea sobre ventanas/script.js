var parametros = "width=400, height=300, left=200, top=150, resizable=no, menubar=no, toolbar=no, directories=no, location=no, scrollbars=no, status=no";
var ventanaSecundaria;

function abrirVentana() {
    ventanaSecundaria = window.open("secundaria.html", "ventana", parametros);
    console.log(ventanaSecundaria);
}

function cerrarVentanaSecundaria() {
    if (ventanaSecundaria) {
        ventanaSecundaria.close();
    }
}

function pedirCoordenadas() {
    var left = prompt("Escribe la coordenada left para la ventana secundaria:", "200");
    var top = prompt("Escribe la coordenada top para la ventana secundaria:", "150");
    
    if (!isNaN(left) && !isNaN(top)) {
        parametros = "width=400, height=300, left=" + left + ", top=" + top + ", resizable=no, menubar=no, toolbar=no, directories=no, location=no, scrollbars=no, status=no";
        alert("Coordenadas aplicadas con éxito.");
    } else {
        alert("Escribe valores en números válidos por favor.");
    }
}

function seleccionarColores() {
    var colorSelector = document.getElementById("colorSelector");
    var selectedColor = colorSelector.options[colorSelector.selectedIndex].value;

    document.body.style.backgroundColor = selectedColor;
    if (ventanaSecundaria) {
        ventanaSecundaria.document.body.style.backgroundColor = selectedColor;
    }
}

function aplicarFocus() {
    if (ventanaSecundaria) {
        ventanaSecundaria.focus();
    }
}

function aplicarBlur() {
    if (ventanaSecundaria) {
        ventanaSecundaria.blur();
    }
}

function tiempoActivacion() {
    var tiempo = prompt("Escribe el tiempo de duración para la ventana secundaria (en milisegundos):", "5000");
    
    if (!isNaN(tiempo)) {
        setTimeout(function() {
            cerrarVentanaSecundaria();
        }, tiempo);
    } else {
        alert("Escribe valores en números válidos por favor.");
    }
}

function textoVentana() {
    var texto = prompt("Escribe el texto que quieres mostrar en la ventana secundaria:", "Hola, esta es la ventana secundaria.");
    ventanaSecundaria.document.getElementById("mensaje").innerHTML = texto;
}

function estiloTextoVentana() {
    var tamañoTexto = prompt("Escribe el tamaño de texto para la ventana secundaria:", "16");
    var colorTexto = prompt("Escribe el color de texto para la ventana secundaria:", "black");

    ventanaSecundaria.document.getElementById("mensaje").style.fontSize = tamañoTexto + "px";
    ventanaSecundaria.document.getElementById("mensaje").style.color = colorTexto;
}
