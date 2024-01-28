let btnEventos = document.getElementById('btnEventos');
let btnEliminar = document.getElementById('btnEliminar');

let eventos = {
    click: function() { console.log('Click!'); },
    mouseover: function() { console.log('Mouseover!'); },
    mouseout: function() { console.log('Mouseout!'); }
};

//Función para el primer botón que elimina los eventos
for (let evento in eventos) {
    btnEventos.addEventListener(evento, eventos[evento]);
}

//Función para el segundo botón que elimina los eventos
btnEliminar.addEventListener('click', function() {
    for (let evento in eventos) {
        btnEventos.removeEventListener(evento, eventos[evento]);
    }
});