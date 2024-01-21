/* Alberto Gómez Morales - 2º DAW - Desarrollo Web en Entorno Cliente */
window.onload = function() {
    //Creo variables para capturar los datos de los campos del formulario
    var nombre = document.getElementById('nombre');
    var apellidos = document.getElementById('apellidos');
    var edad = document.getElementById('edad');
    var nif = document.getElementById('nif');
    var email = document.getElementById('email');
    var provincia = document.getElementById('provincia');
    var fecha = document.getElementById('fecha');
    var telefono = document.getElementById('telefono');
    var hora = document.getElementById('hora');

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
    //Creo un event listener para validar el campo "email" cuando no esté en foco, llamando a la función para validarlo
    email.addEventListener('blur', validarEmail);
    //Creo un event listener para validar el campo "provincia" cuando no esté en foco, llamando a la función para validarlo
    provincia.addEventListener('blur', validarProvincia);
    //Creo un event listener para validar el campo "fecha" cuando no esté en foco, llamando a la función para validarlo
    fecha.addEventListener('blur', validarFecha);
    //Creo un event listener para validar el campo "telefono" cuando no esté en foco, llamando a la función para validarlo
    telefono.addEventListener('blur', validarTelefono);
    //Creo un event listener para validar el campo "hora" cuando no esté en foco, llamando a la función para validarlo
    hora.addEventListener('blur', validarHora);
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

//Función para validar el correo/email del formulario
function validarEmail(event) {
    /* Uso esta expresión regular para validar los datos del email:
        ^: Inicio de la cadena
        [a-zA-Z0-9._%+-]+: Al menos un carácter alfanumérico o . _ % + -
        @: Arroba
        [a-zA-Z0-9.-]+: Al menos un carácter alfanumérico o . -
        \.: Punto
        [a-zA-Z]{2,}: Al menos dos caracteres alfabéticos
        $: Fin de la cadena
    */
    var regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    //Si no se cumple la expresión regular, muestro mensaje de error y hago foco en el campo
    if (!regex.test(event.target.value)) {
        errores.textContent = 'El campo ' + event.target.id + ' debe tener el formato ejemplo@dominio.com.';
        event.target.focus();
    } else {
        //Si se ha corregido el campo, borro el mensaje de error
        errores.textContent = '';
    }
}

//Función para validar las provincias
function validarProvincia(event) {
    // Si no se ha seleccionado ninguna provincia (el valor es '0') muestro mensaje y hago foco en el campo
    if (event.target.value === '0') {
        errores.textContent = 'Tienes que seleccionar una provincia.';
        event.target.focus();
    } else {
        //Si se ha corregido el campo, borro el mensaje de error
        errores.textContent = '';
    }
}

//Función para validar la fecha
function validarFecha(event) {
    /* Uso esta expresión regular para validar los datos del email:
        ^: Inicio de la cadena
        (0[1-9]|[12][0-9]|3[01]): Día (01-31)
        (\/|-): Separador (/ o -)
        (0[1-9]|1[012]): Mes (01-12)
        (\/|-): Separador (/ o -)
        (19|20)\d\d: Año (1900-2099)
        $: Fin de la cadena
    */
    var regex = /^(0[1-9]|[12][0-9]|3[01])(\/|-)(0[1-9]|1[012])\2(19|20)\d\d$/;

    //Si no se cumple la expresión regular, muestro mensaje de error y hago foco en el campo
    if (!regex.test(event.target.value)) {
        errores.textContent = 'El campo ' + event.target.id + ' debe tener el formato dd/mm/aaaa o dd-mm-aaaa.';
        event.target.focus();
    } else {
        //Si se ha corregido el campo, borro el mensaje de error
        errores.textContent = '';
    }
}

//Función para validar el teléfono del formulario
function validarTelefono(event) {
    /* Uso esta expresión regular para validar los datos del email:
        ^: Inicio de la cadena
        \d{9}: Exactamente 9 dígitos
        $: Fin de la cadena
    */
    var regex = /^\d{9}$/;

    //Si no se cumple la expresión regular, muestro mensaje de error y hago foco en el campo
    if (!regex.test(event.target.value)) {
        errores.textContent = 'El campo ' + event.target.id + ' debe tener exactamente 9 dígitos.';
        event.target.focus();
    } else {
        //Si se ha corregido el campo, borro el mensaje de error
        errores.textContent = '';
    }
}

//Función para validar la hora del formulario
function validarHora(event) {
    /* Uso esta expresión regular para validar los datos del email:
        ^: Inicio de la cadena
        ([01]?[0-9]|2[0-3]): Hora (00-23)
        : : Dos puntos
        [0-5][0-9]: Minutos (00-59)
        $: Fin de la cadena
    */
    var regex = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;

    //Si no se cumple la expresión regular, muestro mensaje de error y hago foco en el campo
    if (!regex.test(event.target.value)) {
        errores.textContent = 'El campo ' + event.target.id + ' debe tener el formato hh:mm.';
        event.target.focus();
    } else {
        //Si se ha corregido el campo, borro el mensaje de error
        errores.textContent = '';
    }
}