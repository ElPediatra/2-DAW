/* 3. Cada vez que los campos NOMBRE y APELLIDOS pierdan el foco, el contenido que se haya escrito en esos campos se convertirá a mayúsculas. */

//Uso window.onload para que cargue al iniciarse la página
window.onload = function() {
    //Capturo los elementos "nombre" y "apellidos" del formulario
    var nombre = document.getElementById('nombre');
    var apellidos = document.getElementById('apellidos');

    //Creo un EventListener para el 'blur' y que llame a la función para ponerlos en mayúsculas
    nombre.addEventListener('blur', convertirAMayusculas);
    apellidos.addEventListener('blur', convertirAMayusculas);
}

//Creo una función para convertir campos a MAYUSCULA (en ese caso "nombre" y "apellidos")
function convertirAMayusculas(event) {
    event.target.value = event.target.value.toUpperCase();
}
