//Variable para capturar la ventana secundaria
let ventanaSecundaria;

//Función para abrir la ventana secundaria
function abrirVentanaSecundaria() {
    ventanaSecundaria = window.open("secundaria.html", "_blank", "width=400,height=300");
}

//Función para cerrar la ventana secundaria desde la principal
function cerrarVentanaSecundaria() {
    if (ventanaSecundaria) {
        ventanaSecundaria.close();
    }
}

//Función para obtener y aplicar coordenadas a la ventana secundaria
function aplicarCoordenadas() {
    if (ventanaSecundaria) {
        const x = prompt("Escribe la coordenada X:");
        const y = prompt("Escribe la coordenada Y:");
        ventanaSecundaria.moveTo(x, y);
    }
}

//Función para cambiar el color de fondo de la ventana secundaria
function cambiarColorFondo() {
    if (ventanaSecundaria) {
        const color = document.getElementById("colorSelector").value;
        ventanaSecundaria.document.body.style.backgroundColor = color;
    }
}

//Función para enfocar la ventana secundaria
function enfocarVentana() {
    if (ventanaSecundaria) {
        ventanaSecundaria.focus();
    }
}

//Función para quitar el enfoque de la ventana secundaria
function quitarEnfoqueVentana() {
    if (ventanaSecundaria) {
        ventanaSecundaria.blur();
    }
}

//Función para establecer el tiempo de actividad de la ventana secundaria
function establecerTiempoActividad() {
    if (ventanaSecundaria) {
        const tiempo = prompt("Escribe el tiempo en segundos que quieres que esté la ventana abierta:");
        setTimeout(() => {
            ventanaSecundaria.close();
        }, tiempo * 1000);
    }
}

//Función para establecer el texto y estilo en la ventana secundaria
function establecerTextoEstilo() {
    if (ventanaSecundaria) {
        const texto = prompt("Escribe el texto que quieres poner:");
        const tamañoTexto = prompt("Indicame el tamaño del texto:");
        const colorTexto = prompt("Indicame el color del texto (en inglés):");
        
        ventanaSecundaria.document.body.innerHTML = `<h1 style="font-size: ${tamañoTexto}px; color: ${colorTexto};">${texto}</h1>`;
    }
}