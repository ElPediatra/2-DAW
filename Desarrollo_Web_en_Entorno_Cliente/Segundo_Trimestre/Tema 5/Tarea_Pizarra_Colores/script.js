//Habilito que cargue el script al arrancar la página
window.onload = function() {
    //Creo una variable para la tabla y asignarle el id 'tablerodibujo'
    var tabla = document.createElement('table');
    tabla.className = 'tablerodibujo';

    //Capturo el DIV de la zonadibujo para pintar
    var zonadibujo = document.getElementById('zonadibujo');

    //Creo la variable para el color actual y para confirmar si se está pintando o no
    var colorActivo = '';
    var pintar = false;

    //Creo las celdas de la tabla (30x30 como se pide)
    for (var i = 0; i < 30; i++) {
        var fila = document.createElement('tr');
        for (var j = 0; j < 30; j++) {
            var celda = document.createElement('td');

            //Creo un evento "mouseover" en las celdas para que cambien de color
            celda.addEventListener('mouseover', function(e) {
                if (pintar) {
                    e.target.style.backgroundColor = colorActivo;
                }
            });
            fila.appendChild(celda);
        }
        tabla.appendChild(fila);
    }

    //Pego la table en el id "zonadibujo"
    zonadibujo.appendChild(tabla);

    //Capturo los colores de la tabla
    var colores = document.querySelectorAll('#paleta td');

    //Creo un evento "click" en cada color de la paleta
    colores.forEach(function(color) {
        color.addEventListener('click', function(e) {
            //Opción para quitar la selección del color
            colores.forEach(function(c) {
                c.classList.remove('seleccionado');
            });

            //Cuando se clica un color lo marco como activo
            colorActivo = getComputedStyle(e.target).backgroundColor;

            //Le asigno la clase seleccionado para que se pinte con ese color
            e.target.classList.add('seleccionado');
        });
    });

    //Pongo eventos "mousedown" y "mouseup" en la tabla para activar y desactivar el pincel y que muestre el mensaje correspondiente
    tabla.addEventListener('mousedown', function(e) {
        pintar = true;
        document.getElementById('pincel').textContent = 'PINCEL ACTIVADO';
    });

    tabla.addEventListener('mouseup', function(e) {
        pintar = false;
        document.getElementById('pincel').textContent = 'PINCEL DESACTIVADO';
    });
};
