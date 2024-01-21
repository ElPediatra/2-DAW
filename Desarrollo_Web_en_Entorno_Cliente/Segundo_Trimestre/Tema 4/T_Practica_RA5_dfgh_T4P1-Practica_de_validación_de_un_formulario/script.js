/* Alberto Gómez Morales - 2º DAW - Desarrollo Web en Entorno Cliente */
window.onload = function() {
    //Creo variables para capturar los datos de los campos del formulario
    var nombre = document.getElementById('nombre');
    var apellidos = document.getElementById('apellidos');
    var edad = document.getElementById('edad');
    var nif = document.getElementById('nif');

    //Creo una variable para capturar los errores
    var errores = document.getElementById('errores');

    //Creo un event listener para los campos "nombre" y "apellidos" para que cuando no estén en foco llamen a una función y pasen el texto a mayúscula.
    nombre.addEventListener('blur', convertirAMayusculas);
    apellidos.addEventListener('blur', convertirAMayusculas);
    //Creo un event listener para los campos "nombre" y "apellidos" para que cuano no estén en foco llamen a una función para validar sus datos.
    nombre.addEventListener('blur', validarCampo);
    apellidos.addEventListener('blur', validarCampo);
    //Creo un event listener para que cuando el campo "edad" no esté en foco, se valide llamando a una función
    edad.addEventListener('blur', validarEdad);
    //Creo un event listener para validar el campo "NIF" cuando no esté en foco, llamando a la función para validarla
    nif.addEventListener('blur', validarNIF);
}

//Función para cambiar el texto a mayúscula
function convertirAMayusculas(event) {
    event.target.value = event.target.value.toUpperCase();
}

//Función para validad nombre y apellidos
function validarCampo(event) {
    //Comprobar si está vacío
    if (event.target.value.trim() === '') {
        errores.textContent = 'El campo ' + event.target.id + ' no puede estar vacío.';
        //Selecciono el campo y la hago foco
        event.target.focus();
    } else {
        //Si el campo no está vacío, borro el mensaje de error
        errores.textContent = '';
    }
}

//Función para validar la edad que se pone en el formulario
function validarEdad(event) {
    //Compruebo si el valor es un número o es menor a 0 y mayor a 105 (por poner un tope)
    if (isNaN(event.target.value) || event.target.value < 0 || event.target.value > 105) {
        //Muestro mensaje de error y hago foco en el campo correspondiente
        errores.textContent = 'El campo ' + event.target.id + ' debe ser un número entre 0 y 105.';
        event.target.focus();
    } else {
        //Si se ha corregido el campo, borro el mensaje de error
        errores.textContent = '';
    }
}

//Función para validar el NIF del formulario
function validarNIF(event) {
    /* Uso esta expresión regular para validar los datos del NIF:
            ^: Inicio de la cadena
            \d{8}: Exactamente 8 dígitos
            -: Un guión
            [A-Za-z]: Cualquier letra mayúscula o minúscula
            $: Fin de la cadena
    */
    var regex = /^\d{8}-[A-Za-z]$/;

    //Si no se cumple la expresión regular, muestro mensaje de error y hago foco en el campo
    if (!regex.test(event.target.value)) {
        errores.textContent = 'El campo ' + event.target.id + ' debe tener el formato 12345678-A.';
        event.target.focus();
    } else {
        //Si se ha corregido el campo, borro el mensaje de error
        errores.textContent = '';
    }
}