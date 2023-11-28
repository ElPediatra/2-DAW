let ventanaSecundaria;

function abrirPaginaSecundaria() {
   // Abre la página secundaria y almacena la referencia a la ventana en la variable global
   ventanaSecundaria = window.open("secundaria.html", "_blank", "width=400,height=300");
}

function solicitarCoordenadas() {
   // Pide las coordenadas de la ventana secundaria y las almacena en variables
   const nuevaAltura = prompt("Introduce la nueva altura de la ventana secundaria:");
   const nuevaAnchura = prompt("Introduce la nueva anchura de la ventana secundaria:");

   // Aplica las coordenadas si son válidas
   if (ventanaSecundaria && !ventanaSecundaria.closed && !isNaN(nuevaAltura) && !isNaN(nuevaAnchura)) {
      ventanaSecundaria.resizeTo(Number(nuevaAnchura), Number(nuevaAltura));
   }
}