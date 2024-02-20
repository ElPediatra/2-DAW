window.onload = function() {
    var tabla = document.createElement('table');
    tabla.className = 'tablerodibujo';
    var zonadibujo = document.getElementById('zonadibujo');
    var colorActivo = '';
    var pintar = false;

    for (var i = 0; i < 30; i++) {
        var fila = document.createElement('tr');
        for (var j = 0; j < 30; j++) {
            var celda = document.createElement('td');
            celda.addEventListener('mouseover', function(e) {
                if (pintar) {
                    e.target.style.backgroundColor = colorActivo;
                }
            });
            fila.appendChild(celda);
        }
        tabla.appendChild(fila);
    }

    zonadibujo.appendChild(tabla);

    var colores = document.querySelectorAll('#paleta td');
    colores.forEach(function(color) {
        color.addEventListener('click', function(e) {
            colores.forEach(function(c) {
                c.classList.remove('seleccionado');
            });
            colorActivo = getComputedStyle(e.target).backgroundColor;
            e.target.classList.add('seleccionado');
        });
    });

    tabla.addEventListener('mousedown', function(e) {
        pintar = true;
        document.getElementById('pincel').textContent = 'PINCEL ACTIVADO';
    });

    tabla.addEventListener('mouseup', function(e) {
        pintar = false;
        document.getElementById('pincel').textContent = 'PINCEL DESACTIVADO';
    });
};